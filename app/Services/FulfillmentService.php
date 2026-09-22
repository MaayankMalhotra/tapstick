<?php

namespace App\Services;

use App\Jobs\CreateShipmentForFulfillment;
use App\Models\FulfillmentStatusHistory;
use App\Models\Order;
use App\Models\OrderFulfillment;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class FulfillmentService
{
    public const TRANSITIONS = [
        'awaiting_vendor_acceptance' => ['accepted', 'rejected', 'cancelled'],
        'accepted' => ['in_production', 'cancelled'],
        'in_production' => ['production_completed', 'cancelled'],
        'production_completed' => ['packed', 'cancelled'],
        'packed' => ['ready_for_pickup', 'cancelled'],
        'ready_for_pickup' => ['pickup_requested', 'cancelled'],
        'pickup_requested' => ['picked_up', 'shipping_exception', 'cancelled'],
        'picked_up' => ['in_transit', 'shipping_exception'],
        'in_transit' => ['out_for_delivery', 'delivered', 'shipping_exception', 'return_to_origin'],
        'out_for_delivery' => ['delivered', 'failed_delivery', 'return_to_origin'],
        'failed_delivery' => ['out_for_delivery', 'return_to_origin'],
        'shipping_exception' => ['pickup_requested', 'in_transit', 'return_to_origin', 'cancelled'],
        'rejected' => ['awaiting_vendor_acceptance', 'cancelled'],
    ];

    public function createForOrder(Order $order): void
    {
        $order->loadMissing('items.product.vendors');

        DB::transaction(function () use ($order) {
            if ($order->fulfillments()->exists()) {
                return;
            }

            $groups = [];
            foreach ($order->items as $item) {
                $vendor = $item->product?->vendors
                    ->first(fn ($candidate) => $candidate->pivot->is_primary && $candidate->pivot->is_active && $candidate->is_active)
                    ?: $item->product?->vendors->first(fn ($candidate) => $candidate->pivot->is_active && $candidate->is_active);

                $vendorId = $vendor?->id ?: 'unassigned';
                $groups[$vendorId]['vendor'] = $vendor;
                $groups[$vendorId]['items'][] = $item;
            }

            foreach ($groups as $group) {
                $vendor = $group['vendor'];
                $fulfillment = $order->fulfillments()->create([
                    'vendor_id' => $vendor?->id,
                    'fulfillment_number' => $order->order_number.'-F'.strtoupper(Str::random(4)),
                    'status' => $vendor ? 'awaiting_vendor_acceptance' : 'pending_vendor_assignment',
                    'shipping_status' => 'not_created',
                ]);

                foreach ($group['items'] as $item) {
                    $fulfillment->items()->create([
                        'order_item_id' => $item->id,
                        'product_id' => $item->product_id,
                        'product_name' => $item->product_name,
                        'quantity' => $item->quantity,
                        'unit_price' => $item->unit_price,
                        'line_total' => $item->line_total,
                    ]);
                }

                $this->recordHistory($fulfillment, null, $fulfillment->status, null, 'Fulfillment created from verified order.');
            }
        });
    }

    public function transition(OrderFulfillment $fulfillment, string $toStatus, ?User $actor = null, ?string $note = null): OrderFulfillment
    {
        return DB::transaction(function () use ($fulfillment, $toStatus, $actor, $note) {
            $locked = OrderFulfillment::whereKey($fulfillment->id)->lockForUpdate()->firstOrFail();
            $from = $locked->status;
            $allowed = self::TRANSITIONS[$from] ?? [];
            if (! in_array($toStatus, $allowed, true)) {
                throw ValidationException::withMessages(['status' => "Cannot move fulfillment from {$from} to {$toStatus}."]);
            }

            $timestamps = [
                'accepted' => 'accepted_at',
                'in_production' => 'production_started_at',
                'production_completed' => 'production_completed_at',
                'packed' => 'packed_at',
                'ready_for_pickup' => 'ready_for_pickup_at',
                'picked_up' => 'handed_over_at',
                'delivered' => 'delivered_at',
            ];

            $data = ['status' => $toStatus];
            if (isset($timestamps[$toStatus]) && ! $locked->{$timestamps[$toStatus]}) {
                $data[$timestamps[$toStatus]] = now();
            }

            if ($toStatus === 'ready_for_pickup') {
                $data['shipping_status'] = 'queued';
            }

            $locked->update($data);
            $this->recordHistory($locked, $from, $toStatus, $actor?->id, $note);

            if ($toStatus === 'ready_for_pickup') {
                CreateShipmentForFulfillment::dispatch($locked->id)->afterCommit();
            }

            return $locked->refresh();
        });
    }

    public function recordHistory(OrderFulfillment $fulfillment, ?string $from, string $to, ?int $userId, ?string $note = null): void
    {
        FulfillmentStatusHistory::create([
            'order_fulfillment_id' => $fulfillment->id,
            'user_id' => $userId,
            'from_status' => $from,
            'to_status' => $to,
            'note' => $note,
        ]);
    }
}
