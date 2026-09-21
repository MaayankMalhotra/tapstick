<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GrazeMenuCategory extends Model
{
    use HasFactory;

    protected $table = 'graze_menu_categories';

    protected $fillable = [
        'slug',
        'name',
        'subtitle',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(GrazeMenuItem::class, 'category_id')->orderBy('sort_order')->orderBy('id');
    }

    public function activeItems(): HasMany
    {
        return $this->hasMany(GrazeMenuItem::class, 'category_id')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id');
    }
}
