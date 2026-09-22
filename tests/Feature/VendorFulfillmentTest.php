<?php

namespace Tests\Feature;

use App\Jobs\CreateShipmentForFulfillment;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderFulfillment;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use App\Services\FulfillmentService;
use App\Services\Shipping\ShippingProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Bus;
use Tests\TestCase;

class VendorFulfillmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_verified_payment_creates_vendor_fulfillment_once(): void
    {
        config(['services.razorpay.secret' => 'test-secret']);
        $vendor = $this->vendor();
        $product = $this->product($vendor);
        $order = $this->order('razorpay', 'pending', 'order_test_123');
        $order->items()->create(['product_id' => $product->id, 'product_name' => $product->name, 'unit_price' => 99, 'quantity' => 1, 'line_total' => 99]);
        $signature = hash_hmac('sha256', 'order_test_123|pay_test_123', 'test-secret');

        $payload = ['razorpay_order_id' => 'order_test_123', 'razorpay_payment_id' => 'pay_test_123', 'razorpay_signature' => $signature];
        $this->postJson(route('api.razorpay.verify'), $payload)->assertOk();
        $this->postJson(route('api.razorpay.verify'), $payload)->assertOk();

        $this->assertSame(1, OrderFulfillment::count());
        $this->assertDatabaseHas('order_fulfillments', ['order_id' => $order->id, 'vendor_id' => $vendor->id, 'status' => 'awaiting_vendor_acceptance']);
    }

    public function test_vendor_cannot_view_another_vendor_fulfillment(): void
    {
        $vendor = $this->vendor('Vendor One', 'one@example.com');
        $otherVendor = $this->vendor('Vendor Two', 'two@example.com');
        $user = User::create(['name' => 'Vendor User', 'email' => 'portal@example.com', 'password' => 'password123456', 'is_vendor' => true, 'vendor_id' => $otherVendor->id]);
        $fulfillment = $this->fulfillmentFor($vendor);

        $this->actingAs($user)->get(route('vendor.fulfillments.show', $fulfillment))->assertForbidden();
    }

    public function test_ready_for_pickup_dispatches_shipment_job(): void
    {
        Bus::fake();
        $vendor = $this->vendor();
        $user = User::create(['name' => 'Vendor User', 'email' => 'portal@example.com', 'password' => 'password123456', 'is_vendor' => true, 'vendor_id' => $vendor->id]);
        $fulfillment = $this->fulfillmentFor($vendor, 'packed');

        $this->actingAs($user)->post(route('vendor.fulfillments.transition', $fulfillment), ['status' => 'ready_for_pickup'])->assertRedirect();

        Bus::assertDispatched(CreateShipmentForFulfillment::class);
        $this->assertDatabaseHas('order_fulfillments', ['id' => $fulfillment->id, 'status' => 'ready_for_pickup', 'shipping_status' => 'queued']);
    }

    public function test_shipment_job_persists_provider_references_without_real_api_calls(): void
    {
        $vendor = $this->vendor();
        $fulfillment = $this->fulfillmentFor($vendor, 'ready_for_pickup');
        $this->app->instance(ShippingProvider::class, new class implements ShippingProvider {
            public function syncPickupLocation(Vendor $vendor): array { return []; }
            public function createShipment(OrderFulfillment $fulfillment): array { return ['order_id' => 'sr_order_1', 'shipment_id' => 'sr_ship_1', 'awb_code' => 'AWB123', 'courier_name' => 'Shiprocket Test']; }
            public function generateLabel(string $shipmentId): array { return ['label_url' => 'https://example.test/label.pdf']; }
            public function requestPickup(string $shipmentId): array { return ['pickup_token_number' => 'PICK123']; }
            public function trackByAwb(string $awbCode): array { return []; }
        });

        (new CreateShipmentForFulfillment($fulfillment->id))->handle(app(ShippingProvider::class), app(FulfillmentService::class));

        $this->assertDatabaseHas('shipping_shipments', [
            'order_fulfillment_id' => $fulfillment->id,
            'provider_shipment_id' => 'sr_ship_1',
            'awb_code' => 'AWB123',
            'pickup_status' => 'requested',
        ]);
        $this->assertDatabaseHas('order_fulfillments', ['id' => $fulfillment->id, 'status' => 'pickup_requested']);
    }

    private function vendor(string $name = 'Sticker Vendor', string $email = 'vendor@example.com'): Vendor
    {
        return Vendor::create([
            'business_name' => $name,
            'contact_person' => 'Vendor Person',
            'email' => $email,
            'phone' => '9999999999',
            'pickup_address' => '123 Vendor Street',
            'pickup_city' => 'Delhi',
            'pickup_state' => 'Delhi',
            'pickup_postal_code' => '110001',
            'pickup_country' => 'India',
            'shiprocket_pickup_location' => 'SR-'.$name,
            'is_active' => true,
        ]);
    }

    private function product(Vendor $vendor): Product
    {
        $category = Category::create(['name' => 'Popular', 'slug' => uniqid('popular-')]);
        $product = Product::create(['category_id' => $category->id, 'name' => 'Good Vibes', 'slug' => uniqid('good-vibes-'), 'sku' => uniqid('TS-'), 'description' => 'Vinyl sticker', 'price' => 99, 'stock' => 10, 'emoji' => '*', 'is_active' => true]);
        $product->vendors()->attach($vendor->id, ['vendor_cost' => 25, 'vendor_stock' => 10, 'production_days' => 1, 'is_primary' => true, 'is_active' => true]);
        return $product;
    }

    private function order(string $method = 'cod', string $paymentStatus = 'cod_pending', ?string $razorpayOrderId = null): Order
    {
        return Order::create([
            'order_number' => 'TS-'.strtoupper(uniqid()),
            'customer_name' => 'Mayank',
            'email' => 'mayank@example.com',
            'phone' => '9999999999',
            'address' => '123 Test Street',
            'city' => 'Delhi',
            'state' => 'Delhi',
            'postal_code' => '110001',
            'subtotal' => 99,
            'shipping' => 49,
            'total' => 148,
            'payment_method' => $method,
            'payment_status' => $paymentStatus,
            'razorpay_order_id' => $razorpayOrderId,
        ]);
    }

    private function fulfillmentFor(Vendor $vendor, string $status = 'awaiting_vendor_acceptance'): OrderFulfillment
    {
        $product = $this->product($vendor);
        $order = $this->order();
        $item = $order->items()->create(['product_id' => $product->id, 'product_name' => $product->name, 'unit_price' => 99, 'quantity' => 1, 'line_total' => 99]);
        $fulfillment = $order->fulfillments()->create(['vendor_id' => $vendor->id, 'fulfillment_number' => $order->order_number.'-FTEST', 'status' => $status]);
        $fulfillment->items()->create(['order_item_id' => $item->id, 'product_id' => $product->id, 'product_name' => $product->name, 'quantity' => 1, 'unit_price' => 99, 'line_total' => 99]);
        return $fulfillment;
    }
}
