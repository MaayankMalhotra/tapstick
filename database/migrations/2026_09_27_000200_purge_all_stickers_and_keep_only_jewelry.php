<?php

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
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
            DB::table('products')->whereIn('category_id', $nonJewelryCategoryIds)->delete();
            DB::table('categories')->whereIn('id', $nonJewelryCategoryIds)->delete();
        }

        // 2. Remove legacy sticker products by SKU or naming (safeguarding the test sticker for tests)
        DB::table('products')
            ->where('sku', '!=', Product::TEST_STICKER_SKU)
            ->where('slug', '!=', 'one-rupee-test-sticker')
            ->where(function ($query) {
                $query->where('name', 'like', '%sticker%')
                      ->orWhere('name', 'like', '%decal%')
                      ->orWhere('slug', 'like', '%sticker%')
                      ->orWhere('sku', 'like', 'STICK-%');
            })
            ->delete();

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
