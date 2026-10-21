<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class MetaPixel
{
    public static function enabled(Request $request): bool
    {
        return (bool) preg_match('/^\d+$/', (string) config('services.meta.pixel_id'))
            && $request->session()->get('marketing_consent', ! config('services.meta.require_consent')) === true;
    }

    public static function product(Product $product, int $quantity = 1): array
    {
        return self::contents([[
            'id' => (string) $product->id,
            'quantity' => $quantity,
            'item_price' => (float) $product->price,
        ]], (float) $product->price * $quantity);
    }

    public static function contents(array $contents, float $value): array
    {
        return [
            'content_type' => 'product',
            'content_ids' => array_column($contents, 'id'),
            'contents' => $contents,
            'num_items' => array_sum(array_column($contents, 'quantity')),
            'value' => round($value, 2),
            'currency' => 'INR',
        ];
    }

    public static function purchase(Order $order): array
    {
        return self::contents($order->items->map(fn ($item) => [
            // Deleted products retain an order-item identifier rather than a null ID.
            'id' => $item->product_id ? (string) $item->product_id : 'order-item-'.$item->id,
            'quantity' => (int) $item->quantity,
            'item_price' => (float) $item->unit_price,
        ])->all(), (float) $order->total);
    }
}
