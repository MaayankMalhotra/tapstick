<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('business_name');
            $table->string('contact_person');
            $table->string('email')->unique();
            $table->string('phone', 20);
            $table->text('pickup_address');
            $table->text('pickup_address_2')->nullable();
            $table->string('pickup_city', 80);
            $table->string('pickup_state', 80);
            $table->string('pickup_postal_code', 12);
            $table->string('pickup_country', 80)->default('India');
            $table->text('return_address')->nullable();
            $table->text('pickup_instructions')->nullable();
            $table->string('shiprocket_pickup_location')->nullable()->unique();
            $table->string('shiprocket_pickup_id')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('pickup_synced_at')->nullable();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('vendor_id')->nullable()->after('id')->constrained()->nullOnDelete();
            $table->boolean('is_vendor')->default(false)->after('is_admin');
        });

        Schema::create('product_vendor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('vendor_id')->constrained()->cascadeOnDelete();
            $table->decimal('vendor_cost', 10, 2)->default(0);
            $table->unsignedInteger('vendor_stock')->default(0);
            $table->unsignedInteger('production_days')->default(1);
            $table->boolean('is_primary')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->unique(['product_id', 'vendor_id']);
        });

        Schema::create('order_fulfillments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('vendor_id')->nullable()->constrained()->nullOnDelete();
            $table->string('fulfillment_number')->unique();
            $table->string('status')->default('awaiting_vendor_acceptance');
            $table->string('shipping_status')->default('not_created');
            $table->text('packaging_instructions')->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('production_started_at')->nullable();
            $table->timestamp('production_completed_at')->nullable();
            $table->timestamp('packed_at')->nullable();
            $table->timestamp('ready_for_pickup_at')->nullable();
            $table->timestamp('handed_over_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamps();
            $table->unique(['order_id', 'vendor_id']);
        });

        Schema::create('fulfillment_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_fulfillment_id')->constrained()->cascadeOnDelete();
            $table->foreignId('order_item_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->nullable()->constrained()->nullOnDelete();
            $table->string('product_name');
            $table->unsignedInteger('quantity');
            $table->decimal('unit_price', 10, 2);
            $table->decimal('line_total', 10, 2);
            $table->timestamps();
        });

        Schema::create('shipping_shipments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_fulfillment_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('provider')->default('shiprocket');
            $table->string('status')->default('pending');
            $table->string('provider_order_id')->nullable()->unique();
            $table->string('provider_shipment_id')->nullable()->unique();
            $table->string('awb_code')->nullable()->unique();
            $table->string('courier_name')->nullable();
            $table->string('courier_company_id')->nullable();
            $table->decimal('shipping_charge', 10, 2)->nullable();
            $table->string('tracking_url')->nullable();
            $table->string('label_url')->nullable();
            $table->string('pickup_token_number')->nullable();
            $table->string('pickup_status')->default('not_requested');
            $table->text('last_error')->nullable();
            $table->timestamp('last_synced_at')->nullable();
            $table->timestamps();
        });

        Schema::create('shipping_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipping_shipment_id')->nullable()->constrained()->nullOnDelete();
            $table->string('provider')->default('shiprocket');
            $table->string('external_event_id')->nullable();
            $table->string('external_status');
            $table->string('mapped_status')->nullable();
            $table->json('payload')->nullable();
            $table->timestamp('occurred_at')->nullable();
            $table->timestamps();
            $table->unique(['provider', 'external_event_id']);
        });

        Schema::create('fulfillment_status_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_fulfillment_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('from_status')->nullable();
            $table->string('to_status');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fulfillment_status_histories');
        Schema::dropIfExists('shipping_events');
        Schema::dropIfExists('shipping_shipments');
        Schema::dropIfExists('fulfillment_items');
        Schema::dropIfExists('order_fulfillments');
        Schema::dropIfExists('product_vendor');
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('vendor_id');
            $table->dropColumn('is_vendor');
        });
        Schema::dropIfExists('vendors');
    }
};
