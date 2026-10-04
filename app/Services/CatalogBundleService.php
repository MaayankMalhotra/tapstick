<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\File;
use ZipArchive;

class CatalogBundleService
{
    public const EXPORT_ZIP_NAME = 'tabstick-product-catalog-export.zip';
    public const PUBLIC_ZIP_NAME = 'tabstick-fine-jewelry-catalog.zip';

    /**
     * Get the query builder for landing page fine jewelry products.
     */
    public function getLandingPageCatalogQuery(): Builder
    {
        return Product::with('category:id,name,slug')
            ->where('is_active', true)
            ->where('stock', '>', 0)
            ->where(function ($q) {
                $q->whereNull('sku')->orWhere(function ($sub) {
                    $sub->where('sku', '!=', Product::TEST_STICKER_SKU)
                        ->where('sku', 'not like', 'STK-%')
                        ->where('sku', 'not like', 'STICK-%');
                });
            })
            ->whereDoesntHave('category', function ($q) {
                $q->whereIn('slug', [
                    'stickers',
                    'memes',
                    'glitter-holo',
                    'anime',
                    'cars-bikes',
                    'aesthetic',
                    'tech-dev',
                    'mystery-box',
                    'clothing',
                    'popular',
                    'test-stickers',
                ]);
            })
            ->orderBy('category_id')
            ->orderBy('name');
    }

