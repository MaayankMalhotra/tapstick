<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminInventoryTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::factory()->create(['is_admin' => true, 'password' => 'example-admin-password']);
    }

    private function product(): Product
    {
        return Product::create(['name' => 'Test sticker', 'slug' => 'test-sticker', 'sku' => 'TEST-1', 'price' => 99.50,
            'stock' => 10, 'low_stock_threshold' => 5, 'is_active' => true]);
    }

    private function data(): array
    {
        return ['name' => 'New sticker', 'slug' => 'new-sticker', 'sku' => 'NEW-1', 'price' => '49.50',
            'stock' => 12, 'low_stock_threshold' => 5, 'is_active' => 1];
    }

    public function test_guests_and_customers_cannot_read_or_mutate_inventory(): void
    {
        $product = $this->product();
        $this->get('/admin')->assertRedirect('/admin/login');
        $this->post('/admin/products', $this->data())->assertRedirect('/admin/login');
        $this->actingAs(User::factory()->create())->get('/admin')->assertForbidden();
        $this->post('/admin/products/'.$product->id.'/stock', ['quantity_change' => 5, 'reason' => 'Invalid access'])->assertForbidden();
        $this->assertSame(10, $product->fresh()->stock);
    }

    public function test_admin_login_and_logout_and_customer_login_rejection(): void
    {
        $admin = $this->admin();
        $this->post('/admin/login', ['email' => $admin->email, 'password' => 'example-admin-password'])->assertRedirect('/admin');
        $this->assertAuthenticatedAs($admin);
        $this->post('/admin/logout')->assertRedirect('/admin/login');
        $this->assertGuest();
        $customer = User::factory()->create(['password' => 'example-admin-password']);
        $this->post('/admin/login', ['email' => $customer->email, 'password' => 'example-admin-password'])->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_login_is_rate_limited(): void
    {
        for ($i = 0; $i < 5; $i++) $this->post('/admin/login', ['email' => 'unknown@example.com', 'password' => 'bad-password']);
        $this->post('/admin/login', ['email' => 'unknown@example.com', 'password' => 'bad-password'])->assertStatus(429);
    }

    public function test_admin_views_render_and_product_can_be_created(): void
    {
        $this->actingAs($this->admin());
        foreach (['/admin', '/admin/products', '/admin/products/create', '/admin/categories', '/admin/stock-history'] as $url) {
            $this->get($url)->assertOk();
        }
        $this->post('/admin/products', $this->data())->assertSessionHasNoErrors()->assertRedirect();
        $product = Product::where('sku', 'NEW-1')->firstOrFail();
        $this->assertDatabaseHas('stock_movements', ['product_id' => $product->id, 'quantity_change' => 12, 'stock_after' => 12]);
        $this->get('/admin/products/'.$product->id.'/edit')->assertOk();
        $this->get('/')->assertSee('New sticker');
    }

    public function test_stock_changes_are_audited_and_cannot_go_negative(): void
    {
        $product = $this->product();
        $this->actingAs($this->admin());
        $this->post('/admin/products/'.$product->id.'/stock', ['quantity_change' => 6, 'reason' => 'Delivery'])->assertSessionHasNoErrors();
        $this->assertSame(16, $product->fresh()->stock);
        $this->assertDatabaseHas('stock_movements', ['product_id' => $product->id, 'quantity_change' => 6, 'stock_after' => 16]);
        $this->post('/admin/products/'.$product->id.'/stock', ['quantity_change' => -17, 'reason' => 'Damaged'])->assertSessionHasErrors('quantity_change');
        $this->assertSame(16, $product->fresh()->stock);
        $this->post('/admin/products/'.$product->id.'/stock', ['quantity_change' => -3, 'reason' => 'Damaged'])->assertSessionHasNoErrors();
        $this->assertSame(13, $product->fresh()->stock);
    }

    public function test_catalog_edits_preserve_stock_and_hidden_items_disappear(): void
    {
        $product = $this->product();
        $this->actingAs($this->admin())->put('/admin/products/'.$product->id,
            [...$this->data(), 'stock' => 999, 'is_active' => 0])->assertSessionHasNoErrors();
        $this->assertSame(10, $product->fresh()->stock);
        $this->get('/')->assertDontSee('New sticker');
        $this->get('/products/new-sticker')->assertNotFound();
    }

    public function test_duplicate_skus_and_unsafe_images_are_rejected(): void
    {
        $this->product();
        $this->actingAs($this->admin());
        $this->post('/admin/products', [...$this->data(), 'sku' => 'TEST-1'])->assertSessionHasErrors('sku');
        $this->post('/admin/products', [...$this->data(), 'image' => UploadedFile::fake()->create('code.php', 1, 'application/x-php')])->assertSessionHasErrors('image');
    }

    public function test_uploaded_product_image_is_used_in_storefront(): void
    {
        Storage::fake('public');
        $image = UploadedFile::fake()->createWithContent('sticker.png', base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+aT1sAAAAASUVORK5CYII='));
        $this->actingAs($this->admin())->post('/admin/products', [...$this->data(), 'image' => $image])->assertSessionHasNoErrors();
        $product = Product::where('sku', 'NEW-1')->firstOrFail();
        Storage::disk('public')->assertExists($product->image);
        $this->get('/')->assertSee('storage/'.$product->image);
    }

    public function test_categories_in_use_cannot_be_deleted(): void
    {
        $category = Category::create(['name' => 'Laptops', 'slug' => 'laptops']);
        $product = $this->product();
        $product->update(['category_id' => $category->id]);
        $this->actingAs($this->admin())->delete('/admin/categories/'.$category->id)->assertSessionHasErrors('category');
        $this->assertDatabaseHas('categories', ['id' => $category->id]);
        $product->update(['category_id' => null]);
        $this->delete('/admin/categories/'.$category->id)->assertSessionHasNoErrors();
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }

    public function test_seeding_does_not_reset_existing_inventory(): void
    {
        $this->seed();
        $product = Product::where('slug', 'good-vibes')->firstOrFail();
        $product->update(['stock' => 7, 'price' => 125]);
        $this->seed();
        $this->assertSame(7, $product->fresh()->stock);
        $this->assertSame('125.00', $product->fresh()->price);
    }
}
