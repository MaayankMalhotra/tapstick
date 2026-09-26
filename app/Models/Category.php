<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getImageUrlAttribute(): string
    {
        $map = [
            'rings' => 'https://cdn.shopify.com/s/files/1/0692/8800/1725/files/SMNJG-RNG-5565-M-1-2x.jpg',
            'charms-pendants' => 'https://cdn.shopify.com/s/files/1/0692/8800/1725/files/MYN-PS-26419-A-M-4-2x_d216ff26-4967-4b3d-ac29-35c9fa45ac15.jpg',
            'bracelets' => 'https://cdn.shopify.com/s/files/1/0692/8800/1725/files/SMNJG-BNG-3337-M-F1-2x.jpg',
            'earrings' => 'https://cdn.shopify.com/s/files/1/0692/8800/1725/files/SMNJG-ERG-2690-M-F1-2x.jpg',
            'necklaces' => 'https://cdn.shopify.com/s/files/1/0692/8800/1725/files/MYN-NCK-67053-M-1-2x.png',
            'jewelry-sets' => 'https://cdn.shopify.com/s/files/1/0692/8800/1725/files/CT-CB-MIX-49645-M-1-2x.jpg',
        ];

        if (isset($map[$this->slug])) {
            return $map[$this->slug];
        }

        $prod = $this->products()->whereNotNull('image')->where('image', '!=', '')->first();
        return $prod?->image ?? 'https://cdn.shopify.com/s/files/1/0692/8800/1725/files/SMNJG-RNG-5565-M-1-2x.jpg';
    }

    public function getIconEmojiAttribute(): string
    {
        $map = [
            'rings' => '💍',
            'charms-pendants' => '📿',
            'bracelets' => '✨',
            'earrings' => '💎',
            'necklaces' => '👑',
            'jewelry-sets' => '🎁',
            'test-stickers' => '⚡',
        ];

        return $map[$this->slug] ?? '✨';
    }
}