    /**
     * Generate the complete product catalog bundle and zip file.
     *
     * @return array<string, mixed>
     */
    public function generateBundle(): array
    {
        $exportDir = storage_path('app/exports');
        $publicExportDir = storage_path('app/public/exports');

        if (!File::isDirectory($exportDir)) {
            File::makeDirectory($exportDir, 0755, true);
        }
        if (!File::isDirectory($publicExportDir)) {
            File::makeDirectory($publicExportDir, 0755, true);
        }

        $products = $this->getLandingPageCatalogQuery()->get();
        $totalProducts = $products->count();

        // 1. Build Category Summaries
        $categoriesSummary = [];
        $groupedByCategory = $products->groupBy(fn ($p) => $p->category?->slug ?? 'uncategorized');

        foreach ($groupedByCategory as $slug => $items) {
            $first = $items->first();
            $categoryName = $first->category?->name ?? 'Uncategorized';
            $prices = $items->pluck('price')->map(fn ($p) => (float)$p);
            $minPrice = $prices->min();
            $maxPrice = $prices->max();
            $avgPrice = round($prices->avg(), 2);
            $totalStock = $items->sum('stock');

            $categoriesSummary[] = [
                'category_name' => $categoryName,
                'category_slug' => $slug,
                'total_products' => $items->count(),
                'min_price_inr' => $minPrice,
                'max_price_inr' => $maxPrice,
                'average_price_inr' => $avgPrice,
                'total_inventory' => $totalStock,
            ];
        }

        // Sort categories summary alphabetically
        usort($categoriesSummary, fn ($a, $b) => strcmp($a['category_name'], $b['category_name']));

        // 2. Generate categories summary CSV
        $categoryCsvPath = $exportDir . '/tabstick-categories-summary.csv';
        $catHandle = fopen($categoryCsvPath, 'w');
        fputcsv($catHandle, [
            'category_name',
            'category_slug',
            'total_products',
            'min_price_inr',
            'max_price_inr',
            'average_price_inr',
            'total_inventory',
        ]);
        foreach ($categoriesSummary as $row) {
            fputcsv($catHandle, array_values($row));
        }
        fclose($catHandle);

        // 3. Generate products CSV
        $productCsvPath = $exportDir . '/tabstick-fine-jewelry-catalog.csv';
        $prodHandle = fopen($productCsvPath, 'w');
        fputcsv($prodHandle, [
            'id',
            'product_name',
            'slug',
            'sku',
            'category_name',
            'category_slug',
            'price_inr',
            'compare_at_price_inr',
            'discount_percent',
            'stock_quantity',
            'stock_status',
            'material_specifications',
            'waterproof_rating',
            'warranty',
            'hypoallergenic',
            'product_url',
            'image_url',
            'description',
            'created_at',
        ]);

        $baseUrl = rtrim(config('app.url', 'https://tabstick.in'), '/');
        if (str_contains($baseUrl, 'localhost') || str_contains($baseUrl, '127.0.0.1')) {
            $baseUrl = 'https://tabstick.in';
        }

        foreach ($products as $product) {
            $price = (float)$product->price;
            $comparePrice = (float)($product->compare_at_price ?: max(round($price * 2.2), $price + 499));
            $discountPercent = $comparePrice > $price ? round((($comparePrice - $price) / $comparePrice) * 100) : 0;

            $imgSrc = $product->image ?: 'https://cdn.shopify.com/s/files/1/0692/8800/1725/files/SMNJG-RNG-5565-M-1-2x.jpg';
            if (!str_starts_with($imgSrc, 'http')) {
                $imgSrc = str_starts_with($imgSrc, 'images/')
                    ? rtrim($baseUrl, '/') . '/' . ltrim($imgSrc, '/')
                    : rtrim($baseUrl, '/') . '/storage/' . ltrim($imgSrc, '/');
            }

            $productUrl = rtrim($baseUrl, '/') . '/products/' . $product->slug;

            $row = [
                'id' => $product->id,
                'product_name' => $product->name,
                'slug' => $product->slug,
                'sku' => $product->sku ?? ('TAB-' . $product->id),
                'category_name' => $product->category?->name ?? 'Fine Jewelry',
                'category_slug' => $product->category?->slug ?? 'fine-jewelry',
                'price_inr' => number_format($price, 2, '.', ''),
                'compare_at_price_inr' => number_format($comparePrice, 2, '.', ''),
                'discount_percent' => $discountPercent,
                'stock_quantity' => $product->stock,
                'stock_status' => $product->stock > 0 ? 'In Stock' : 'Out of Stock',
                'material_specifications' => '18K Vacuum Gold Plated over 316L Surgical Grade Stainless Steel',
                'waterproof_rating' => '100% Water & Sweatproof (Shower, Gym & Pool Safe)',
                'warranty' => '6-Month Anti-Tarnish Replacement Guarantee',
                'hypoallergenic' => '100% Hypoallergenic, Lead & Nickel Free (Zero Green Skin)',
                'product_url' => $productUrl,
                'image_url' => $imgSrc,
                'description' => trim(strip_tags((string)$product->description)) ?: $product->name,
                'created_at' => $product->created_at?->toIso8601String() ?? now()->toIso8601String(),
            ];

            fputcsv($prodHandle, array_values($row));
            $jsonProducts[] = $row;
        }
        fclose($prodHandle);

        // Also keep legacy name product-catalog-full.csv for backwards compatibility
        File::copy($productCsvPath, $exportDir . '/product-catalog-full.csv');

        // 4. Generate JSON catalog
        $productJsonPath = $exportDir . '/tabstick-fine-jewelry-catalog.json';
        $jsonData = [
            'brand' => 'Tabstick Fine Jewelry',
            'tagline' => 'Everyday Luxury Handcrafted to Never Tarnish',
            'website' => $baseUrl,
            'founder' => 'Maayank Malhotra',
            'exported_at' => now()->toIso8601String(),
            'currency' => 'INR',
            'total_products' => $totalProducts,
            'total_categories' => count($categoriesSummary),
            'warranty' => '6-Month Comprehensive Anti-Tarnish Replacement Warranty',
            'material_standard' => '18K Real Gold Vacuum Ion Plated over 316L Surgical Stainless Steel',
            'categories' => $categoriesSummary,
            'products' => $jsonProducts,
        ];
        File::put($productJsonPath, json_encode($jsonData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
        // Also keep legacy name product-catalog-full.json
        File::copy($productJsonPath, $exportDir . '/product-catalog-full.json');

        // 5. Generate README.txt
        $readmePath = $exportDir . '/README.txt';
        $readmeContent = $this->buildReadmeContent($totalProducts, count($categoriesSummary), $categoriesSummary, $baseUrl);
        File::put($readmePath, $readmeContent);

        // 6. Assemble the ZIP Archive
        $zipPath = $exportDir . '/' . self::EXPORT_ZIP_NAME;
        if (File::exists($zipPath)) {
            File::delete($zipPath);
        }

        $zip = new ZipArchive();
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            $zip->addFile($productCsvPath, 'tabstick-fine-jewelry-catalog.csv');
            $zip->addFile($productJsonPath, 'tabstick-fine-jewelry-catalog.json');
            $zip->addFile($categoryCsvPath, 'tabstick-categories-summary.csv');
            $zip->addFile($readmePath, 'README.txt');
            $zip->close();
        }

        // Copy to public exports for direct static or symlinked access
        $publicZipPath = $publicExportDir . '/' . self::PUBLIC_ZIP_NAME;
        File::copy($zipPath, $publicZipPath);

        return [
            'zip_path' => $zipPath,
            'public_zip_path' => $publicZipPath,
            'products_count' => $totalProducts,
            'categories_count' => count($categoriesSummary),
            'file_size' => File::size($zipPath),
            'files_included' => [
                'tabstick-fine-jewelry-catalog.csv',
                'tabstick-fine-jewelry-catalog.json',
                'tabstick-categories-summary.csv',
                'README.txt',
            ],
            'categories_summary' => $categoriesSummary,
        ];
    }

    /**
     * Build README.txt documentation for the bundle.
     *
     * @param array<int, array<string, mixed>> $categoriesSummary
     */
    protected function buildReadmeContent(int $totalProducts, int $totalCategories, array $categoriesSummary, string $baseUrl): string
    {
        $date = now()->format('F j, Y, g:i a T');
        $catList = '';
        foreach ($categoriesSummary as $c) {
            $catList .= sprintf(
                "  - %-22s: %3d pieces (₹%s to ₹%s, Avg: ₹%s)\n",
                $c['category_name'],
                $c['total_products'],
                number_format($c['min_price_inr']),
                number_format($c['max_price_inr']),
                number_format($c['average_price_inr'])
            );
        }

        return <<<TXT
================================================================================
TABSTICK FINE JEWELRY – COMPLETE PRODUCT CATALOG BUNDLE
================================================================================
Brand       : Tabstick Fine Jewelry
Website     : {$baseUrl}
Founder     : Maayank Malhotra
Generated   : {$date}
Catalog Size: {$totalProducts} Handcrafted Anti-Tarnish Fine Jewelry Pieces
Categories  : {$totalCategories} Curated Luxury Collections

FILES INCLUDED IN THIS ARCHIVE:
--------------------------------------------------------------------------------
1. tabstick-fine-jewelry-catalog.csv
   Complete tabular spreadsheet containing all {$totalProducts} active fine jewelry
   designs displayed on the Tabstick storefront.
   Columns:
     - id                      : Database unique identifier
     - product_name            : Verified product name (Tabstick branded)
     - slug                    : Clean URL slug
     - sku                     : Store Keeping Unit code
     - category_name           : Luxury category name
     - category_slug           : Category filtering slug
     - price_inr               : Current selling price in INR
     - compare_at_price_inr    : MRP / original retail price in INR
     - discount_percent        : Savings discount percentage
     - stock_quantity          : Real-time available warehouse stock
     - stock_status            : Current stock availability state
     - material_specifications : 18K Real Gold Vacuum Ion Plated / 316L Surgical Steel
     - waterproof_rating       : 100% Water & Sweatproof safe
     - warranty                : 6-Month Anti-Tarnish Comprehensive Warranty
     - hypoallergenic          : 100% Skin Safe & Nickel Free guarantee
     - product_url             : Live storefront canonical URL
     - image_url               : High-resolution product photography URL
     - description             : Full product details and craftsmanship description
     - created_at              : Catalog entry timestamp

2. tabstick-fine-jewelry-catalog.json
   Structured JSON feed of the entire catalog including complete store metadata,
   category breakdowns, and item specifications. Suitable for programmatic
   integration with marketplace feeds, mobile apps, or inventory databases.

3. tabstick-categories-summary.csv
   Summary of each collection with counts, price distribution, and inventory.

4. README.txt
   This documentation and metadata overview.

CATEGORY BREAKDOWN:
--------------------------------------------------------------------------------
{$catList}
THE TABSTICK STANDARD:
--------------------------------------------------------------------------------
- 18K Real Gold Plating: 10x vacuum ion-plating for deep, enduring lustre.
- Base Metal: 316L Surgical Stainless Steel (corrosion-proof).
- 100% Waterproof: Safe in showers, pools, gym workouts, and monsoons.
- Hypoallergenic: Zero nickel, zero lead, guaranteed zero green skin.
- 6-Month Guarantee: Free replacement if any piece ever tarnishes.
- Pan-India Express Delivery: Dispatched in 24–48 hours.

SUPPORT & INQUIRIES:
--------------------------------------------------------------------------------
Direct Desk: {$baseUrl}/maayank
Customer Care: hello@tabstick.in
Headquarters: New Delhi NCR, India

© 2026 Tabstick Fine Jewelry. All Rights Reserved.
================================================================================
TXT;
    }
}
