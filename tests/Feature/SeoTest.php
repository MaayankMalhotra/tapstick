<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeoTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_contains_all_seo_metadata_and_branding(): void
    {
        $response = $this->get('/');
        $response->assertOk();

        // Homepage SEO Title & Meta Description
        $response->assertSee('<title>Tabstick – Creative Laptop, Car &amp; Custom Stickers</title>', false);
        $response->assertSee('Tabstick creates creative, durable stickers for laptops, cars, phones and college students. Explore unique sticker designs and shop online in India.', false);

        // Canonical & Robots tags
        $response->assertSee('<link rel="canonical" href="https://tabstick.in">', false);
        $response->assertSee('<meta name="robots" content="index, follow">', false);

        // Required Brand & Founder identity statements
        $response->assertSee('Tabstick is an Indian sticker brand founded by Mayank Malhotra. We create creative and durable stickers for laptops, cars, phones and college students.', false);
        $response->assertSee('Mayank Malhotra is the founder of Tabstick.', false);
        $response->assertSee('https://www.linkedin.com/in/maayank-malhotra-a59a55186/', false);

        // 5 Dedicated SEO Category sections
        $response->assertSee('id="laptop-stickers"', false);
        $response->assertSee('id="car-stickers"', false);
        $response->assertSee('id="phone-stickers"', false);
        $response->assertSee('id="college-stickers"', false);
        $response->assertSee('id="custom-stickers"', false);

        // Schemas
        $response->assertSee('"@type": "Organization"', false);
        $response->assertSee('"name": "Tabstick"', false);
        $response->assertSee('"@type": "WebSite"', false);
        $response->assertSee('"@type": "FAQPage"', false);

        // Favicon links
        $response->assertSee('favicon.svg', false);
        $response->assertSee('favicon.ico', false);
        $response->assertSee('favicon-48x48.png', false);
    }

    public function test_product_page_contains_seo_metadata_and_schema(): void
    {
        $category = Category::create(['name' => 'Anime', 'slug' => 'anime']);
        $product = Product::create([
            'category_id' => $category->id,
            'name' => 'Naruto Decal',
            'slug' => 'naruto-decal',
            'description' => 'Waterproof Naruto anime sticker',
            'price' => 79,
            'stock' => 25,
            'emoji' => '🍥',
            'image' => 'images/stickers/naruto.jpg',
            'is_active' => true,
        ]);

        $response = $this->get(route('products.show', $product));
        $response->assertOk();

        $response->assertSee('Naruto Decal Sticker | Tabstick');
        $response->assertSee('Naruto Decal Vinyl Sticker - Tabstick');
        $response->assertSee('"@type": "Product"', false);
        $response->assertSee('"@type": "BreadcrumbList"', false);
        $response->assertSee('"name": "Tabstick"', false);
    }

    public function test_sitemap_returns_valid_xml(): void
    {
        $category = Category::create(['name' => 'Popular', 'slug' => 'popular']);
        Product::create([
            'category_id' => $category->id,
            'name' => 'Test Decal',
            'slug' => 'test-decal',
            'description' => 'Test vinyl sticker',
            'price' => 49,
            'stock' => 10,
            'emoji' => '⚡',
            'is_active' => true,
        ]);

        $response = $this->get('/sitemap.xml');
        $response->assertOk();
        $this->assertStringContainsString('application/xml', $response->headers->get('Content-Type'));
        $this->assertStringContainsString('<urlset', $response->getContent());
        $this->assertStringContainsString('https://tabstick.in/products/test-decal', $response->getContent());
        $this->assertStringContainsString('https://tabstick.in/', $response->getContent());
    }

    public function test_robots_txt_disallows_private_paths_and_references_sitemap(): void
    {
        $robotsContent = file_get_contents(public_path('robots.txt'));
        $this->assertStringContainsString('Sitemap: https://tabstick.in/sitemap.xml', $robotsContent);
        $this->assertStringContainsString('Disallow: /admin/', $robotsContent);
        $this->assertStringContainsString('Disallow: /cart', $robotsContent);
        $this->assertStringContainsString('Disallow: /checkout', $robotsContent);
    }
}
