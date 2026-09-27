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
        $response->assertSee('<title>Tabstick – Anti-Tarnish 18K Gold Plated Fine Jewelry</title>', false);
        $response->assertSee('Discover anti-tarnish, water-resistant, hypoallergenic 18K gold-plated fine jewelry by Tabstick. Shop rings, necklaces, bracelets, earrings &amp; charms online in India.', false);

        // Canonical & Robots tags
        $response->assertSee('<link rel="canonical" href="https://tabstick.in">', false);
        $response->assertSee('<meta name="robots" content="index, follow">', false);

        // Required Brand & Founder identity statements
        $response->assertSee('Tabstick is an Indian fine jewelry brand founded by Mayank Malhotra. We create anti-tarnish, water-resistant and hypoallergenic 18K gold-plated jewelry for everyday luxury.', false);
        $response->assertSee('Mayank Malhotra is the founder of Tabstick.', false);
        $response->assertSee('https://www.linkedin.com/in/maayank-malhotra-a59a55186/', false);

        // 5 Dedicated SEO Category sections
        $response->assertSee('id="rings-collection"', false);
        $response->assertSee('id="charms-pendants"', false);
        $response->assertSee('id="bracelets-collection"', false);
        $response->assertSee('id="earrings-collection"', false);
        $response->assertSee('id="necklaces-collection"', false);

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

        $response->assertSee('Naruto Decal | Tabstick Jewelry');
        $response->assertSee('Naruto Decal - Tabstick Fine Jewelry');
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

    public function test_structured_data_on_all_pages_is_valid_rfc_json_with_zero_bad_escape_sequences(): void
    {
        $category = Category::create(['name' => "Collector's & Gamer's Pack", 'slug' => 'collectors-gamers-pack']);
        $product = Product::create([
            'category_id' => $category->id,
            'name' => "We Ain't Broke & We Won't Stop",
            'slug' => 'we-aint-broke-wont-stop',
            'description' => "Collector's item with \"high durability\" & waterproof vinyl.",
            'price' => 59,
            'stock' => 15,
            'emoji' => '⚡',
            'image' => 'images/stickers/we-aint-broke.jpg',
            'is_active' => true,
        ]);

        // 1. Product Page Verification
        $productRes = $this->get(route('products.show', $product));
        $productRes->assertOk();
        preg_match_all('/<script type="application\/ld\+json">(.*?)<\/script>/s', $productRes->getContent(), $productMatches);
        $this->assertNotEmpty($productMatches[1], 'Product page must contain JSON-LD scripts');
        foreach ($productMatches[1] as $idx => $jsonSnippet) {
            $trimmed = trim($jsonSnippet);
            $decoded = json_decode($trimmed, true);
            $this->assertNotNull($decoded, "Product JSON-LD block #{$idx} failed to parse: " . json_last_error_msg());
            $this->assertStringNotContainsString("&#039;", $trimmed, 'JSON-LD must not contain HTML entity &#039;');
            $this->assertStringNotContainsString("\\'", $trimmed, 'JSON-LD must not contain bad escape sequence \\\'');
        }

        // 2. Category Page Verification
        $catRes = $this->get(route('category.show', $category->slug));
        $catRes->assertOk();
        preg_match_all('/<script type="application\/ld\+json">(.*?)<\/script>/s', $catRes->getContent(), $catMatches);
        $this->assertNotEmpty($catMatches[1], 'Category page must contain JSON-LD scripts');
        foreach ($catMatches[1] as $idx => $jsonSnippet) {
            $trimmed = trim($jsonSnippet);
            $decoded = json_decode($trimmed, true);
            $this->assertNotNull($decoded, "Category JSON-LD block #{$idx} failed to parse: " . json_last_error_msg());
            $this->assertStringNotContainsString("&#039;", $trimmed, 'JSON-LD must not contain HTML entity &#039;');
            $this->assertStringNotContainsString("\\'", $trimmed, 'JSON-LD must not contain bad escape sequence \\\'');
        }

        // 3. Homepage Verification
        $homeRes = $this->get('/');
        $homeRes->assertOk();
        preg_match_all('/<script type="application\/ld\+json">(.*?)<\/script>/s', $homeRes->getContent(), $homeMatches);
        $this->assertNotEmpty($homeMatches[1], 'Home page must contain JSON-LD scripts');
        foreach ($homeMatches[1] as $idx => $jsonSnippet) {
            $trimmed = trim($jsonSnippet);
            $decoded = json_decode($trimmed, true);
            $this->assertNotNull($decoded, "Homepage JSON-LD block #{$idx} failed to parse: " . json_last_error_msg());
            $this->assertStringNotContainsString("&#039;", $trimmed, 'JSON-LD must not contain HTML entity &#039;');
            $this->assertStringNotContainsString("\\'", $trimmed, 'JSON-LD must not contain bad escape sequence \\\'');
        }

        // 4. Portfolio Page Verification
        $portfolioRes = $this->get('/maayank');
        $portfolioRes->assertOk();
        preg_match_all('/<script type="application\/ld\+json">(.*?)<\/script>/s', $portfolioRes->getContent(), $portfolioMatches);
        $this->assertNotEmpty($portfolioMatches[1], 'Portfolio page must contain JSON-LD scripts');
        foreach ($portfolioMatches[1] as $idx => $jsonSnippet) {
            $trimmed = trim($jsonSnippet);
            $decoded = json_decode($trimmed, true);
            $this->assertNotNull($decoded, "Portfolio JSON-LD block #{$idx} failed to parse: " . json_last_error_msg());
            $this->assertStringNotContainsString("&#039;", $trimmed, 'JSON-LD must not contain HTML entity &#039;');
            $this->assertStringNotContainsString("\\'", $trimmed, 'JSON-LD must not contain bad escape sequence \\\'');
        }
    }
}
