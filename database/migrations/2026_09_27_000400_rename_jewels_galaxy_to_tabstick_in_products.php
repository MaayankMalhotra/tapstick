<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Rename Jewels Galaxy to Tabstick in product names, descriptions, and slugs
        DB::table('products')
            ->where('name', 'like', '%Jewels Galaxy%')
            ->update([
                'name' => DB::raw("REPLACE(name, 'Jewels Galaxy', 'Tabstick')"),
            ]);

        DB::table('products')
            ->where('description', 'like', '%Jewels Galaxy%')
            ->update([
                'description' => DB::raw("REPLACE(description, 'Jewels Galaxy', 'Tabstick')"),
            ]);

        DB::table('products')
            ->where('slug', 'like', '%jewels-galaxy%')
            ->update([
                'slug' => DB::raw("REPLACE(slug, 'jewels-galaxy', 'tabstick')"),
            ]);

        // 2. Re-run import:jewelsgalaxy with the new Tabstick branding
        Artisan::call('import:jewelsgalaxy');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Keep Tabstick brand
    }
};
