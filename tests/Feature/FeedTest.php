<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FeedTest extends TestCase
{
    use RefreshDatabase;

    public function test_google_shopping_feed_returns_valid_xml(): void
    {
        $cat = Category::create(['name' => 'Anime', 'slug' => 'anime']);
        Product::create([
            'category_id' => $cat->id,
            'name' => 'Naruto Decal',
            'slug' => 'naruto-decal',
            'price' => 79,
            'stock' => 10,
            'emoji' => '🍥',
            'is_active' => true,
        ]);

        $response = $this->get('/feed/google-shopping.xml');
        $response->assertOk();
        $this->assertStringContainsString('application/xml', $response->headers->get('Content-Type'));
        $this->assertStringContainsString('xmlns:g="http://base.google.com/ns/1.0"', $response->getContent());
        $this->assertStringContainsString('<g:title>Naruto Decal Vinyl Sticker - Tabstick</g:title>', $response->getContent());
        $this->assertStringContainsString('<g:price>79.00 INR</g:price>', $response->getContent());
        $this->assertStringContainsString('<g:availability>in_stock</g:availability>', $response->getContent());
        $this->assertStringContainsString('https://tabstick.in/products/naruto-decal', $response->getContent());
    }

    public function test_google_merchant_alias_route_works(): void
    {
        $response = $this->get('/feed/google-merchant.xml');
        $response->assertOk();
        $this->assertStringContainsString('application/xml', $response->headers->get('Content-Type'));
    }
}
