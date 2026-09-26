<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $baseUrl = config('app.url');
        if (empty($baseUrl) || str_contains($baseUrl, 'localhost') || str_contains($baseUrl, '127.0.0.1')) {
            $baseUrl = 'https://tabstick.in';
        }
        $baseUrl = rtrim($baseUrl, '/');
        
        $products = Product::where('is_active', true)
            ->select(['id', 'name', 'slug', 'image', 'updated_at'])
            ->orderBy('id', 'desc')
            ->get();

        $categories = Category::whereHas('products', function ($q) {
            $q->where('is_active', true);
        })->get();

        $now = now()->toAtomString();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" ';
        $xml .= 'xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";

        // Homepage
        $xml .= "  <url>\n";
        $xml .= "    <loc>{$baseUrl}/</loc>\n";
        $xml .= "    <lastmod>{$now}</lastmod>\n";
        $xml .= "    <changefreq>daily</changefreq>\n";
        $xml .= "    <priority>1.0</priority>\n";
        $xml .= "  </url>\n";

        // Collections Directory Hub
        $xml .= "  <url>\n";
        $xml .= "    <loc>{$baseUrl}/categories</loc>\n";
        $xml .= "    <lastmod>{$now}</lastmod>\n";
        $xml .= "    <changefreq>weekly</changefreq>\n";
        $xml .= "    <priority>0.9</priority>\n";
        $xml .= "  </url>\n";

        // Database Category Collections
        foreach ($categories as $category) {
            $catLoc = htmlspecialchars("{$baseUrl}/category/" . $category->slug, ENT_XML1, 'UTF-8');
            $catLastMod = $category->updated_at ? $category->updated_at->toAtomString() : $now;
            $xml .= "  <url>\n";
            $xml .= "    <loc>{$catLoc}</loc>\n";
            $xml .= "    <lastmod>{$catLastMod}</lastmod>\n";
            $xml .= "    <changefreq>weekly</changefreq>\n";
            $xml .= "    <priority>0.9</priority>\n";
            $xml .= "  </url>\n";
        }

        // Curated High-Intent Collections
        $curatedSlugs = ['laptop-stickers', 'car-stickers', 'phone-stickers', 'college-stickers', 'custom-stickers'];
        foreach ($curatedSlugs as $cSlug) {
            $curLoc = htmlspecialchars("{$baseUrl}/category/{$cSlug}", ENT_XML1, 'UTF-8');
            $xml .= "  <url>\n";
            $xml .= "    <loc>{$curLoc}</loc>\n";
            $xml .= "    <lastmod>{$now}</lastmod>\n";
            $xml .= "    <changefreq>weekly</changefreq>\n";
            $xml .= "    <priority>0.9</priority>\n";
            $xml .= "  </url>\n";
        }

        // Founder & Engineer Portfolio (Top Priority for Knowledge Graph Indexing)
        $xml .= "  <url>\n";
        $xml .= "    <loc>{$baseUrl}/maayank</loc>\n";
        $xml .= "    <lastmod>{$now}</lastmod>\n";
        $xml .= "    <changefreq>daily</changefreq>\n";
        $xml .= "    <priority>1.0</priority>\n";
        $xml .= "  </url>\n";
        $xml .= "  <url>\n";
        $xml .= "    <loc>{$baseUrl}/maayank/resume</loc>\n";
        $xml .= "    <lastmod>{$now}</lastmod>\n";
        $xml .= "    <changefreq>weekly</changefreq>\n";
        $xml .= "    <priority>0.9</priority>\n";
        $xml .= "  </url>\n";

        // Prem Medical Centre (Sector 19, Faridabad)
        $xml .= "  <url>\n";
        $xml .= "    <loc>{$baseUrl}/prem-medical-center</loc>\n";
        $xml .= "    <lastmod>{$now}</lastmod>\n";
        $xml .= "    <changefreq>weekly</changefreq>\n";
        $xml .= "    <priority>0.95</priority>\n";
        $xml .= "  </url>\n";

        // Active Product URLs with Image Sitemap
        foreach ($products as $product) {
            $prodLoc = htmlspecialchars("{$baseUrl}/products/" . $product->slug, ENT_XML1, 'UTF-8');
            $prodLastMod = $product->updated_at ? $product->updated_at->toAtomString() : $now;
            
            $xml .= "  <url>\n";
            $xml .= "    <loc>{$prodLoc}</loc>\n";
            $xml .= "    <lastmod>{$prodLastMod}</lastmod>\n";
            $xml .= "    <changefreq>weekly</changefreq>\n";
            $xml .= "    <priority>0.8</priority>\n";

            if ($product->image) {
                $imgUrl = str_starts_with($product->image, 'http')
                    ? $product->image
                    : (str_starts_with($product->image, 'images/') ? "{$baseUrl}/{$product->image}" : "{$baseUrl}/storage/{$product->image}");
                
                $escapedImgUrl = htmlspecialchars($imgUrl, ENT_XML1, 'UTF-8');
                $escapedImgTitle = htmlspecialchars($product->name . ' Vinyl Sticker - Tabstick', ENT_XML1, 'UTF-8');

                $xml .= "    <image:image>\n";
                $xml .= "      <image:loc>{$escapedImgUrl}</image:loc>\n";
                $xml .= "      <image:title>{$escapedImgTitle}</image:title>\n";
                $xml .= "    </image:image>\n";
            }

            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200, [
            'Content-Type' => 'application/xml; charset=utf-8',
            'Cache-Control' => 'public, max-age=3600',
        ]);
    }
}
