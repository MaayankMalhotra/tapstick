<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class FeedController extends Controller
{
    /**
     * Generate Google Merchant Center RSS 2.0 XML Feed for Free Product Listings.
     */
    public function googleShopping(): Response
    {
        $cacheFile = public_path('feed/google-shopping.xml');
        $cacheDir = public_path('feed');

        // Check if cached file exists and is less than 24 hours old (bypassed in testing)
        if (!app()->environment('testing') && File::exists($cacheFile) && (time() - File::lastModified($cacheFile) < 86400)) {
            $content = File::get($cacheFile);
            return response($content, 200, [
                'Content-Type' => 'application/xml; charset=utf-8',
                'Cache-Control' => 'public, max-age=3600',
            ]);
        }

        if (!File::isDirectory($cacheDir)) {
            File::makeDirectory($cacheDir, 0755, true, true);
        }

        $xml = $this->buildGoogleShoppingXml();
        File::put($cacheFile, $xml);

        return response($xml, 200, [
            'Content-Type' => 'application/xml; charset=utf-8',
            'Cache-Control' => 'public, max-age=3600',
        ]);
    }

    /**
     * Build the raw XML string for Google Merchant Center.
     */
    public function buildGoogleShoppingXml(): string
    {
        $baseUrl = rtrim(config('app.url', 'https://tabstick.in'), '/');
        if (str_contains($baseUrl, 'localhost') || str_contains($baseUrl, '127.0.0.1')) {
            $baseUrl = 'https://tabstick.in';
        }

        $products = Product::with('category:id,name,slug')
            ->where('is_active', true)
            ->where('stock', '>', 0)
            ->select(['id', 'category_id', 'name', 'slug', 'description', 'price', 'stock', 'image', 'updated_at'])
            ->orderBy('id', 'desc')
            ->get();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<rss version="2.0" xmlns:g="http://base.google.com/ns/1.0">' . "\n";
        $xml .= "  <channel>\n";
        $xml .= "    <title>Tabstick – 18K Gold Plated Fine Jewelry</title>\n";
        $xml .= "    <link>{$baseUrl}</link>\n";
        $xml .= "    <description>Discover anti-tarnish, water-resistant, hypoallergenic 18K gold-plated fine jewelry by Tabstick. Shop rings, necklaces, bracelets, earrings &amp; charms online in India.</description>\n";

        foreach ($products as $product) {
            $id = $product->id;
            $cleanTitle = str_ireplace(['Stick It Up', 'STICK IT UP', 'StickItUp', 'Tapstick'], 'Tabstick', trim($product->name));
            $title = htmlspecialchars($cleanTitle . ' – Tabstick Fine Jewelry', ENT_XML1, 'UTF-8');
            $rawDesc = $product->description ? trim($product->description) : "18K real gold plated anti-tarnish fine jewelry piece by Tabstick. Hypoallergenic, waterproof, and sweatproof for everyday luxury.";
            $descText = str_ireplace(['Stick It Up', 'STICK IT UP', 'StickItUp', 'Tapstick'], 'Tabstick', $rawDesc);
            $description = htmlspecialchars($descText, ENT_XML1, 'UTF-8');
            $link = htmlspecialchars("{$baseUrl}/products/{$product->slug}", ENT_XML1, 'UTF-8');
            
            // Image handling
            if (!empty($product->image)) {
                if (str_starts_with($product->image, 'http')) {
                    $imgUrl = $product->image;
                } elseif (str_starts_with($product->image, 'images/')) {
                    $imgUrl = "{$baseUrl}/" . ltrim($product->image, '/');
                } else {
                    $imgUrl = "{$baseUrl}/storage/" . ltrim($product->image, '/');
                }
            } else {
                $imgUrl = "https://cdn.shopify.com/s/files/1/0561/0215/8500/files/{$product->slug}.jpg";
            }
            $imgUrl = htmlspecialchars($imgUrl, ENT_XML1, 'UTF-8');

            $price = number_format((float) $product->price, 2, '.', '') . ' INR';
            $categoryName = $product->category ? htmlspecialchars($product->category->name, ENT_XML1, 'UTF-8') : 'Fine Jewelry';

            $xml .= "    <item>\n";
            $xml .= "      <g:id>{$id}</g:id>\n";
            $xml .= "      <g:title>{$title}</g:title>\n";
            $xml .= "      <g:description>{$description}</g:description>\n";
            $xml .= "      <g:link>{$link}</g:link>\n";
            $xml .= "      <g:image_link>{$imgUrl}</g:image_link>\n";
            $xml .= "      <g:condition>new</g:condition>\n";
            $xml .= "      <g:availability>in_stock</g:availability>\n";
            $xml .= "      <g:price>{$price}</g:price>\n";
            $xml .= "      <g:brand>Tabstick</g:brand>\n";
            $xml .= "      <g:identifier_exists>no</g:identifier_exists>\n";
            $xml .= "      <g:product_type>{$categoryName}</g:product_type>\n";
            $xml .= "      <g:google_product_category>188</g:google_product_category>\n";
            $xml .= "    </item>\n";
        }

        $xml .= "  </channel>\n";
        $xml .= "</rss>\n";

        return $xml;
    }
}
