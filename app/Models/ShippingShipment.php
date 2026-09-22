<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShippingShipment extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return ['shipping_charge' => 'decimal:2', 'last_synced_at' => 'datetime'];
    }

    public function fulfillment(): BelongsTo
    {
        return $this->belongsTo(OrderFulfillment::class, 'order_fulfillment_id');
    }

    public function events(): HasMany
    {
        return $this->hasMany(ShippingEvent::class);
    }
}
