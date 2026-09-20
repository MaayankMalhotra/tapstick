<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ImportStickitupCatalog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:stickitup {--file=stickitup_data/stickitup_catalog.json : Path to the scraped catalog JSON file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import scraped stickitup.xyz products, categories, exact prices, and images into the database';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $filePath = base_path($this->option('file'));

        if (!file_exists($filePath)) {
            $this->error("Catalog file not found at: {$filePath}");
            return Command::FAILURE;
        }

        $this->info("📖 Reading catalog file: {$filePath}");
        $catalog = json_decode(file_get_contents($filePath), true);

        if (!is_array($catalog) || empty($catalog)) {
            $this->error("Invalid or empty catalog JSON format.");
            return Command::FAILURE;
        }

        $this->info("Found " . count($catalog) . " products in catalog. Preparing categories...");

        // 1. Ensure Categories Exist
        $categoryDefinitions = [
            'memes' => ['name' => 'Memes & Desi Pop', 'emoji' => '👑'],
            'stickers' => ['name' => 'Streetwear Stickers', 'emoji' => '⚡'],
            'glitter-holo' => ['name' => 'Glitter & Holographic', 'emoji' => '✨'],
            'anime' => ['name' => 'Anime & Manga', 'emoji' => '🎌'],
            'cars-bikes' => ['name' => 'Cars & Bikes', 'emoji' => '🏍️'],
            'aesthetic' => ['name' => 'Aesthetic & Vibes', 'emoji' => '🌸'],
            'tech-dev' => ['name' => 'Tech & Gaming', 'emoji' => '💻'],
        ];

        $categoryMap = [];
        foreach ($categoryDefinitions as $slug => $data) {
            $cat = Category::firstOrCreate(['slug' => $slug], ['name' => $data['name']]);
            $categoryMap[$slug] = $cat->id;
        }

        $this->info("Categories verified. Processing products...");

        $now = now();
        $importedCount = 0;
        $updatedCount = 0;
        $slugTracker = [];

        $bar = $this->output->createProgressBar(count($catalog));
        $bar->start();

        // Process in chunks for high performance
        $chunks = array_chunk($catalog, 200);

        foreach ($chunks as $chunk) {
            DB::transaction(function () use ($chunk, $categoryMap, $categoryDefinitions, &$importedCount, &$updatedCount, &$slugTracker, $now, $bar) {
                foreach ($chunk as $item) {
                    $bar->advance();

                    $title = trim($item['title'] ?? 'Vinyl Sticker');
                    $handle = trim($item['handle'] ?? Str::slug($title));
                    $id = $item['id'] ?? null;

                    // Ensure unique slug
                    $slug = $handle;
                    if (isset($slugTracker[$slug])) {
                        $slug = "{$handle}-{$id}";
                    }
                    $slugTracker[$slug] = true;

                    // Pricing extraction
                    $variants = $item['variants'] ?? [];
                    $firstVar = $variants[0] ?? [];
                    $rawPrice = floatval($firstVar['price'] ?? 29);
                    $price = $rawPrice > 0 ? $rawPrice : 29.00;

                    // Category assignment
                    $catSlug = $this->determineCategory($item);
                    $categoryId = $categoryMap[$catSlug] ?? $categoryMap['stickers'];
                    $emoji = $categoryDefinitions[$catSlug]['emoji'] ?? '✨';

                    // Image determination
                    $images = $item['images'] ?? [];
                    $firstImgUrl = $images[0]['src'] ?? null;
                    $imagePath = null;

                    if ($firstImgUrl) {
                        $cleanUrl = explode('?', $firstImgUrl)[0];
                        $ext = pathinfo($cleanUrl, PATHINFO_EXTENSION) ?: 'jpg';
                        $localFile = "images/stickers/{$handle}.{$ext}";
                        $localFileJpg = "images/stickers/{$handle}.jpg";

                        if (file_exists(public_path($localFile))) {
                            $imagePath = $localFile;
                        } elseif (file_exists(public_path($localFileJpg))) {
                            $imagePath = $localFileJpg;
                        } else {
                            // Fallback to Shopify CDN URL
                            $imagePath = $cleanUrl;
                        }
                    }

                    // Description clean up
                    $rawDesc = $item['body_html'] ?? '';
                    $cleanDesc = strip_tags($rawDesc);
                    if (empty($cleanDesc)) {
                        $cleanDesc = "Premium 100% waterproof automotive-grade vinyl sticker. Die-cut with ultra-vibrant UV inks, easy-peel backing, and zero sticky residue.";
                    }

                    $sku = 'STK-' . ($id ?? rand(10000, 99999));
                    $stock = rand(30, 95);

                    // Check if already exists by sku or slug
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
                            'low_stock_threshold' => 10,
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

        $this->info("🎉 Import complete!");
        $this->info("   - New products created: {$importedCount}");
        $this->info("   - Existing products updated: {$updatedCount}");
        $this->info("   - Total active products in database: " . Product::where('is_active', true)->count());

        return Command::SUCCESS;
    }

    /**
     * Categorize product using tags, title and product_type.
     */
    protected function determineCategory(array $item): string
    {
        $tags = $item['tags'] ?? [];
        $tagsStr = is_array($tags) ? implode(' ', $tags) : (string) $tags;
        $title = $item['title'] ?? '';
        $type = $item['product_type'] ?? '';

        $text = strtolower("{$tagsStr} {$title} {$type}");

        if (Str::contains($text, ['anime', 'naruto', 'goku', 'manga', 'luffy', 'demon slayer', 'jujutsu', 'itachi', 'dragon ball', 'one piece', 'zoro', 'titan', 'akatsuki', 'gojo'])) {
            return 'anime';
        }

        if (Str::contains($text, ['holo', 'holographic', 'glitter', 'metallic', 'sparkle', 'foil', 'iridescent'])) {
            return 'glitter-holo';
        }

        if (Str::contains($text, ['car', 'bike', 'bumper', 'moto', 'rider', 'enfield', 'superbike', 'helmet', 'drift', 'speed', 'racing', 'automobile', 'auto'])) {
            return 'cars-bikes';
        }

        if (Str::contains($text, ['meme', 'funny', 'relatable', 'humor', 'desi', 'joke', 'sarcasm', 'lafda', 'wasted', 'bhai', 'mood', 'chutiya', 'bakchodi', 'paisa'])) {
            return 'memes';
        }

        if (Str::contains($text, ['code', 'developer', 'hacker', 'tech', 'programmer', 'gaming', 'gamer', 'playstation', 'xbox', 'linux', 'python', 'javascript', 'git', 'bug'])) {
            return 'tech-dev';
        }

        if (Str::contains($text, ['aesthetic', 'vintage', 'retro', 'floral', 'lofi', 'chill', 'art', 'boho', 'pastel', 'nature', 'peace', 'minimal'])) {
            return 'aesthetic';
        }

        return 'stickers';
    }
}
