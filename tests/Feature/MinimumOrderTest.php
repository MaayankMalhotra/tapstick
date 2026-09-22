<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class MinimumOrderTest extends TestCase
{
    use RefreshDatabase;

    private function createTestProduct(string $name, float $price, int $stock = 50): Product
    {
        $category = Category::firstOrCreate(['slug' => 'test-cat'], ['name' => 'Test Cat']);
        return Product::create([
            'category_id' => $category->id,
            'name' => $name,
            'slug' => \Illuminate\Support\Str::slug($name).'-'.uniqid(),
            'description' => 'Waterproof test vinyl decal',
            'price' => $price,
            'stock' => $stock,
            'emoji' => '⚡',
            'is_active' => true,
        ]);
    }

    public function test_cart_displays_minimum_order_progress_bar_and_amount_needed(): void
    {
        $item = $this->createTestProduct('Cyberpunk Cat Decal', 49.00);
        $this->createTestProduct('Upsell Vinyl Sticker', 39.00);

        $this->post(route('cart.add', $item), ['quantity' => 1])
            ->assertRedirect(route('cart.index'));

        $response = $this->get(route('cart.index'));
        $response->assertOk();

        // Check progress bar text
        $response->assertSee('Add <span style="color:var(--color-pop-red);">Rs. 51.00</span> more to unlock Checkout!', false);
        $response->assertSee('Minimum order requirement is <strong>Rs. 100.00</strong>', false);
        $response->assertSee('Rs. 49.00 / Rs. 100.00');

        // Check locked checkout button
        $response->assertSee('btn-checkout-locked');
        $response->assertSee('🔒 Add Rs. 51 more to Checkout');
        $response->assertDontSee('Proceed to Checkout →');

        // Check tactile stepper and quick-add upsell section
        $response->assertSee('btn-qty-step minus-btn', false);
        $response->assertSee('btn-qty-step plus-btn', false);
        $response->assertSee('Quick Add to Reach Rs. 100');

        // Verify sticker-peel-loader is NOT rendered on the cart page
        $response->assertDontSee('id="sticker-peel-loader"', false);
    }

    public function test_sticker_peel_loader_is_only_present_on_homepage(): void
    {
        $homeResponse = $this->get('/');
        $homeResponse->assertOk();
        $homeResponse->assertSee('id="sticker-peel-loader"', false);

        $cartResponse = $this->get(route('cart.index'));
        $cartResponse->assertOk();
        $cartResponse->assertDontSee('id="sticker-peel-loader"', false);
    }

    public function test_checkout_get_redirects_to_cart_if_under_minimum_order(): void
    {
        $item = $this->createTestProduct('Mini Anime Decal', 59.00);
        $this->post(route('cart.add', $item), ['quantity' => 1]);

        $response = $this->get(route('checkout.create'));
        $response->assertRedirect(route('cart.index'));
        $response->assertSessionHas('warning', 'Minimum order amount is ₹100. Please add ₹41.00 more stickers to proceed to checkout.');
    }

    public function test_checkout_post_fails_if_under_minimum_order(): void
    {
        $item = $this->createTestProduct('Small Car Decal', 49.00);
        $this->post(route('cart.add', $item), ['quantity' => 1]);

        $response = $this->post(route('checkout.store'), [
            'customer_name' => 'Mayank Malhotra',
            'email' => 'mayank@example.com',
            'phone' => '9999999999',
            'address' => '123 Test Street',
            'city' => 'Delhi',
            'state' => 'Delhi',
            'postal_code' => '110001',
            'payment_method' => 'cod',
        ]);

        $response->assertRedirect(route('cart.index'));
        $response->assertSessionHas('error');
        $this->assertSame(0, Order::count());
    }

    public function test_checkout_allowed_when_subtotal_reaches_100(): void
    {
        $item = $this->createTestProduct('Laptop Decal', 60.00);
        $this->post(route('cart.add', $item), ['quantity' => 2]); // 2 x 60 = 120 >= 100

        $cartResponse = $this->get(route('cart.index'));
        $cartResponse->assertOk();
        $cartResponse->assertSee('Minimum order reached! You\'re ready to checkout.', false);
        $cartResponse->assertSee('Proceed to Checkout →');
        $cartResponse->assertDontSee('btn-checkout-locked');

        $checkoutResponse = $this->get(route('checkout.create'));
        $checkoutResponse->assertOk();
        $checkoutResponse->assertSee('Place Order');
    }

    public function test_buy_now_under_100_redirects_to_cart_with_friendly_warning(): void
    {
        $item = $this->createTestProduct('Solo Sticker', 49.00);
        $response = $this->post(route('cart.add', $item), [
            'quantity' => 1,
            'redirect' => 'checkout',
        ]);

        $response->assertRedirect(route('cart.index'));
        $response->assertSessionHas('warning');
    }

    public function test_buy_now_over_100_redirects_straight_to_checkout(): void
    {
        $item = $this->createTestProduct('Bundle Decal Pack', 149.00);
        $response = $this->post(route('cart.add', $item), [
            'quantity' => 1,
            'redirect' => 'checkout',
        ]);

        $response->assertRedirect(route('checkout.create'));
    }

    public function test_one_rupee_test_sticker_can_checkout_with_free_delivery(): void
    {
        Mail::fake();

        $testSticker = Product::where('sku', Product::TEST_STICKER_SKU)->firstOrFail();

        $this->post(route('cart.add', $testSticker), ['quantity' => 1])
            ->assertRedirect(route('cart.index'));

        $cartResponse = $this->get(route('cart.index'));
        $cartResponse->assertOk();
        $cartResponse->assertSee('Rs. 1.00');
        $cartResponse->assertSee('FREE ⚡');
        $cartResponse->assertSee('Proceed to Checkout →');

        $this->get(route('checkout.create'))
            ->assertOk()
            ->assertSee('Place Order · Rs. 1.00')
            ->assertSee('FREE ⚡');

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

        $this->assertDatabaseHas('orders', [
            'email' => 'mayank@example.com',
            'subtotal' => 1.00,
            'shipping' => 0.00,
            'total' => 1.00,
        ]);
        $this->assertDatabaseHas('order_items', [
            'product_id' => $testSticker->id,
            'unit_price' => 1.00,
            'quantity' => 1,
            'line_total' => 1.00,
        ]);
    }
}
