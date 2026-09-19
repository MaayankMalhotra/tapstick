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
            if (!empty($cart)) {
                $productPrices = \App\Models\Product::whereIn('id', array_keys($cart))->pluck('price', 'id');
                foreach ($cart as $id => $qty) {
                    if (isset($productPrices[$id])) {
                        $cartSubtotal += $productPrices[$id] * $qty;
                    }
                }
            }
            $view->with('headerCartCount', $cartCount)->with('headerCartSubtotal', $cartSubtotal);
        });
    }
}
