<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PortfolioInquiry;
use App\Models\Product;
use App\Mail\PortfolioUserConfirmationMail;
use App\Mail\PortfolioAdminNotificationMail;
use App\Services\GeminiService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class StoreController extends Controller
{
    public const MIN_ORDER_AMOUNT = 100;

    public function home(): View
    {
        $categories = Category::where('slug', '!=', 'test-stickers')
            ->whereHas('products', function ($q) {
                $q->where('is_active', true)->where('stock', '>', 0);
            })->withCount(['products' => function ($q) {
                $q->where('is_active', true)->where('stock', '>', 0);
            }])->orderBy('name')->get();

        $prodQuery = Product::where('is_active', true)
            ->where('stock', '>', 0)
            ->where(function ($q) {
                $q->whereNull('sku')->orWhere(function ($sub) {
                    $sub->where('sku', '!=', Product::TEST_STICKER_SKU)
                        ->where('sku', 'not like', 'STK-%')
                        ->where('sku', 'not like', 'STICK-%');
                });
            })
            ->whereDoesntHave('category', function ($q) {
                $q->whereIn('slug', [
                    'stickers',
                    'memes',
                    'glitter-holo',
                    'anime',
                    'cars-bikes',
                    'aesthetic',
                    'tech-dev',
                    'mystery-box',
                    'clothing',
                    'popular',
                    'test-stickers',
                ]);
            });

        $totalProductsCount = (clone $prodQuery)->count();

        $products = (clone $prodQuery)->with('category:id,name,slug')
            ->latest()
            ->take(24)
            ->get();

        return view('store.home', compact('products', 'categories', 'totalProductsCount'));
    }

    public function gazeNGifts(): View
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

        $grazeMenuCategories = \App\Models\GrazeMenuCategory::where('is_active', true)
            ->with(['activeItems'])
            ->orderBy('sort_order')
            ->get();

        $grazeMenuCategoriesJson = $grazeMenuCategories->map(function ($c) {
            return [
                'id' => $c->slug,
                'label' => $c->name,
                'subtitle' => $c->subtitle ?? '',
                'items' => $c->activeItems->map(function ($i) {
                    return [
                        'name' => $i->name,
                        'desc' => $i->description ?? '',
                        'type' => $i->type,
                        'price' => $i->price,
                        'unit' => $i->unit,
                    ];
                })->values(),
            ];
        })->values()->toJson();

        return view('store.gaze-n-gifts', compact('products', 'categories', 'totalProductsCount', 'grazeMenuCategories', 'grazeMenuCategoriesJson'));
    }

    public function apiProducts(Request $request): JsonResponse
    {
        $categorySlug = $request->query('category', 'all');
        $search = trim($request->query('search', ''));
        $perPage = 24;

        $query = Product::with('category:id,name,slug')
            ->where('is_active', true)
            ->where('stock', '>', 0)
            ->where(function ($q) {
                $q->whereNull('sku')->orWhere(function ($sub) {
                    $sub->where('sku', '!=', Product::TEST_STICKER_SKU)
                        ->where('sku', 'not like', 'STK-%')
                        ->where('sku', 'not like', 'STICK-%');
                });
            });

        if ($categorySlug && $categorySlug !== 'all') {
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        } elseif ($search === '') {
            $query->whereDoesntHave('category', function ($q) {
                $q->whereIn('slug', [
                    'stickers',
                    'memes',
                    'glitter-holo',
                    'anime',
                    'cars-bikes',
                    'aesthetic',
                    'tech-dev',
                    'mystery-box',
                    'clothing',
                    'popular',
                    'test-stickers',
                ]);
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

    public function addToCart(Request $request, Product $product): RedirectResponse|JsonResponse
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

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json($this->formatCartDrawerPayload($request, $product->name.' added to your cart!'));
        }

        if ($request->input('redirect') === 'checkout') {
            $cartProducts = Product::whereIn('id', array_keys($cart))->get()->keyBy('id');
            $hasTestSticker = Product::collectionContainsTestSticker($cartProducts);
            $currentSubtotal = 0;
            foreach ($cart as $id => $qty) {
                if ($cartProducts->has($id)) {
                    $currentSubtotal += $cartProducts->get($id)->price * $qty;
                }
            }

            if (! $hasTestSticker && $currentSubtotal < self::MIN_ORDER_AMOUNT) {
                $needed = self::MIN_ORDER_AMOUNT - $currentSubtotal;
                return redirect()->route('cart.index')->with('warning', $product->name.' added! Minimum order is ₹'.self::MIN_ORDER_AMOUNT.'. Add ₹'.number_format($needed, 2).' more to checkout.');
            }

            return redirect()->route('checkout.create');
        }

        if ($request->input('redirect') === 'back') {
            return back()->with('success', $product->name.' added to your cart!');
        }

        return redirect()->route('cart.index')->with('success', $product->name.' added to your cart!');
    }

    public function updateCart(Request $request, Product $product): RedirectResponse|JsonResponse
    {
        $quantity = (int) $request->validate(['quantity' => 'required|integer|min:1|max:20'])['quantity'];
        $cart = $request->session()->get('cart', []);
        if (isset($cart[$product->id])) {
            $cart[$product->id] = min($quantity, $product->stock);
            $request->session()->put('cart', $cart);
        }

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json($this->formatCartDrawerPayload($request, 'Cart updated.'));
        }

        return back()->with('success', 'Cart updated.');
    }

    public function removeFromCart(Request $request, Product $product): RedirectResponse|JsonResponse
    {
        $cart = $request->session()->get('cart', []);
        unset($cart[$product->id]);
        $request->session()->put('cart', $cart);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json($this->formatCartDrawerPayload($request, 'Item removed.'));
        }

        return back()->with('success', 'Item removed.');
    }

    public function drawerData(Request $request): JsonResponse
    {
        return response()->json($this->formatCartDrawerPayload($request));
    }

    public function applyCoupon(Request $request): JsonResponse
    {
        $code = strtoupper(trim((string) $request->input('code', '')));
        $validCoupons = [
            'TABSTICK10' => 10,
            'VIP10' => 10,
            'STICKER10' => 10,
            'MAAYANK10' => 10,
            'SAVE10' => 10,
            'POP10' => 10,
        ];

        if (empty($code)) {
            $request->session()->forget('coupon');
            return response()->json($this->formatCartDrawerPayload($request, 'Coupon removed.'));
        }

        if (isset($validCoupons[$code])) {
            $request->session()->put('coupon', [
                'code' => $code,
                'discount_percent' => $validCoupons[$code],
            ]);
            return response()->json($this->formatCartDrawerPayload($request, "Coupon '{$code}' applied! 10% OFF"));
        }

        return response()->json([
            'success' => false,
            'message' => "Invalid coupon code '{$code}'. Try TABSTICK10",
        ], 422);
    }

    private function formatCartDrawerPayload(Request $request, ?string $message = null): array
    {
        $data = $this->cartData($request);
        $itemsHtml = view('partials.cart-drawer-items', $data)->render();
        $totalQty = collect($data['items'])->sum('quantity');

        return [
            'success' => true,
            'message' => $message ?? 'Cart updated.',
            'count' => $totalQty,
            'item_count' => count($data['items']),
            'subtotal' => $data['subtotal'],
            'subtotal_formatted' => '₹'.number_format($data['subtotal'], 2),
            'discount' => $data['discount'] ?? 0,
            'discount_formatted' => '₹'.number_format($data['discount'] ?? 0, 2),
            'total' => $data['total'],
            'total_formatted' => '₹'.number_format($data['total'], 2),
            'min_order_amount' => $data['minOrderAmount'],
            'min_order_reached' => $data['minOrderReached'],
            'min_order_diff' => $data['minOrderDiff'],
            'min_order_diff_formatted' => '₹'.number_format($data['minOrderDiff'], 2),
            'free_shipping_reached' => $data['freeShippingReached'],
            'free_shipping_diff' => $data['freeShippingDiff'],
            'free_shipping_diff_formatted' => '₹'.number_format($data['freeShippingDiff'], 2),
            'free_shipping_progress' => $data['freeShippingProgress'],
            'html' => $itemsHtml,
        ];
    }

    private function cartData(Request $request): array
    {
        $cart = $request->session()->get('cart', []);
        $products = Product::whereIn('id', array_keys($cart))->get()->keyBy('id');
        $items = collect($cart)->map(function ($quantity, $productId) use ($products) {
            $product = $products->get($productId);
            return $product ? ['product' => $product, 'quantity' => $quantity, 'line_total' => $product->price * $quantity] : null;
        })->filter()->values();
        $subtotal = (float) $items->sum('line_total');
        $hasTestSticker = Product::collectionContainsTestSticker($products);

        $coupon = $request->session()->get('coupon');
        $discount = 0;
        if (! $hasTestSticker && $coupon && isset($coupon['discount_percent'])) {
            $discount = round(($subtotal * $coupon['discount_percent']) / 100, 2);
        }

        $shipping = ($hasTestSticker || $subtotal >= 499 || $subtotal === 0.0) ? 0 : 49;
        $total = max(0, $subtotal - $discount) + $shipping;

        $minOrderAmount = self::MIN_ORDER_AMOUNT;
        $minOrderReached = $hasTestSticker || $subtotal >= $minOrderAmount;
        $minOrderDiff = $hasTestSticker ? 0 : max(0, $minOrderAmount - $subtotal);
        $minOrderProgress = $hasTestSticker ? 100 : ($subtotal > 0 ? min(100, round(($subtotal / $minOrderAmount) * 100)) : 0);

        $freeShippingThreshold = 499;
        $freeShippingReached = $hasTestSticker || $subtotal >= $freeShippingThreshold;
        $freeShippingDiff = $hasTestSticker ? 0 : max(0, $freeShippingThreshold - $subtotal);
        $freeShippingProgress = $hasTestSticker ? 100 : ($subtotal > 0 ? min(100, round(($subtotal / $freeShippingThreshold) * 100)) : 0);

        // Fetch quick-add recommendations when cart is under min order
        $quickAddStickers = collect();
        if ($subtotal > 0 && ! $minOrderReached) {
            $cartProductIds = array_keys($cart);
            $quickAddStickers = Product::where('is_active', true)
                ->where('stock', '>', 0)
                ->whereNotIn('id', $cartProductIds)
                ->where('price', '<=', 99)
                ->latest()
                ->take(4)
                ->get();
        }

        return compact(
            'items',
            'subtotal',
            'discount',
            'shipping',
            'total',
            'coupon',
            'minOrderAmount',
            'minOrderReached',
            'minOrderDiff',
            'minOrderProgress',
            'freeShippingThreshold',
            'freeShippingReached',
            'freeShippingDiff',
            'freeShippingProgress',
            'hasTestSticker',
            'quickAddStickers'
        );
    }

    public function categories(): View
    {
        $jewelrySlugs = [
            'rings',
            'charms-pendants',
            'bracelets',
            'earrings',
            'necklaces',
            'jewelry-sets',
        ];
        $hasJewelry = Category::whereIn('slug', $jewelrySlugs)->exists();

        $catQuery = Category::whereHas('products', function ($q) {
            $q->where('is_active', true)->where('stock', '>', 0);
        })->withCount(['products' => function ($q) {
            $q->where('is_active', true)->where('stock', '>', 0);
        }]);

        if ($hasJewelry) {
            $catQuery->whereIn('slug', $jewelrySlugs);
        } else {
            $catQuery->where('slug', '!=', 'test-stickers');
        }

        $categories = $catQuery->orderBy('name')->get();

        $curatedCollections = [
            [
                'slug' => 'rings',
                'name' => '18K Gold Plated Rings',
                'description' => 'Minimalist bands, crystal statement rings, and stackable designs with anti-tarnish finish.',
                'badge' => '💍 Rings Collection',
                'icon' => '💍',
            ],
            [
                'slug' => 'charms-pendants',
                'name' => 'Charms & Pendants',
                'description' => 'Aesthetic daily luxury pendants and charms styled for effortless layering.',
                'badge' => '✨ Charms & Drops',
                'icon' => '✨',
            ],
            [
                'slug' => 'bracelets',
                'name' => 'Bracelets & Cuffs',
                'description' => 'Waterproof gold bracelets, tennis chains, and sleek cuffs finished in 18K real gold plating.',
                'badge' => '💎 Wrist Luxury',
                'icon' => '💎',
            ],
            [
                'slug' => 'earrings',
                'name' => 'Earrings & Hoops',
                'description' => 'Hypoallergenic, skin-friendly, featherlight studs, huggies, and drop earrings.',
                'badge' => '✨ Daily Hoops',
                'icon' => '✨',
            ],
            [
                'slug' => 'necklaces',
                'name' => 'Necklaces & Chains',
                'description' => 'Effortless luxury necklaces and choker chains plated with genuine 18K gold.',
                'badge' => '📿 Layering Chains',
                'icon' => '📿',
            ],
            [
                'slug' => 'jewelry-sets',
                'name' => 'Coordinated Jewelry Sets',
                'description' => 'Exquisite matching jewelry sets for gifting and celebrations packed in luxury gift boxes.',
                'badge' => '🎁 Gift Sets',
                'icon' => '🎁',
            ],
        ];

        return view('store.categories', compact('categories', 'curatedCollections'));
    }

    public function category(string $slug): View
    {
        $allCategories = Category::whereHas('products', function ($q) {
            $q->where('is_active', true)->where('stock', '>', 0);
        })->withCount(['products' => function ($q) {
            $q->where('is_active', true)->where('stock', '>', 0);
        }])->orderBy('name')->get();

        $curatedMap = [
            'rings' => [
                'name' => '18K Gold Plated Rings',
                'title' => '18K Gold Plated Rings – Anti-Tarnish Daily Wear | Tabstick Jewelry',
                'meta_description' => 'Shop luxury 18K gold-plated rings for women. Minimalist bands, crystal statement rings, and stackable designs. Water & sweatproof with free pan-India shipping.',
                'h1' => '18K GOLD PLATED RINGS',
                'description' => 'Handcrafted 18K real gold plated rings engineered with anti-tarnish protective coating. Everyday luxury designed for timeless elegance.',
                'category_slug' => 'rings',
            ],
            'charms-pendants' => [
                'name' => 'Charms & Pendants',
                'title' => 'Gold Charms & Pendants – Aesthetic Daily Luxury | Tabstick Jewelry',
                'meta_description' => 'Discover elegant 18K gold-plated charms and pendants. Hypoallergenic, tarnish-resistant, and styled for everyday layering. Free shipping across India.',
                'h1' => 'CHARMS & PENDANTS',
                'description' => 'Curated charms and pendants in 18K gold finish. Elevate your everyday styling with modern celestial, floral, and minimalist motifs.',
                'category_slug' => 'charms-pendants',
            ],
            'bracelets' => [
                'name' => 'Bracelets & Cuffs',
                'title' => 'Gold Plated Bracelets & Cuffs – Anti-Tarnish Jewelry | Tabstick Jewelry',
                'meta_description' => 'Buy waterproof gold bracelets, tennis chains, and sleek cuffs online at Tabstick Jewelry. Hypoallergenic everyday fine jewelry with fast delivery.',
                'h1' => 'BRACELETS & CUFFS',
                'description' => 'From delicate chain bracelets to bold gold cuffs, each piece is finished in 18K real gold plating and built to resist tarnishing and water exposure.',
                'category_slug' => 'bracelets',
            ],
            'earrings' => [
                'name' => 'Earrings & Hoops',
                'title' => 'Gold Plated Earrings, Studs & Hoops | Tabstick Jewelry',
                'meta_description' => 'Shop hypoallergenic 18K gold plated earrings, huggies, studs, and drop earrings. Skin-friendly, featherlight, and anti-tarnish at Tabstick Jewelry.',
                'h1' => 'EARRINGS & HOOPS',
                'description' => 'Lightweight everyday hoops, studs, and drop earrings plated in 18K gold. Hypoallergenic, nickel-free, and sweatproof for all-day comfort.',
                'category_slug' => 'earrings',
            ],
            'necklaces' => [
                'name' => 'Necklaces & Chains',
                'title' => 'Gold Necklaces & Layering Chains | Tabstick Jewelry',
                'meta_description' => 'Explore 18K gold plated necklaces, choker chains, and layered pendants. Anti-tarnish, water-resistant luxury jewelry with free shipping in India.',
                'h1' => 'NECKLACES & CHAINS',
                'description' => 'Effortless luxury necklaces plated with genuine 18K gold. Designed for daily layering with waterproof and tarnish-resistant coating.',
                'category_slug' => 'necklaces',
            ],
            'jewelry-sets' => [
                'name' => 'Coordinated Jewelry Sets',
                'title' => 'Fine Jewelry Sets – Coordinated Gold Collections | Tabstick Jewelry',
                'meta_description' => 'Shop curated 18K gold plated jewelry sets including matching necklaces, earrings, and rings. Perfect luxury gifts with premium packaging.',
                'h1' => 'COORDINATED JEWELRY SETS',
                'description' => 'Exquisite matching jewelry sets for gifting and celebrations. 18K gold plated, anti-tarnish, and packed in luxury gift boxes.',
                'category_slug' => 'jewelry-sets',
            ],
            'laptop-stickers' => [
                'name' => '18K Gold Plated Rings',
                'title' => '18K Gold Plated Rings – Anti-Tarnish Daily Wear | Tabstick Jewelry',
                'meta_description' => 'Shop luxury 18K gold-plated rings for women. Minimalist bands, crystal statement rings, and stackable designs.',
                'h1' => '18K GOLD PLATED RINGS',
                'description' => 'Handcrafted 18K real gold plated rings engineered with anti-tarnish protective coating. Everyday luxury designed for timeless elegance.',
                'category_slug' => 'rings',
            ],
        ];

        $category = Category::where('slug', $slug)->first();

        if ($category) {
            $catMeta = $this->getCategoryMetadata($category);
            $query = Product::with('category:id,name,slug')
                ->where('category_id', $category->id)
                ->where('is_active', true)
                ->where('stock', '>', 0)
                ->orderBy('id', 'desc');

            $products = $query->paginate(36)->withQueryString();

            return view('store.category', [
                'category' => $category,
                'categoryName' => $category->name,
                'seoTitle' => $catMeta['title'],
                'metaDescription' => $catMeta['meta_description'],
                'h1' => $catMeta['h1'],
                'description' => $catMeta['description'],
                'products' => $products,
                'allCategories' => $allCategories,
                'isCurated' => false,
                'currentSlug' => $slug,
            ]);
        }

        if (isset($curatedMap[$slug])) {
            $curated = $curatedMap[$slug];
            $query = Product::with('category:id,name,slug')
                ->where('is_active', true)
                ->where('stock', '>', 0);

            if (!empty($curated['category_slug'])) {
                $targetCat = Category::where('slug', $curated['category_slug'])->first();
                if ($targetCat) {
                    $query->where('category_id', $targetCat->id);
                }
            }

            $products = $query->orderBy('id', 'desc')->paginate(36)->withQueryString();

            return view('store.category', [
                'category' => null,
                'categoryName' => $curated['name'],
                'seoTitle' => $curated['title'],
                'metaDescription' => $curated['meta_description'],
                'h1' => $curated['h1'],
                'description' => $curated['description'],
                'products' => $products,
                'allCategories' => $allCategories,
                'isCurated' => true,
                'currentSlug' => $slug,
            ]);
        }

        abort(404);
    }

    private function getCategoryMetadata(Category $category): array
    {
        $metaMap = [
            'rings' => [
                'title' => '18K Gold Plated Rings – Anti-Tarnish Daily Wear | Tabstick Jewelry',
                'meta_description' => 'Shop luxury 18K gold-plated rings for women. Minimalist bands, crystal statement rings, and stackable designs. Water & sweatproof with free pan-India shipping.',
                'h1' => '18K GOLD PLATED RINGS',
                'description' => 'Handcrafted 18K real gold plated rings engineered with anti-tarnish protective coating. Everyday luxury designed for timeless elegance.',
            ],
            'charms-pendants' => [
                'title' => 'Gold Charms & Pendants – Aesthetic Daily Luxury | Tabstick Jewelry',
                'meta_description' => 'Discover elegant 18K gold-plated charms and pendants. Hypoallergenic, tarnish-resistant, and styled for everyday layering. Free shipping across India.',
                'h1' => 'CHARMS & PENDANTS',
                'description' => 'Curated charms and pendants in 18K gold finish. Elevate your everyday styling with modern celestial, floral, and minimalist motifs.',
            ],
            'bracelets' => [
                'title' => 'Gold Plated Bracelets & Cuffs – Anti-Tarnish Jewelry | Tabstick Jewelry',
                'meta_description' => 'Buy waterproof gold bracelets, tennis chains, and sleek cuffs online at Tabstick Jewelry. Hypoallergenic everyday fine jewelry with fast delivery.',
                'h1' => 'BRACELETS & CUFFS',
                'description' => 'From delicate chain bracelets to bold gold cuffs, each piece is finished in 18K real gold plating and built to resist tarnishing and water exposure.',
            ],
            'earrings' => [
                'title' => 'Gold Plated Earrings, Studs & Hoops | Tabstick Jewelry',
                'meta_description' => 'Shop hypoallergenic 18K gold plated earrings, huggies, studs, and drop earrings. Skin-friendly, featherlight, and anti-tarnish at Tabstick Jewelry.',
                'h1' => 'EARRINGS & HOOPS',
                'description' => 'Lightweight everyday hoops, studs, and drop earrings plated in 18K gold. Hypoallergenic, nickel-free, and sweatproof for all-day comfort.',
            ],
            'necklaces' => [
                'title' => 'Gold Necklaces & Layering Chains | Tabstick Jewelry',
                'meta_description' => 'Explore 18K gold plated necklaces, choker chains, and layered pendants. Anti-tarnish, water-resistant luxury jewelry with free shipping in India.',
                'h1' => 'NECKLACES & CHAINS',
                'description' => 'Effortless luxury necklaces plated with genuine 18K gold. Designed for daily layering with waterproof and tarnish-resistant coating.',
            ],
            'jewelry-sets' => [
                'title' => 'Fine Jewelry Sets – Coordinated Gold Collections | Tabstick Jewelry',
                'meta_description' => 'Shop curated 18K gold plated jewelry sets including matching necklaces, earrings, and rings. Perfect luxury gifts with premium packaging.',
                'h1' => 'COORDINATED JEWELRY SETS',
                'description' => 'Exquisite matching jewelry sets for gifting and celebrations. 18K gold plated, anti-tarnish, and packed in luxury gift boxes.',
            ],
        ];

        if (isset($metaMap[$category->slug])) {
            return $metaMap[$category->slug];
        }

        return [
            'title' => "{$category->name} – 18K Gold Plated Fine Jewelry | Tabstick",
            'meta_description' => "Shop {$category->name} online in India at Tabstick. 18K real gold plated, waterproof, anti-tarnish, and hypoallergenic everyday luxury.",
            'h1' => strtoupper($category->name),
            'description' => "Explore {$category->name} crafted with 18K vacuum gold plating and anti-tarnish protection.",
        ];
    }

    public function portfolio(): View
    {
        return view('store.portfolio');
    }

    public function downloadResume(Request $request)
    {
        $path = public_path('resumes/Maayank_Malhotra_Resume.pdf');
        if (!file_exists($path)) {
            abort(404, 'Official resume file not found.');
        }

        if ($request->has('inline') || $request->query('view') === '1') {
            return response()->file($path, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="Maayank_Malhotra_Resume.pdf"',
            ]);
        }

        return response()->download($path, 'Maayank_Malhotra_Resume.pdf', [
            'Content-Type' => 'application/pdf',
        ]);
    }

    public function submitPortfolioContact(Request $request, GeminiService $gemini): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'email' => 'required|email|max:150',
            'name' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:30',
            'subject' => 'nullable|string|max:150',
            'message' => 'nullable|string|max:3000',
        ]);

        $rawName = trim($validated['name'] ?? '');
        $name = !empty($rawName) ? $rawName : 'Portfolio Visitor';

        $rawSubject = trim($validated['subject'] ?? '');
        $subject = !empty($rawSubject) ? $rawSubject : 'Engineering Inquiry & Resume Request';

        $rawMessage = trim($validated['message'] ?? '');
        $message = !empty($rawMessage) ? $rawMessage : "Hi Maayank, I reviewed your engineering portfolio on tabstick.in/maayank and would love to connect regarding opportunities and technical collaboration. Please share your official resume!";

        $inquiry = PortfolioInquiry::create([
            'name' => $name,
            'email' => $validated['email'],
            'phone' => !empty($validated['phone']) ? trim($validated['phone']) : null,
            'subject' => $subject,
            'message' => $message,
            'ip_address' => $request->ip(),
        ]);

        // Generate tailored AI acknowledgement if message is substantial
        $aiNote = null;
        try {
            $aiNote = $gemini->generatePersonalizedAcknowledgement($name, $subject, $message);
        } catch (\Throwable $e) {
            Log::info('Gemini AI note generation skipped: ' . $e->getMessage());
        }

        // 1. Send confirmation email to user via SMTP with official resume attached and tailored AI note
        try {
            Mail::to($inquiry->email)->send(new PortfolioUserConfirmationMail($inquiry, $aiNote));
            $inquiry->update(['email_sent_to_user' => true]);
        } catch (\Throwable $e) {
            Log::error('Failed to send portfolio user confirmation email: ' . $e->getMessage());
        }

        // 2. Send notification email to admin/founder via SMTP
        try {
            Mail::to('maayankmalhotra095@gmail.com')->send(new PortfolioAdminNotificationMail($inquiry));
            $inquiry->update(['email_sent_to_admin' => true]);
        } catch (\Throwable $e) {
            Log::error('Failed to send portfolio admin notification email: ' . $e->getMessage());
        }

        $greeting = !empty($rawName) ? "Thank you, {$rawName}!" : "Thank you!";
        $successMsg = "{$greeting} Your inquiry was received, and a confirmation email with Maayank's official Resume (PDF) has been dispatched to {$inquiry->email}.";

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $successMsg,
                'inquiry' => [
                    'id' => $inquiry->id,
                    'name' => $inquiry->name,
                    'email' => $inquiry->email,
                ],
            ]);
        }

        return redirect()->to(url('/maayank#contact'))->with('contact_success', $successMsg);
    }

    /**
     * Interactive AI Career Assistant powered by Google Gemini 3.6 Flash.
     */
    public function portfolioAiChat(Request $request, GeminiService $gemini): JsonResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|min:2|max:500',
            'history' => 'nullable|array|max:10',
            'history.*.role' => 'required_with:history|string|in:user,assistant',
            'history.*.content' => 'required_with:history|string|max:1000',
        ]);

        $message = trim($validated['message']);
        $history = $validated['history'] ?? [];

        $reply = $gemini->askAboutMaayank($message, $history);

        return response()->json([
            'success' => true,
            'reply' => $reply,
        ]);
    }

    /**
     * Prem Medical Centre Landing Page (Sector 19, Faridabad)
     */
    public function premMedicalCenter(): View
    {
        return view('store.prem-medical-center');
    }
}
