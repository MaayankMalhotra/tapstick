<?php

namespace App\Jobs;

use App\Models\OrderFulfillment;
use App\Models\ShippingShipment;
use App\Services\FulfillmentService;
use App\Services\Shipping\ShippingProvider;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\DB;
use Throwable;

class CreateShipmentForFulfillment implements ShouldQueue
{
    use Queueable;

    public int $tries = 3;

    public function __construct(public int $fulfillmentId)
    {
    }

    public function handle(ShippingProvider $provider, FulfillmentService $fulfillmentService): void
    {
        $fulfillment = OrderFulfillment::with(['order', 'vendor', 'items.product', 'shipment'])->findOrFail($this->fulfillmentId);
        if ($fulfillment->status !== 'ready_for_pickup') {
            return;
        }

        $shipment = ShippingShipment::firstOrCreate(
            ['order_fulfillment_id' => $fulfillment->id],
            ['provider' => 'shiprocket', 'status' => 'pending']
        );

        if (! config('services.shiprocket.automatic_shipping')) {
            $shipment->update(['status' => 'manual_required', 'pickup_status' => 'manual_required']);
            $fulfillment->update(['shipping_status' => 'manual_required']);
            return;
        }

        if ($shipment->provider_shipment_id && $shipment->awb_code && $shipment->pickup_status === 'requested') {
            return;
        }

        try {
            if (! $shipment->provider_shipment_id) {
                $created = $provider->createShipment($fulfillment);
                $shipment->update([
                    'status' => 'shipment_created',
                    'provider_order_id' => $created['order_id'] ?? $created['order']['id'] ?? null,
                    'provider_shipment_id' => $created['shipment_id'] ?? $created['shipment']['id'] ?? null,
                    'awb_code' => $created['awb_code'] ?? null,
                    'courier_name' => $created['courier_name'] ?? null,
                    'courier_company_id' => $created['courier_company_id'] ?? null,
                    'shipping_charge' => $created['freight_charge'] ?? $created['shipping_charges'] ?? null,
                    'last_error' => null,
                    'last_synced_at' => now(),
                ]);
            }

            if ($shipment->provider_shipment_id && ! $shipment->label_url) {
                $label = $provider->generateLabel($shipment->provider_shipment_id);
                $shipment->update(['label_url' => $label['label_url'] ?? $label['file_url'] ?? null]);
            }

            if ($shipment->provider_shipment_id && $shipment->pickup_status !== 'requested') {
                $pickup = $provider->requestPickup($shipment->provider_shipment_id);
                $shipment->update([
                    'pickup_status' => 'requested',
                    'pickup_token_number' => $pickup['pickup_token_number'] ?? $pickup['pickup_token'] ?? null,
                    'status' => 'pickup_requested',
                    'last_synced_at' => now(),
                ]);
            }

            DB::transaction(function () use ($fulfillment, $fulfillmentService) {
                $fresh = OrderFulfillment::whereKey($fulfillment->id)->lockForUpdate()->firstOrFail();
                if ($fresh->status === 'ready_for_pickup') {
                    $fulfillmentService->transition($fresh, 'pickup_requested', null, 'Shiprocket pickup requested.');
                }
            });
        } catch (Throwable $exception) {
            $shipment->update([
                'status' => 'failed',
                'pickup_status' => $shipment->pickup_status === 'not_requested' ? 'failed' : $shipment->pickup_status,
                'last_error' => $exception->getMessage(),
                'last_synced_at' => now(),
            ]);
            $fulfillment->update(['shipping_status' => 'error']);
            throw $exception;
        }
    }
}
