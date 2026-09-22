<?php

namespace App\Services\Shipping;

use App\Models\OrderFulfillment;
use App\Models\Vendor;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class ShiprocketProvider implements ShippingProvider
{
    public function syncPickupLocation(Vendor $vendor): array
    {
        return $this->client()->post('/settings/company/addpickup', [
            'pickup_location' => $vendor->shiprocket_pickup_location ?: 'tapstick-vendor-'.$vendor->id,
            'name' => $vendor->contact_person,
            'email' => $vendor->email,
            'phone' => $vendor->phone,
            'address' => $vendor->pickup_address,
            'address_2' => $vendor->pickup_address_2 ?: '',
            'city' => $vendor->pickup_city,
            'state' => $vendor->pickup_state,
            'country' => $vendor->pickup_country,
            'pin_code' => $vendor->pickup_postal_code,
        ])->throw()->json();
    }

    public function createShipment(OrderFulfillment $fulfillment): array
    {
        $fulfillment->loadMissing(['order', 'vendor', 'items.product']);
        $order = $fulfillment->order;
        $vendor = $fulfillment->vendor;
        if (! $vendor || ! $vendor->readyForAutomaticShipping()) {
            throw new RuntimeException('Vendor pickup location is not ready for automatic shipping.');
        }

        $orderItems = $fulfillment->items->map(fn ($item) => [
            'name' => $item->product_name,
            'sku' => (string) ($item->product?->sku ?? 'TS-'.$item->id),
            'units' => $item->quantity,
            'selling_price' => (float) $item->unit_price,
        ])->values()->all();

        $payload = [
            'order_id' => $fulfillment->fulfillment_number,
            'order_date' => $order->created_at->format('Y-m-d H:i'),
            'pickup_location' => $vendor->shiprocket_pickup_location,
            'billing_customer_name' => $order->customer_name,
            'billing_last_name' => '',
            'billing_address' => $order->address,
            'billing_address_2' => '',
            'billing_city' => $order->city,
            'billing_pincode' => $order->postal_code,
            'billing_state' => $order->state,
            'billing_country' => 'India',
            'billing_email' => $order->email,
            'billing_phone' => $order->phone,
            'shipping_is_billing' => true,
            'order_items' => $orderItems,
            'payment_method' => $order->payment_method === 'cod' ? 'COD' : 'Prepaid',
            'sub_total' => (float) $fulfillment->items->sum('line_total'),
            'length' => (float) config('services.shiprocket.default_length_cm', 10),
            'breadth' => (float) config('services.shiprocket.default_breadth_cm', 10),
            'height' => (float) config('services.shiprocket.default_height_cm', 2),
            'weight' => (float) config('services.shiprocket.default_weight_kg', 0.2),
        ];

        return $this->client()->post('/orders/create/adhoc', $payload)->throw()->json();
    }

    public function generateLabel(string $shipmentId): array
    {
        return $this->client()->post('/courier/generate/label', [
            'shipment_id' => [$shipmentId],
        ])->throw()->json();
    }

    public function requestPickup(string $shipmentId): array
    {
        return $this->client()->post('/courier/generate/pickup', [
            'shipment_id' => [$shipmentId],
        ])->throw()->json();
    }

    public function trackByAwb(string $awbCode): array
    {
        return $this->client()->get('/courier/track/awb/'.$awbCode)->throw()->json();
    }

    private function client(): PendingRequest
    {
        return Http::baseUrl(rtrim((string) config('services.shiprocket.base_url'), '/').'/v1/external')
            ->timeout((int) config('services.shiprocket.timeout', 20))
            ->retry(2, 300)
            ->acceptJson()
            ->withToken($this->token());
    }

    private function token(): string
    {
        return Cache::remember('shiprocket.api_token', now()->addDays(9), function () {
            $email = config('services.shiprocket.email');
            $password = config('services.shiprocket.password');
            if (! $email || ! $password) {
                throw new RuntimeException('Shiprocket credentials are not configured.');
            }

            $response = Http::baseUrl(rtrim((string) config('services.shiprocket.base_url'), '/').'/v1/external')
                ->timeout((int) config('services.shiprocket.timeout', 20))
                ->acceptJson()
                ->post('/auth/login', ['email' => $email, 'password' => $password])
                ->throw()
                ->json();

            if (empty($response['token'])) {
                throw new RuntimeException('Shiprocket did not return an auth token.');
            }

            return $response['token'];
        });
    }
}
