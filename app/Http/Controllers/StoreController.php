<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StoreController extends Controller
{
    public function home(): View
    {
        $categories = Category::whereHas('products', function ($q) {
            $q->where('is_active', true)->where('stock', '>', 0);
        })->withCount(['products' => function ($q) {
            $q->where('is_active', true)->where('stock', '>', 0);
        }])->orderBy('name')->get();

        $totalProductsCount = Product::where('is_active', true)->where('stock', '>', 0)->count();

        $products = Product::with('category:id,name,slug')
            ->where('is_active', true)
            ->where('stock', '>', 0)
            ->latest()
            ->take(24)
            ->get();

        return view('store.home', compact('products', 'categories', 'totalProductsCount'));
    }

    public function apiProducts(Request $request): JsonResponse
    {
        $categorySlug = $request->query('category', 'all');
        $search = trim($request->query('search', ''));
        $perPage = 24;

        $query = Product::with('category:id,name,slug')
            ->where('is_active', true)
            ->where('stock', '>', 0);

        if ($categorySlug && $categorySlug !== 'all') {
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $paginator = $query->latest()->paginate($perPage);

        $html = '';
        foreach ($paginator as $index => $product) {
            $html .= view('partials.product-card', compact('product', 'index'))->render();
        }

        return response()->json([
            'html' => $html,
            'current_page' => $paginator->currentPage(),
            'has_more' => $paginator->hasMorePages(),
            'next_page' => $paginator->hasMorePages() ? $paginator->currentPage() + 1 : null,
            'total' => $paginator->total(),
            'count' => count($paginator->items()),
        ]);
    }

    public function show(Product $product): View
    {
        abort_unless($product->is_active, 404);
        return view('store.product', compact('product'));
    }

    public function cart(Request $request): View
    {
        return view('store.cart', $this->cartData($request));
    }

    public function addToCart(Request $request, Product $product): RedirectResponse
    {
        abort_unless($product->is_active && $product->stock > 0, 404);
        $validated = $request->validate([
            'quantity' => 'nullable|integer|min:1|max:20',
            'redirect' => 'nullable|string|in:cart,checkout,back',
        ]);
        $quantity = (int) ($validated['quantity'] ?? 1);
        $cart = $request->session()->get('cart', []);
        $cart[$product->id] = min(($cart[$product->id] ?? 0) + $quantity, $product->stock, 20);
        $request->session()->put('cart', $cart);

        if ($request->input('redirect') === 'checkout') {
            return redirect()->route('checkout.create');
        }

        return redirect()->route('cart.index')->with('success', $product->name.' added to your cart!');
    }

    public function updateCart(Request $request, Product $product): RedirectResponse
    {
        $quantity = (int) $request->validate(['quantity' => 'required|integer|min:1|max:20'])['quantity'];
        $cart = $request->session()->get('cart', []);
        if (isset($cart[$product->id])) {
            $cart[$product->id] = min($quantity, $product->stock);
            $request->session()->put('cart', $cart);
        }
        return back()->with('success', 'Cart updated.');
    }

    public function removeFromCart(Request $request, Product $product): RedirectResponse
    {
        $cart = $request->session()->get('cart', []);
        unset($cart[$product->id]);
        $request->session()->put('cart', $cart);
        return back()->with('success', 'Item removed.');
    }

    private function cartData(Request $request): array
    {
        $cart = $request->session()->get('cart', []);
        $products = Product::whereIn('id', array_keys($cart))->get()->keyBy('id');
        $items = collect($cart)->map(function ($quantity, $productId) use ($products) {
            $product = $products->get($productId);
            return $product ? ['product' => $product, 'quantity' => $quantity, 'line_total' => $product->price * $quantity] : null;
        })->filter()->values();
        $subtotal = $items->sum('line_total');
        $shipping = $subtotal >= 499 || $subtotal === 0 ? 0 : 49;
        return compact('items', 'subtotal', 'shipping') + ['total' => $subtotal + $shipping];
    }
}
