<?php

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        $allowedSlugs = [
            'rings',
            'charms-pendants',
            'bracelets',
            'earrings',
            'necklaces',
            'jewelry-sets',
            'test-stickers',
        ];

        // 1. Remove all legacy sticker categories and their associated products on production
        $nonJewelryCategoryIds = DB::table('categories')
            ->whereNotIn('slug', $allowedSlugs)
            ->pluck('id');

        if ($nonJewelryCategoryIds->isNotEmpty()) {
            $legacyProdIds = DB::table('products')->whereIn('category_id', $nonJewelryCategoryIds)->pluck('id');
            if ($legacyProdIds->isNotEmpty()) {
                DB::table('order_items')->whereIn('product_id', $legacyProdIds)->update(['product_id' => null]);
                DB::table('stock_movements')->whereIn('product_id', $legacyProdIds)->delete();
                DB::table('products')->whereIn('id', $legacyProdIds)->delete();
            }
            DB::table('categories')->whereIn('id', $nonJewelryCategoryIds)->delete();
        }

        // 2. Remove legacy sticker products by SKU or naming (safeguarding the test sticker for tests)
        $stickerProdIds = DB::table('products')
            ->where('sku', '!=', Product::TEST_STICKER_SKU)
            ->where('slug', '!=', 'one-rupee-test-sticker')
            ->where(function ($query) {
                $query->where('name', 'like', '%sticker%')
                      ->orWhere('name', 'like', '%decal%')
                      ->orWhere('slug', 'like', '%sticker%')
                      ->orWhere('sku', 'like', 'STICK-%');
            })
            ->pluck('id');

        if ($stickerProdIds->isNotEmpty()) {
            DB::table('order_items')->whereIn('product_id', $stickerProdIds)->update(['product_id' => null]);
            DB::table('stock_movements')->whereIn('product_id', $stickerProdIds)->delete();
            DB::table('products')->whereIn('id', $stickerProdIds)->delete();
        }

        Schema::enableForeignKeyConstraints();

        // 3. Ensure the Jewels Galaxy jewelry catalog is loaded
        Artisan::call('import:jewelsgalaxy');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Keep jewelry catalog intact
    }
};
