<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $stickersCat = Category::firstOrCreate(['slug' => 'stickers'], ['name' => 'Stickers & Skins']);
        $mysteryCat = Category::firstOrCreate(['slug' => 'mystery-box'], ['name' => 'Mystery Box']);
        $clothingCat = Category::firstOrCreate(['slug' => 'clothing'], ['name' => 'Clothing']);

        $catalog = [
            ['Limited Edition V2 Sticker', 'limited-edition-v2-sticker', 'SKU-LTD-V2', $stickersCat->id, 15.00, 'images/limited-edition.jpg', '⭐', 'Limited Edition V2 Waterproof Die-Cut Vinyl Sticker. High quality sharp print from durable UV-resistant ink.'],
            ['Wasted Sticker', 'wasted-sticker', 'SKU-WASTED', $stickersCat->id, 10.00, 'images/wasted.jpg', '🎯', 'Wasted GTA Style Waterproof Vinyl Sticker for laptops, bikes and bottles.'],
            ['AH SHIT HERE WE GO AGAIN Sticker', 'ah-shit-here-we-go-again', 'SKU-AH-SHIT', $stickersCat->id, 15.00, 'images/ah-shit.jpg', '🔥', 'Classic Meme Waterproof Vinyl Sticker with matte finish and residue-free removal.'],
            ['FIZZY ZERO Sticker', 'fizzy-zero-sticker', 'SKU-FIZZY-ZERO', $stickersCat->id, 10.00, 'images/fizzy-zero.jpg', '🥤', 'Fizzy Zero Can Waterproof Vinyl Sticker. Vibrant colors and scratchproof lamination.'],
            ['Keep Distance Sticker', 'keep-distance-sticker', 'SKU-KEEP-DIST', $stickersCat->id, 10.00, 'images/keep-distance.jpg', '⚠️', 'Keep Distance Bumper & Bike Vinyl Sticker. Outdoor durable and weatherproof.'],
            ['Mystery Box 2 [20 Random Stickers]', 'mystery-box-2', 'SKU-MYSTERY-20', $mysteryCat->id, 349.00, 'images/mystery-box.jpg', '🎁', 'Curated box of 20 random premium waterproof vinyl stickers with top-rated designs.'],
            ["We Ain't Broke We Just Sticker", 'we-aint-broke-sticker', 'SKU-WE-AINT-BROKE', $stickersCat->id, 10.00, 'images/we-aint-broke.jpg', '💸', 'Street Style Waterproof Vinyl Sticker with bold typography.'],
            ['Uchiha Shadow Sticker', 'uchiha-shadow-sticker', 'SKU-UCHIHA-SHADOW', $stickersCat->id, 10.00, 'images/uchiha.jpg', '⚡', 'Anime Series Waterproof Vinyl Sticker for laptops, phones and helmets.'],
        ];

        $popularCat = Category::firstOrCreate(['slug' => 'popular'], ['name' => 'Popular']);
        foreach ([['Good Vibes','good-vibes','☀️',99],['Create More','create-more','✦',89],['Road Trip','road-trip','🚗',119],['No Bad Days','no-bad-days','🌈',99]] as [$name,$slug,$emoji,$price]) {
            Product::firstOrCreate(
                ['slug' => $slug],
                [
                    'sku' => 'DEMO-'.strtoupper($slug),
                    'category_id' => $popularCat->id,
                    'name' => $name,
                    'emoji' => $emoji,
                    'price' => $price,
                    'stock' => 100,
                    'is_active' => true,
                    'description' => 'Sample product. Replace with your actual product description before launch.'
                ]
            );
        }

        foreach ($catalog as [$name, $slug, $sku, $catId, $price, $image, $emoji, $desc]) {
            Product::firstOrCreate(
                ['slug' => $slug],
                [
                    'name' => $name,
                    'sku' => $sku,
                    'category_id' => $catId,
                    'price' => $price,
                    'image' => $image,
                    'emoji' => $emoji,
                    'description' => $desc,
                    'stock' => 100,
                    'is_active' => true,
                ]
            );
        }
    }
}
