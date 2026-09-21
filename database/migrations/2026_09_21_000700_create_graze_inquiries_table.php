<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('graze_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 100);
            $table->string('phone', 50);
            $table->string('email', 150)->index();
            $table->string('event_date', 50)->nullable();
            $table->string('city', 150)->nullable();
            $table->integer('guest_count')->nullable();
            $table->string('budget', 50)->nullable();
            $table->string('event_type', 50)->nullable();
            $table->string('service', 100)->nullable();
            $table->string('dietary', 100)->nullable();
            $table->text('vision')->nullable();
            $table->string('status', 30)->default('new')->index();
            $table->text('admin_notes')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('graze_inquiries');
    }
};
