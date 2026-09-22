<?php

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        $now = now();

        $categoryId = DB::table('categories')->where('slug', 'test-stickers')->value('id');
        if (! $categoryId) {
            $categoryId = DB::table('categories')->insertGetId([
                'name' => 'Test Stickers',
                'slug' => 'test-stickers',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        DB::table('products')->updateOrInsert(
            ['sku' => Product::TEST_STICKER_SKU],
            [
                'category_id' => $categoryId,
                'name' => 'Test Sticker',
                'slug' => 'one-rupee-test-sticker',
                'description' => '₹1 test sticker for checkout verification. Free delivery enabled for this test product only.',
                'price' => 1.00,
                'stock' => 100000,
                'low_stock_threshold' => 1,
                'image' => null,
                'emoji' => '⚡',
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );
    }

    public function down(): void
    {
        DB::table('products')->where('sku', Product::TEST_STICKER_SKU)->delete();

        $categoryId = DB::table('categories')->where('slug', 'test-stickers')->value('id');
        if ($categoryId && ! DB::table('products')->where('category_id', $categoryId)->exists()) {
            DB::table('categories')->where('id', $categoryId)->delete();
        }
    }
};
