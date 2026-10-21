<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Product;
use App\Services\MetaPixel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class MetaPixelTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        config(['services.meta.pixel_id' => '1631769315356742', 'services.meta.require_consent' => false]);
        Mail::fake();
    }

    public function test_base_pixel_is_configured_once_and_can_be_disabled_or_consent_gated(): void
    {
        $html = $this->get('/')->assertOk()->assertSee('1631769315356742')->getContent();
        $this->assertSame(1, substr_count($html, 'js/meta-pixel.js'));
        config(['services.meta.require_consent' => true]);
        $this->get('/')->assertDontSee('js/meta-pixel.js');
        $this->withSession(['marketing_consent' => true])->get('/')->assertSee('js/meta-pixel.js');
        $this->withSession(['marketing_consent' => false])->get('/')->assertDontSee('js/meta-pixel.js');
        config(['services.meta.pixel_id' => '']);
        $this->withSession(['marketing_consent' => true])->get('/')->assertDontSee('js/meta-pixel.js');
    }

    public function test_product_checkout_and_both_cart_paths_use_real_values(): void
    {
        $product = $this->product();
        $this->get(route('products.show', $product))->assertOk()
            ->assertViewHas('metaViewContent', MetaPixel::product($product))
            ->assertSee("track('ViewContent'", false);

        $this->postJson(route('cart.add', $product), ['quantity' => 2])->assertOk()
            ->assertJsonPath('meta_add_to_cart.value', 250)
            ->assertJsonPath('meta_add_to_cart.contents.0.quantity', 2)
            ->assertJsonPath('meta_add_to_cart.content_ids.0', (string) $product->id);
        $this->postJson(route('cart.add', $product), ['quantity' => 20])->assertOk()
            ->assertJsonPath('meta_add_to_cart.contents.0.quantity', 1);
        $this->postJson(route('cart.add', $product), ['quantity' => 1])->assertOk()
            ->assertJsonPath('meta_add_to_cart', null);
        $this->postJson(route('cart.add', $product), ['quantity' => 0])->assertUnprocessable();

        $this->withSession(['cart' => []])->post(route('cart.add', $product), ['quantity' => 1])->assertRedirect();
        $this->get(route('cart.index'))->assertSee("track('AddToCart'", false);
        $refreshed = $this->get(route('cart.index'))->assertSessionMissing('meta_add_to_cart');
        $this->assertStringNotContainsString("track('AddToCart'", explode('</head>', $refreshed->getContent())[0]);
        $this->get(route('checkout.create'))->assertOk()
            ->assertViewHas('metaCheckout', MetaPixel::contents([
                ['id' => (string) $product->id, 'quantity' => 1, 'item_price' => 125.0],
            ], 174.0))->assertSee("track('InitiateCheckout'", false);
        $this->withSession(['cart' => []])->get(route('checkout.create'))->assertRedirect();
    }

    public function test_only_signature_verified_purchase_is_emitted_once_even_after_repeated_callbacks(): void
    {
        $order = $this->order();
        config(['services.razorpay.secret' => 'test-secret']);
        $payload = [
            'razorpay_order_id' => $order->razorpay_order_id,
            'razorpay_payment_id' => 'pay_meta_test',
            'razorpay_signature' => hash_hmac('sha256', $order->razorpay_order_id.'|pay_meta_test', 'test-secret'),
        ];
        $this->postJson(route('api.razorpay.verify'), array_replace($payload, ['razorpay_signature' => 'invalid']))->assertStatus(400);
        $this->get(route('orders.success', $order))->assertDontSee("track('Purchase'", false);
        $this->postJson(route('api.razorpay.verify'), $payload)->assertOk();
        // Product price changes must not affect the saved purchase payload.
        Product::query()->update(['price' => 999]);
        $this->get(route('orders.success', $order))->assertOk()
            ->assertViewHas('metaPurchase', MetaPixel::purchase($order->fresh()))
            ->assertViewHas('metaPurchase', fn ($data) => $data['value'] === 299.0
                && $data['contents'][0]['item_price'] === 125.0 && $data['num_items'] === 2)
            ->assertSee("track('Purchase'", false);
        $this->get(route('orders.success', $order))->assertDontSee("track('Purchase'", false);
        $this->postJson(route('api.razorpay.verify'), $payload)->assertOk();
        $this->get(route('orders.success', $order))->assertDontSee("track('Purchase'", false);
    }

    public function test_pending_failed_cod_cancelled_and_unrelated_visitors_cannot_emit_purchases(): void
    {
        $order = $this->order();
        foreach (['pending', 'failed', 'cod_pending'] as $status) {
            $order->update(['payment_status' => $status]);
            $this->withSession(['meta_verified_orders' => [$order->id => true]])
                ->get(route('orders.success', $order))->assertDontSee("track('Purchase'", false);
        }
        $order->update(['payment_status' => 'paid', 'status' => 'cancelled']);
        $this->get(route('orders.success', $order))->assertDontSee("track('Purchase'", false);
        $order->update(['status' => 'placed']);
        $this->withSession(['meta_verified_orders' => []])->get(route('orders.success', $order))
            ->assertDontSee("track('Purchase'", false);
        Cache::put('meta-pixel:purchase-'.$order->order_number, true);
        $this->withSession(['meta_verified_orders' => [$order->id => true]])
            ->get(route('orders.success', $order))->assertDontSee("track('Purchase'", false);
    }

    public function test_declined_consent_does_not_consume_purchase_eligibility(): void
    {
        $order = $this->order();
        $order->update(['payment_status' => 'paid']);
        $this->withSession(['marketing_consent' => false, 'meta_verified_orders' => [$order->id => true]])
            ->get(route('orders.success', $order))->assertDontSee('js/meta-pixel.js');
        $this->withSession(['marketing_consent' => true])->get(route('orders.success', $order))
            ->assertSee("track('Purchase'", false);
    }

    private function product(): Product
    {
        return Product::create(['name' => 'Meta Test Product', 'slug' => 'meta-test-product',
            'price' => 125, 'stock' => 3, 'is_active' => true]);
    }

    private function order(): Order
    {
        $product = $this->product();
        $order = Order::create([
            'order_number' => 'TS-META-TEST', 'customer_name' => 'Test Customer',
            'email' => 'customer@example.com', 'phone' => '9999999999', 'address' => 'Test Street',
            'city' => 'Delhi', 'state' => 'Delhi', 'postal_code' => '110001',
            'subtotal' => 250, 'shipping' => 49, 'total' => 299, 'payment_method' => 'razorpay',
            'payment_status' => 'pending', 'razorpay_order_id' => 'order_meta_test',
        ]);
        $order->items()->create(['product_id' => $product->id, 'product_name' => $product->name,
            'unit_price' => 125, 'quantity' => 2, 'line_total' => 250]);

        return $order;
    }
}
