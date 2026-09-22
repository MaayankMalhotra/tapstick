<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FulfillmentStatusHistory extends Model
{
    protected $guarded = [];

    public function fulfillment(): BelongsTo
    {
        return $this->belongsTo(OrderFulfillment::class, 'order_fulfillment_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
