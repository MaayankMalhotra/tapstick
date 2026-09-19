<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); $table->string('name'); $table->string('slug')->unique(); $table->timestamps();
        });
        Schema::create('products', function (Blueprint $table) {
            $table->id(); $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name'); $table->string('slug')->unique(); $table->text('description')->nullable();
            $table->decimal('price', 10, 2); $table->unsignedInteger('stock')->default(0); $table->string('image')->nullable();
            $table->string('emoji', 10)->nullable(); $table->boolean('is_active')->default(true); $table->timestamps();
        });
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete(); $table->string('order_number')->unique();
            $table->string('customer_name'); $table->string('email'); $table->string('phone', 20); $table->text('address');
            $table->string('city'); $table->string('state'); $table->string('postal_code', 12);
            $table->decimal('subtotal', 10, 2); $table->decimal('shipping', 10, 2)->default(0); $table->decimal('total', 10, 2);
            $table->string('payment_method'); $table->string('payment_status')->default('pending'); $table->string('status')->default('placed');
            $table->string('razorpay_order_id')->nullable(); $table->string('razorpay_payment_id')->nullable(); $table->timestamps();
        });
        Schema::create('order_items', function (Blueprint $table) {
            $table->id(); $table->foreignId('order_id')->constrained()->cascadeOnDelete(); $table->foreignId('product_id')->nullable()->constrained()->nullOnDelete();
            $table->string('product_name'); $table->decimal('unit_price', 10, 2); $table->unsignedInteger('quantity'); $table->decimal('line_total', 10, 2); $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('order_items'); Schema::dropIfExists('orders'); Schema::dropIfExists('products'); Schema::dropIfExists('categories'); }
};
