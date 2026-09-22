<?php

namespace App\Http\Controllers;

use App\Models\ShippingEvent;
use App\Models\ShippingShipment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ShippingWebhookController extends Controller
{
    public function shiprocket(Request $request): JsonResponse
    {
        $secret = config('services.shiprocket.webhook_secret');
        if (! $secret) {
            return response()->json(['message' => 'Shiprocket webhook secret is not configured.'], 428);
        }
        if (! hash_equals($secret, (string) $request->header('X-Shiprocket-Webhook-Secret'))) {
            return response()->json(['message' => 'Invalid webhook signature.'], 401);
        }

        $payload = $request->all();
        $awb = $payload['awb'] ?? $payload['awb_code'] ?? null;
        $externalStatus = (string) ($payload['current_status'] ?? $payload['status'] ?? 'unknown');
        $eventId = $payload['event_id'] ?? ($awb ? $awb.'-'.md5(json_encode($payload)) : md5(json_encode($payload)));
        $shipment = $awb ? ShippingShipment::where('awb_code', $awb)->first() : null;

        $event = ShippingEvent::firstOrCreate(
            ['provider' => 'shiprocket', 'external_event_id' => $eventId],
            [
                'shipping_shipment_id' => $shipment?->id,
                'external_status' => $externalStatus,
                'mapped_status' => $this->mapStatus($externalStatus),
                'payload' => $payload,
                'occurred_at' => now(),
            ]
        );

        if ($event->wasRecentlyCreated && $shipment && $event->mapped_status) {
            $shipment->update(['status' => $event->mapped_status, 'last_synced_at' => now()]);
            $shipment->fulfillment?->update(['status' => $event->mapped_status]);
        }

        return response()->json(['success' => true]);
    }

    private function mapStatus(string $status): ?string
    {
        $normalized = strtolower(str_replace([' ', '-'], '_', $status));

        return match (true) {
            str_contains($normalized, 'delivered') => 'delivered',
            str_contains($normalized, 'out_for_delivery') => 'out_for_delivery',
            str_contains($normalized, 'transit'), str_contains($normalized, 'shipped') => 'in_transit',
            str_contains($normalized, 'pickup') => 'pickup_requested',
            str_contains($normalized, 'rto'), str_contains($normalized, 'return') => 'return_to_origin',
            str_contains($normalized, 'failed'), str_contains($normalized, 'exception') => 'shipping_exception',
            default => null,
        };
    }
}
