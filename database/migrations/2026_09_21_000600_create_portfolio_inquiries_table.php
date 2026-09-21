<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('portfolio_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 150)->index();
            $table->string('phone', 30)->nullable();
            $table->string('subject', 150)->nullable();
            $table->text('message');
            $table->string('ip_address', 45)->nullable();
            $table->boolean('email_sent_to_user')->default(false);
            $table->boolean('email_sent_to_admin')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio_inquiries');
    }
};
