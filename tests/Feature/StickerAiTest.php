<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StickerAiTest extends TestCase
{
    use RefreshDatabase;

    protected Category $category;

    protected function setUp(): void
    {
        parent::setUp();

        $this->category = Category::create([
            'name' => 'Cars & Bikes',
            'slug' => 'cars-bikes',
        ]);

        Product::create([
            'category_id' => $this->category->id,
            'name' => 'Mountain Adventure Bumper Sticker',
            'slug' => 'mountain-adventure-bumper-sticker',
            'price' => 399.00,
            'stock' => 50,
            'image' => 'images/mountain-adventure.jpg',
            'is_active' => true,
        ]);

        Product::create([
            'category_id' => $this->category->id,
            'name' => 'Never Give Up Bumper Sticker',
            'slug' => 'never-give-up-bumper-sticker',
            'price' => 399.00,
            'stock' => 50,
            'is_active' => true,
        ]);
    }

    public function test_sticker_ai_chat_requires_valid_message(): void
    {
        $response = $this->postJson('/api/sticker-ai/chat', [
            'message' => '',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['message']);
    }

    public function test_sticker_ai_chat_returns_reply_and_matching_products(): void
    {
        $response = $this->postJson('/api/sticker-ai/chat', [
            'message' => 'Show me cool bumper stickers for my car',
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);

        $data = $response->json();
        $this->assertNotEmpty($data['reply']);
        $this->assertIsArray($data['products']);
    }

    public function test_sticker_ai_chat_retrieves_exact_bumper_stickers_from_catalog(): void
    {
        $response = $this->postJson('/api/sticker-ai/chat', [
            'message' => 'Do you have Mountain Adventure Bumper Sticker or Never Give Up?',
        ]);

        $response->assertStatus(200)
            ->assertJson(['success' => true]);

        $data = $response->json();
        $productNames = array_column($data['products'], 'name');

        $hasMatch = false;
        foreach ($productNames as $name) {
            if (stripos($name, 'Mountain Adventure') !== false || stripos($name, 'Never Give Up') !== false) {
                $hasMatch = true;
                break;
            }
        }
        $this->assertTrue($hasMatch, 'Expected candidate stickers to include mountain adventure or never give up.');
    }

    public function test_sticker_ai_search_endpoint_returns_json_results(): void
    {
        $response = $this->getJson('/api/sticker-ai/search?q=mountain');

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'query' => 'mountain',
            ]);

        $data = $response->json();
        $this->assertGreaterThan(0, $data['count']);
        $this->assertIsArray($data['products']);
        $this->assertEquals('Mountain Adventure Bumper Sticker', $data['products'][0]['name']);
    }

    public function test_sticker_ai_results_include_live_catalog_metadata(): void
    {
        $animeCategory = Category::create([
            'name' => 'Anime & Manga',
            'slug' => 'anime',
        ]);

        Product::create([
            'category_id' => $animeCategory->id,
            'name' => 'Gojo Domain Expansion Sticker',
            'slug' => 'gojo-domain-expansion-sticker',
            'description' => 'Anime vinyl decal for laptops',
            'price' => 149.00,
            'stock' => 20,
            'image' => 'anime/gojo-domain.jpg',
            'is_active' => true,
        ]);

        $response = $this->getJson('/api/sticker-ai/search?q=gojo anime under 200');

        $response->assertOk()->assertJson([
            'success' => true,
        ]);

        $product = $response->json('products.0');
        $this->assertSame('Gojo Domain Expansion Sticker', $product['name']);
        $this->assertSame('Gojo Domain Expansion Sticker', $product['product_name']);
        $this->assertSame('Anime & Manga', $product['category']);
        $this->assertSame('anime', $product['category_slug']);
        $this->assertSame('149.00', $product['price']);
        $this->assertStringContainsString('/storage/anime/gojo-domain.jpg', $product['image_url']);
        $this->assertStringContainsString('/products/gojo-domain-expansion-sticker', $product['url']);
    }

    public function test_storefront_homepage_renders_sticker_ai_widget(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('id="sticker-ai-widget"', false);
        $response->assertSee('id="sticker-ai-launcher"', false);
        $response->assertSee('id="sticker-ai-window"', false);
        $response->assertSee('Tabstick AI Stylist');
    }
}
