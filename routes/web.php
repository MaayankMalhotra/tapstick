<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Middleware\RequireAdmin;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'form'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('login.submit');
    Route::middleware(RequireAdmin::class)->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/', [InventoryController::class, 'dashboard'])->name('dashboard');
        Route::resource('orders', OrderController::class)->only(['index', 'show', 'update']);
        Route::get('/leads', [CustomerController::class, 'leads'])->name('leads.index');
        Route::get('/leads/export', [CustomerController::class, 'exportLeads'])->name('leads.export');
        Route::delete('/leads/{lead}', [CustomerController::class, 'destroyLead'])->name('leads.destroy');
        Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
        Route::resource('products', InventoryController::class)->except(['show', 'destroy']);
        Route::post('/products/{product}/stock', [InventoryController::class, 'adjust'])->name('products.stock');
        Route::get('/stock-history', [InventoryController::class, 'history'])->name('history');
        Route::resource('categories', CategoryController::class)->only(['index', 'store', 'update', 'destroy']);
    });
});

Route::get('/', [StoreController::class, 'home'])->name('home');
Route::get('/api/products', [StoreController::class, 'apiProducts'])->name('api.products');
Route::get('/products/{product:slug}', [StoreController::class, 'show'])->name('products.show');
Route::get('/cart', [StoreController::class, 'cart'])->name('cart.index');
Route::post('/cart/{product}', [StoreController::class, 'addToCart'])->name('cart.add');
Route::patch('/cart/{product}', [StoreController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/{product}', [StoreController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/checkout', [CheckoutController::class, 'create'])->name('checkout.create');
Route::post('/checkout', [CheckoutController::class, 'store'])->middleware('throttle:10,1')->name('checkout.store');
Route::post('/api/create-order', [CheckoutController::class, 'createRazorpayOrder'])->middleware('throttle:10,1')->name('api.razorpay.create');
Route::post('/api/verify-payment', [CheckoutController::class, 'verifyRazorpayPayment'])->middleware('throttle:10,1')->name('api.razorpay.verify');
Route::post('/club/join', [\App\Http\Controllers\LeadController::class, 'capture'])->name('lead.capture');
Route::get('/orders/{order:order_number}/success', [CheckoutController::class, 'success'])->name('orders.success');
Route::get('/categories', [StoreController::class, 'categories'])->name('category.index');
Route::get('/category/{slug}', [StoreController::class, 'category'])->name('category.show');
Route::get('/collection/{slug}', fn($slug) => redirect()->route('category.show', $slug, 301));
Route::get('/feed/google-shopping.xml', [\App\Http\Controllers\FeedController::class, 'googleShopping'])->name('feed.google-shopping');
Route::get('/feed/google-merchant.xml', [\App\Http\Controllers\FeedController::class, 'googleShopping']);
Route::get('/sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');
Route::get('/maayank', [StoreController::class, 'portfolio'])->name('portfolio');
Route::post('/maayank/contact', [StoreController::class, 'submitPortfolioContact'])->middleware('throttle:10,1')->name('portfolio.contact');
Route::redirect('/mayank', '/maayank', 301);
Route::redirect('/lander', '/');
Route::post('/api/github-deploy', [\App\Http\Controllers\DeployWebhookController::class, 'handle'])->name('webhook.github.deploy');
