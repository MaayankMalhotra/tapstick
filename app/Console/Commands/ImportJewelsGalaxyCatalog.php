<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ImportJewelsGalaxyCatalog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:jewelsgalaxy {--file=database/data/jewelsgalaxy_catalog.json : Path to the catalog JSON file} {--fetch : Force fetch live from jewelsgalaxy.com}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Jewels Galaxy jewelry catalog (rings, pendants, bracelets, earrings, necklaces) into the database';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $filePath = base_path($this->option('file'));
        $forceFetch = $this->option('fetch');

        $catalog = [];

        if (!$forceFetch && file_exists($filePath)) {
            $this->info("📖 Reading catalog file: {$filePath}");
            $catalog = json_decode(file_get_contents($filePath), true) ?: [];
        }

        if (empty($catalog)) {
            $this->info("🌐 Scraping live catalog from jewelsgalaxy.com...");
            $catalog = $this->scrapeLiveCatalog();
        }

        if (empty($catalog)) {
            $this->error("Failed to load or scrape catalog data.");
            return Command::FAILURE;
        }

        $this->info("Found " . count($catalog) . " products. Ensuring categories exist...");

        $categoryDefinitions = [
            'rings' => ['name' => 'Rings', 'emoji' => '💍'],
            'charms-pendants' => ['name' => 'Charms & Pendants', 'emoji' => '📿'],
            'bracelets' => ['name' => 'Bracelets', 'emoji' => '✨'],
            'earrings' => ['name' => 'Earrings', 'emoji' => '💎'],
            'necklaces' => ['name' => 'Necklaces', 'emoji' => '👑'],
            'jewelry-sets' => ['name' => 'Jewelry Sets', 'emoji' => '🎁'],
        ];

        $categoryMap = [];
        foreach ($categoryDefinitions as $slug => $data) {
            $cat = Category::firstOrCreate(['slug' => $slug], ['name' => $data['name']]);
            $categoryMap[$slug] = $cat->id;
        }

        $this->info("Categories created/verified. Processing products into database...");

        $importedCount = 0;
        $updatedCount = 0;
        $slugTracker = [];

        $bar = $this->output->createProgressBar(count($catalog));
        $bar->start();

        $chunks = array_chunk($catalog, 100);

        foreach ($chunks as $chunk) {
            DB::transaction(function () use ($chunk, $categoryMap, $categoryDefinitions, &$importedCount, &$updatedCount, &$slugTracker, $bar) {
                foreach ($chunk as $item) {
                    $bar->advance();

                    $title = trim($item['title'] ?? 'Jewelry Piece');
                    $handle = trim($item['handle'] ?? Str::slug($title));
                    $id = $item['id'] ?? null;

                    $slug = $handle;
                    if (isset($slugTracker[$slug])) {
                        $slug = "{$handle}-{$id}";
                    }
                    $slugTracker[$slug] = true;

                    // Pricing
                    $variants = $item['variants'] ?? [];
                    $firstVar = $variants[0] ?? [];
                    $rawPrice = floatval($firstVar['price'] ?? 399);
                    $price = $rawPrice > 0 ? $rawPrice : 399.00;

                    // Category
                    $catSlug = $this->determineCategory($item);
                    $categoryId = $categoryMap[$catSlug] ?? $categoryMap['rings'];
                    $emoji = $categoryDefinitions[$catSlug]['emoji'] ?? '💎';

                    // Image
                    $images = $item['images'] ?? [];
                    $firstImgUrl = $images[0]['src'] ?? null;
                    $imagePath = $firstImgUrl ? explode('?', $firstImgUrl)[0] : null;

                    // Description
                    $rawDesc = $item['body_html'] ?? '';
                    $cleanDesc = trim(strip_tags($rawDesc));
                    if (empty($cleanDesc)) {
                        $cleanDesc = "{$title}. Crafted with high-grade anti-tarnish stainless steel and premium plating for lasting shine and durability.";
                    }

                    $sku = 'JG-' . ($id ?? rand(10000, 99999));
                    $stock = rand(25, 80);

                    $product = Product::where('sku', $sku)->orWhere('slug', $slug)->first();

                    if ($product) {
                        $product->update([
                            'category_id' => $categoryId,
                            'name' => $title,
                            'slug' => $slug,
                            'description' => $cleanDesc,
                            'price' => $price,
                            'stock' => max($product->stock, $stock),
                            'image' => $imagePath ?: $product->image,
                            'emoji' => $emoji,
                            'is_active' => true,
                        ]);
                        $updatedCount++;
                    } else {
                        Product::create([
                            'category_id' => $categoryId,
                            'name' => $title,
                            'slug' => $slug,
                            'sku' => $sku,
                            'description' => $cleanDesc,
                            'price' => $price,
                            'stock' => $stock,
                            'low_stock_threshold' => 5,
                            'image' => $imagePath,
                            'emoji' => $emoji,
                            'is_active' => true,
                        ]);
                        $importedCount++;
                    }
                }
            });
        }

        $bar->finish();
        $this->newLine(2);

        $this->info("🎉 Jewels Galaxy import complete!");
        $this->info("   - New products created: {$importedCount}");
        $this->info("   - Existing products updated: {$updatedCount}");
        $this->info("   - Total active products: " . Product::where('is_active', true)->count());

        return Command::SUCCESS;
    }

    /**
     * Scrapes all pages from jewelsgalaxy.com products.json.
     */
    protected function scrapeLiveCatalog(): array
    {
        $allProducts = [];
        $page = 1;

        while (true) {
            $url = "https://jewelsgalaxy.com/products.json?limit=250&page=" . $page;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0");
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            $res = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($httpCode !== 200 || !$res) {
                break;
            }

            $data = json_decode($res, true);
            if (empty($data['products'])) {
                break;
            }

            foreach ($data['products'] as $product) {
                $allProducts[] = $product;
            }

            $page++;
            if ($page > 20) {
                break;
            }
        }

        return $allProducts;
    }

    /**
     * Determine category from item metadata.
     */
    protected function determineCategory(array $item): string
    {
        $pt = strtolower(trim($item['product_type'] ?? ''));
        $title = strtolower(trim($item['title'] ?? ''));

        if ($pt === 'rings') return 'rings';
        if ($pt === 'charms & pendants' || $pt === 'pendants') return 'charms-pendants';
        if ($pt === 'bracelets') return 'bracelets';
        if ($pt === 'earrings') return 'earrings';
        if ($pt === 'necklaces') return 'necklaces';
        if ($pt === 'jewelry sets') return 'jewelry-sets';

        if (str_contains($pt, 'earring') || str_contains($title, 'earring')) return 'earrings';
        if (str_contains($pt, 'pendant') || str_contains($pt, 'charm') || str_contains($title, 'pendant') || str_contains($title, 'charm')) return 'charms-pendants';
        if (str_contains($pt, 'bracelet') || str_contains($title, 'bracelet') || str_contains($title, 'bangle')) return 'bracelets';
        if (str_contains($pt, 'necklace') || str_contains($title, 'necklace')) return 'necklaces';
        if (str_contains($pt, 'set') || str_contains($title, 'jewelry set')) return 'jewelry-sets';
        if (str_contains($pt, 'ring') || str_contains($title, 'ring')) return 'rings';

        return 'rings';
    }
}
