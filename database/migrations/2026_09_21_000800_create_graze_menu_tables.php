<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('graze_menu_categories', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 50)->unique();
            $table->string('name', 100);
            $table->text('subtitle')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('graze_menu_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('graze_menu_categories')->onDelete('cascade');
            $table->string('name', 150);
            $table->text('description')->nullable();
            $table->string('type', 30)->default('Veg'); // Veg, Non-Veg, Veg / Non-Veg
            $table->string('price', 30); // e.g. $3.00, $28.00, from $90
            $table->string('unit', 30)->nullable(); // e.g. / pc, / pp, / cup, / platter, ea, / plate
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('graze_menu_items');
        Schema::dropIfExists('graze_menu_categories');
    }
};
