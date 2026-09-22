<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vendor extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return ['is_active' => 'boolean', 'pickup_synced_at' => 'datetime'];
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)
            ->withPivot(['vendor_cost', 'vendor_stock', 'production_days', 'is_primary', 'is_active'])
            ->withTimestamps();
    }

    public function fulfillments(): HasMany
    {
        return $this->hasMany(OrderFulfillment::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function readyForAutomaticShipping(): bool
    {
        return $this->is_active && filled($this->shiprocket_pickup_location);
    }
}
