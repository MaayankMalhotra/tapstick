<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_categories_hub_returns_ok_and_lists_collections(): void
    {
        $response = $this->get('/categories');
        $response->assertOk();
        $response->assertSee('Fine Jewelry Collections &amp; Categories | Tabstick Jewelry', false);
        $response->assertSee('FINE JEWELRY COLLECTIONS', false);
        $response->assertSee('18K Gold Plated Rings');
        $response->assertSee('Bracelets &amp; Cuffs', false);
    }

    public function test_category_page_renders_with_seo_metadata_and_products(): void
    {
        $cat = Category::where('slug', 'rings')->first();
        if (!$cat) {
            $cat = Category::create(['name' => 'Rings', 'slug' => 'rings']);
        }

        $response = $this->get('/category/rings');
        $response->assertOk();
        $response->assertSee('<title>18K Gold Plated Rings – Anti-Tarnish Daily Wear | Tabstick Jewelry</title>', false);
        $response->assertSee('Shop luxury 18K gold-plated rings for women', false);
        $response->assertSee('"@type": "CollectionPage"', false);
        $response->assertSee('"@type": "BreadcrumbList"', false);
    }

    public function test_curated_alias_category_page_renders_cleanly(): void
    {
        $response = $this->get('/category/rings');
        $response->assertOk();
        $response->assertSee('18K Gold Plated Rings');
        $response->assertSee('Anti-Tarnish');
    }

    public function test_collection_route_redirects_to_category(): void
    {
        $response = $this->get('/collection/rings');
        $response->assertRedirect('/category/rings');
        $response->assertStatus(301);
    }

    public function test_invalid_category_returns_404(): void
    {
        $response = $this->get('/category/invalid-unknown-slug-xyz');
        $response->assertNotFound();
    }
}
