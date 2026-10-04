<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        // 1. Delete all stickitup products with STK- or STICK- SKUs
        $stkProdIds = DB::table('products')
            ->where('sku', 'like', 'STK-%')
            ->orWhere('sku', 'like', 'STICK-%')
            ->pluck('id');

        if ($stkProdIds->isNotEmpty()) {
            DB::table('order_items')->whereIn('product_id', $stkProdIds)->update(['product_id' => null]);
            DB::table('stock_movements')->whereIn('product_id', $stkProdIds)->delete();
            DB::table('products')->whereIn('id', $stkProdIds)->delete();
        }

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
            $catProdIds = DB::table('products')->whereIn('category_id', $categoryIds)->pluck('id');
            if ($catProdIds->isNotEmpty()) {
                DB::table('order_items')->whereIn('product_id', $catProdIds)->update(['product_id' => null]);
                DB::table('stock_movements')->whereIn('product_id', $catProdIds)->delete();
                DB::table('products')->whereIn('id', $catProdIds)->delete();
            }
            DB::table('categories')->whereIn('id', $categoryIds)->delete();
        }

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No reversal
    }
};
