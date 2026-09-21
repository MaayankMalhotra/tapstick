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
        Category::create(['name' => 'Anime & Manga', 'slug' => 'anime']);

        $response = $this->get('/categories');
        $response->assertOk();
        $response->assertSee('Sticker Collections &amp; Categories | Tabstick', false);
        $response->assertSee('PICK YOUR VIBE &amp; GEAR', false);
        $response->assertSee('Laptop Stickers');
        $response->assertSee('Car &amp; Bike Stickers', false);
    }

    public function test_category_page_renders_with_seo_metadata_and_products(): void
    {
        $cat = Category::create(['name' => 'Anime', 'slug' => 'anime']);
        Product::create([
            'category_id' => $cat->id,
            'name' => 'Goku Decal',
            'slug' => 'goku-decal',
            'price' => 89,
            'stock' => 15,
            'emoji' => '🔥',
            'is_active' => true,
        ]);

        $response = $this->get('/category/anime');
        $response->assertOk();
        $response->assertSee('<title>Anime Stickers – Waterproof Anime &amp; Manga Vinyl Decals | Tabstick</title>', false);
        $response->assertSee('Explore 500+ anime vinyl stickers at Tabstick', false);
        $response->assertSee('Goku Decal');
        $response->assertSee('"@type": "CollectionPage"', false);
        $response->assertSee('"@type": "BreadcrumbList"', false);
    }

    public function test_curated_alias_category_page_renders_cleanly(): void
    {
        $response = $this->get('/category/laptop-stickers');
        $response->assertOk();
        $response->assertSee('Laptop Stickers');
        $response->assertSee('Zero Residue');
    }

    public function test_collection_route_redirects_to_category(): void
    {
        $response = $this->get('/collection/anime');
        $response->assertRedirect('/category/anime');
        $response->assertStatus(301);
    }

    public function test_invalid_category_returns_404(): void
    {
        $response = $this->get('/category/invalid-unknown-slug-xyz');
        $response->assertNotFound();
    }
}
