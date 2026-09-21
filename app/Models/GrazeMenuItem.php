<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GrazeMenuItem extends Model
{
    use HasFactory;

    protected $table = 'graze_menu_items';

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'type',
        'price',
        'unit',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(GrazeMenuCategory::class, 'category_id');
    }
}
