<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Delete all stickitup products with STK- or STICK- SKUs
        DB::table('products')
            ->where('sku', 'like', 'STK-%')
            ->orWhere('sku', 'like', 'STICK-%')
            ->delete();

        // 2. Delete any legacy sticker categories and their products
        $stickerSlugs = [
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
            'laptop-stickers',
            'bottle-stickers',
            'bestsellers-stickers',
        ];

        $categoryIds = DB::table('categories')->whereIn('slug', $stickerSlugs)->pluck('id');
        if ($categoryIds->isNotEmpty()) {
            DB::table('products')->whereIn('category_id', $categoryIds)->delete();
            DB::table('categories')->whereIn('id', $categoryIds)->delete();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No reversal
    }
};
