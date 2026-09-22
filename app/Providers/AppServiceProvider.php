<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (str_starts_with((string) config('app.url'), 'https://') || request()->header('X-Forwarded-Proto') === 'https') {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        view()->composer('*', function ($view) {
            $cart = session('cart', []);
            $cartCount = array_sum($cart);
            $cartSubtotal = 0;
            $headerCartItems = collect();

            if (!empty($cart)) {
                $products = \App\Models\Product::whereIn('id', array_keys($cart))->get()->keyBy('id');
                foreach ($cart as $id => $qty) {
                    $product = $products->get($id);
                    if ($product) {
                        $lineTotal = $product->price * $qty;
                        $cartSubtotal += $lineTotal;
                        $headerCartItems->push([
                            'product' => $product,
                            'quantity' => $qty,
                            'line_total' => $lineTotal,
                        ]);
                    }
                }
            }

            $view
                ->with('headerCartCount', $cartCount)
                ->with('headerCartSubtotal', $cartSubtotal)
                ->with('headerCartItems', $headerCartItems);
        });
    }
}
