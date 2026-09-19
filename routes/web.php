<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Middleware\RequireAdmin;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'form'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('login.submit');
    Route::middleware(RequireAdmin::class)->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/', [InventoryController::class, 'dashboard'])->name('dashboard');
        Route::resource('products', InventoryController::class)->except(['show', 'destroy']);
        Route::post('/products/{product}/stock', [InventoryController::class, 'adjust'])->name('products.stock');
        Route::get('/stock-history', [InventoryController::class, 'history'])->name('history');
        Route::resource('categories', CategoryController::class)->only(['index', 'store', 'update', 'destroy']);
    });
});

Route::get('/', [StoreController::class, 'home'])->name('home');
Route::get('/products/{product:slug}', [StoreController::class, 'show'])->name('products.show');
Route::get('/cart', [StoreController::class, 'cart'])->name('cart.index');
Route::post('/cart/{product}', [StoreController::class, 'addToCart'])->name('cart.add');
Route::patch('/cart/{product}', [StoreController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/{product}', [StoreController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/checkout', [CheckoutController::class, 'create'])->name('checkout.create');
Route::post('/checkout', [CheckoutController::class, 'store'])->middleware('throttle:10,1')->name('checkout.store');
Route::post('/api/create-order', [CheckoutController::class, 'createRazorpayOrder'])->middleware('throttle:10,1')->name('api.razorpay.create');
Route::post('/api/verify-payment', [CheckoutController::class, 'verifyRazorpayPayment'])->middleware('throttle:10,1')->name('api.razorpay.verify');
Route::get('/orders/{order:order_number}/success', [CheckoutController::class, 'success'])->name('orders.success');
