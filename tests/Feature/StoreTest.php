<?php

namespace Tests\Feature;

use App\Mail\AdminNewOrderMail;
use App\Mail\OrderConfirmationMail;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Services\RazorpayGateway;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_can_be_added_to_the_session_cart(): void
    {
        $product = $this->product();

        $this->post(route('cart.add', $product), ['quantity' => 2])
            ->assertRedirect();

        $this->assertEquals(2, session('cart')[$product->id]);
    }

    public function test_guest_can_place_a_cash_on_delivery_order(): void
    {
        Mail::fake();

        $product = $this->product();
        $this->post(route('cart.add', $product), ['quantity' => 2]);

        $this->post(route('checkout.store'), [
            'customer_name' => 'Mayank Malhotra',
            'email' => 'mayank@example.com',
            'phone' => '9999999999',
            'address' => '123 Test Street',
            'city' => 'Delhi',
            'state' => 'Delhi',
            'postal_code' => '110001',
            'payment_method' => 'cod',
        ])->assertRedirect();

        $this->assertDatabaseHas('orders', ['email' => 'mayank@example.com', 'payment_method' => 'cod']);
        $this->assertDatabaseHas('order_items', ['product_id' => $product->id, 'quantity' => 2]);
        $this->assertEmpty(session('cart', []));
        $this->assertSame(8, $product->fresh()->stock);
        $this->assertDatabaseHas('stock_movements', ['product_id' => $product->id, 'quantity_change' => -2, 'stock_after' => 8]);

        Mail::assertSent(OrderConfirmationMail::class, function ($mail) {
            return $mail->hasTo('mayank@example.com');
        });
        Mail::assertSent(AdminNewOrderMail::class);
    }

    public function test_razorpay_checkout_creates_payment_order(): void
    {
        config(['services.razorpay.key' => 'rzp_test_key', 'services.razorpay.secret' => 'test-secret']);
        $gateway = new class extends RazorpayGateway {
            public array $payload = [];
            public function createOrder(array $data): array
            {
                $this->payload = $data;
                return ['id' => 'order_test_123', 'amount' => $data['amount'], 'currency' => $data['currency']];
            }
        };
        $this->app->instance(RazorpayGateway::class, $gateway);
        $product = $this->product();
        $this->post(route('cart.add', $product), ['quantity' => 1]);

        $this->post(route('checkout.store'), [
            'customer_name' => 'Mayank Malhotra',
            'email' => 'mayank@example.com',
            'phone' => '9999999999',
            'address' => '123 Test Street',
            'city' => 'Delhi',
            'state' => 'Delhi',
            'postal_code' => '110001',
            'payment_method' => 'razorpay',
        ])->assertOk()->assertSee('Pay with Razorpay');
        $order = Order::where('email', 'mayank@example.com')->firstOrFail();

        $this->postJson(route('api.razorpay.create'), [
            'amount' => 14800,
            'currency' => 'INR',
            'receipt' => $order->order_number,
        ])->assertOk()->assertJson(['order_id' => 'order_test_123', 'amount' => 14800, 'currency' => 'INR']);

        $this->assertSame(14800, $gateway->payload['amount']);
        $this->assertSame('INR', $gateway->payload['currency']);
        $this->assertSame($order->order_number, $gateway->payload['receipt']);
        $this->assertDatabaseHas('orders', [
            'email' => 'mayank@example.com',
            'payment_method' => 'razorpay',
            'payment_status' => 'pending',
            'razorpay_order_id' => 'order_test_123',
        ]);
        $this->assertSame(9, $product->fresh()->stock);
    }

    public function test_razorpay_payment_signature_marks_order_paid(): void
    {
        config(['services.razorpay.secret' => 'test-secret']);
        $product = $this->product();
        $order = Order::create([
            'order_number' => 'TS-TEST123',
            'customer_name' => 'Mayank Malhotra',
            'email' => 'mayank@example.com',
            'phone' => '9999999999',
            'address' => '123 Test Street',
            'city' => 'Delhi',
            'state' => 'Delhi',
            'postal_code' => '110001',
            'subtotal' => 99,
            'shipping' => 49,
            'total' => 148,
            'payment_method' => 'razorpay',
            'payment_status' => 'pending',
            'razorpay_order_id' => 'order_test_123',
        ]);
        $order->items()->create(['product_id' => $product->id, 'product_name' => $product->name,
            'unit_price' => $product->price, 'quantity' => 1, 'line_total' => $product->price]);
        session(['cart' => [$product->id => 1]]);
        $signature = hash_hmac('sha256', 'order_test_123|pay_test_123', 'test-secret');

        $this->postJson(route('api.razorpay.verify'), [
            'razorpay_order_id' => 'order_test_123',
            'razorpay_payment_id' => 'pay_test_123',
            'razorpay_signature' => $signature,
        ])->assertOk()->assertJson(['success' => true, 'redirect_url' => route('orders.success', $order)]);

        $this->assertDatabaseHas('orders', [
            'id' => $order->id,
            'razorpay_payment_id' => 'pay_test_123',
            'razorpay_signature' => $signature,
            'payment_status' => 'paid',
        ]);
        $this->assertEmpty(session('cart', []));
    }

    public function test_home_displays_catalog_and_category_counts(): void
    {
        $this->product();
        $response = $this->get(route('home'));
        $response->assertOk();
        $response->assertSee('PICK YOUR PERSONALITY');
        $response->assertSee('ALL DROPS');
        $response->assertSee('Good Vibes');
    }

    public function test_api_products_endpoint_returns_paginated_json(): void
    {
        $this->product();
        $response = $this->getJson(route('api.products', ['page' => 1]));
        $response->assertOk();
        $response->assertJsonStructure([
            'html',
            'current_page',
            'has_more',
            'next_page',
            'total',
            'count'
        ]);
        $this->assertSame(1, $response->json('total'));
        $this->assertStringContainsString('Good Vibes', $response->json('html'));
    }

    public function test_api_products_can_filter_by_category_and_search(): void
    {
        $animeCategory = Category::create(['name' => 'Anime & Manga', 'slug' => 'anime']);
        $product = Product::create([
            'category_id' => $animeCategory->id,
            'name' => 'Naruto Uzumaki',
            'slug' => 'naruto-uzumaki',
            'description' => 'Ninja vinyl decal',
            'price' => 49,
            'stock' => 50,
            'emoji' => '🍥',
            'is_active' => true,
        ]);

        $response = $this->getJson(route('api.products', ['category' => 'anime']));
        $response->assertOk();
        $this->assertSame(1, $response->json('total'));
        $this->assertStringContainsString('Naruto Uzumaki', $response->json('html'));

        $searchResponse = $this->getJson(route('api.products', ['search' => 'Naruto']));
        $searchResponse->assertOk();
        $this->assertSame(1, $searchResponse->json('total'));

        $missResponse = $this->getJson(route('api.products', ['search' => 'NonExistentXYZ']));
        $missResponse->assertOk();
        $this->assertSame(0, $missResponse->json('total'));
    }

    private function product(): Product
    {
        $category = Category::create(['name' => 'Popular', 'slug' => 'popular']);
        return Product::create(['category_id' => $category->id, 'name' => 'Good Vibes', 'slug' => 'good-vibes',
            'description' => 'Vinyl sticker', 'price' => 99, 'stock' => 10, 'emoji' => '☀️', 'is_active' => true]);
    }
}
