<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderFulfillment extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'accepted_at' => 'datetime',
            'production_started_at' => 'datetime',
            'production_completed_at' => 'datetime',
            'packed_at' => 'datetime',
            'ready_for_pickup_at' => 'datetime',
            'handed_over_at' => 'datetime',
            'delivered_at' => 'datetime',
        ];
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(FulfillmentItem::class);
    }

    public function shipment(): HasOne
    {
        return $this->hasOne(ShippingShipment::class);
    }

    public function histories(): HasMany
    {
        return $this->hasMany(FulfillmentStatusHistory::class);
    }
}
