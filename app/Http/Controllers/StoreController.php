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
            $productPrices = Product::whereIn('id', array_keys($cart))->pluck('price', 'id');
            $currentSubtotal = 0;
            foreach ($cart as $id => $qty) {
                if (isset($productPrices[$id])) {
                    $currentSubtotal += $productPrices[$id] * $qty;
                }
            }

            if ($currentSubtotal < self::MIN_ORDER_AMOUNT) {
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
        $subtotal = (float) $items->sum('line_total');
        $shipping = $subtotal >= 499 || $subtotal === 0.0 ? 0 : 49;
        $total = $subtotal + $shipping;

        $minOrderAmount = self::MIN_ORDER_AMOUNT;
        $minOrderReached = $subtotal >= $minOrderAmount;
        $minOrderDiff = max(0, $minOrderAmount - $subtotal);
        $minOrderProgress = $subtotal > 0 ? min(100, round(($subtotal / $minOrderAmount) * 100)) : 0;

        $freeShippingThreshold = 499;
        $freeShippingReached = $subtotal >= $freeShippingThreshold;
        $freeShippingDiff = max(0, $freeShippingThreshold - $subtotal);
        $freeShippingProgress = $subtotal > 0 ? min(100, round(($subtotal / $freeShippingThreshold) * 100)) : 0;

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
            'shipping',
            'total',
            'minOrderAmount',
            'minOrderReached',
            'minOrderDiff',
            'minOrderProgress',
            'freeShippingThreshold',
            'freeShippingReached',
            'freeShippingDiff',
            'freeShippingProgress',
            'quickAddStickers'
        );
    }

    public function categories(): View
    {
        $categories = Category::whereHas('products', function ($q) {
            $q->where('is_active', true)->where('stock', '>', 0);
        })->withCount(['products' => function ($q) {
            $q->where('is_active', true)->where('stock', '>', 0);
        }])->orderBy('name')->get();

        $curatedCollections = [
            [
                'slug' => 'laptop-stickers',
                'name' => 'Laptop Stickers',
                'description' => 'Residue-free, heat-resistant vinyl decals designed for MacBooks, ThinkPads & gaming laptops.',
                'badge' => '💻 Tech & Coding',
                'icon' => '💻',
            ],
            [
                'slug' => 'car-stickers',
                'name' => 'Car & Bike Stickers',
                'description' => 'Automotive-grade, UV-sunlight safe & 100% waterproof outdoor decals for bumpers, windshields & bikes.',
                'badge' => '🚗 Moto & Auto',
                'icon' => '🚗',
            ],
            [
                'slug' => 'phone-stickers',
                'name' => 'Phone Case Stickers',
                'description' => 'Compact aesthetic mini decals with matte finish that slip perfectly under clear phone cases.',
                'badge' => '📱 Everyday Carry',
                'icon' => '📱',
            ],
            [
                'slug' => 'college-stickers',
                'name' => 'Stickers for College Students',
                'description' => 'Desi pop, meme culture, hustle quotes & campus vibes for binders, notebooks & laptops.',
                'badge' => '🎓 Campus Drip',
                'icon' => '🎓',
            ],
            [
                'slug' => 'custom-stickers',
                'name' => 'Custom Stickers in India',
                'description' => 'Custom die-cut stickers for your startup, college club, brand, or creative art project.',
                'badge' => '✨ Custom Drops',
                'icon' => '✨',
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
            'laptop-stickers' => [
                'name' => 'Laptop Stickers',
                'title' => 'Laptop Stickers – Creative & Waterproof Laptop Decals | Tabstick',
                'meta_description' => 'Explore creative waterproof laptop stickers in India. High-grade vinyl, zero residue removal, heat-resistant decals for MacBooks and Windows laptops.',
                'h1' => 'LAPTOP STICKERS – VINYL DECALS FOR MACBOOKS & RIGS',
                'description' => 'Upgrade your workstation with premium automotive-grade vinyl stickers. Engineered to withstand daily bag friction, laptop heat, and coffee spills with 100% residue-free peel off.',
                'category_slug' => 'tech-dev',
            ],
            'car-stickers' => [
                'name' => 'Car & Bike Stickers',
                'title' => 'Car & Bike Stickers – Waterproof & UV-Safe Vinyl Decals | Tabstick',
                'meta_description' => 'Buy waterproof car & bike stickers online in India. Automotive-grade, UV-protected vinyl decals that survive monsoons, car washes, and highway heat.',
                'h1' => 'CAR & BIKE STICKERS – AUTOMOTIVE GRADE VINYL',
                'description' => 'Built for high-pressure washes, monsoons, and extreme Indian weather. Stick them on rear windshields, bumpers, motorcycle tanks, and helmet visors.',
                'category_slug' => 'cars-bikes',
            ],
            'phone-stickers' => [
                'name' => 'Phone Case Stickers',
                'title' => 'Aesthetic Phone Stickers & Mini Decals | Tabstick',
                'meta_description' => 'Aesthetic, compact vinyl stickers for phone cases and chargers. Precision die-cut mini stickers that fit perfectly under clear iPhone and Android cases.',
                'h1' => 'PHONE CASE STICKERS – AESTHETIC MINI VINYL DECALS',
                'description' => 'Give your phone a fresh aesthetic vibe. Ultra-slim vinyl stickers that fit comfortably on cases and wireless chargers without peeling at the corners.',
                'category_slug' => 'aesthetic',
            ],
            'college-stickers' => [
                'name' => 'Stickers for College Students',
                'title' => 'Stickers for College Students – Memes, Pop Culture & Drip | Tabstick',
                'meta_description' => 'Shop viral meme stickers, engineering humour, anime, and pop culture decals for college students in India. Pocket-friendly prices and pan-India COD delivery.',
                'h1' => 'COLLEGE STUDENT STICKERS – CAMPUS DRIP & MEMES',
                'description' => 'From viral Bollywood dialogues to engineering memes and midnight coding humor. Deck out your hostel laptops, notebooks, water bottles, and campus wheels.',
                'category_slug' => 'memes',
            ],
            'custom-stickers' => [
                'name' => 'Custom Stickers in India',
                'title' => 'Custom Stickers India – High Quality Die-Cut Vinyl Decals | Tabstick',
                'meta_description' => 'Order custom stickers in India from Tabstick. Custom die-cut vinyl stickers for startups, communities, college fests, and creators with fast turnaround.',
                'h1' => 'CUSTOM STICKERS IN INDIA – PREMIUM DIE-CUT VINYL',
                'description' => 'Turn your logos, artwork, and creative designs into durable die-cut vinyl stickers. Minimum order friendly, vivid colors, and pan-India shipping.',
                'category_slug' => null,
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
            'anime' => [
                'title' => 'Anime Stickers – Waterproof Anime & Manga Vinyl Decals | Tabstick',
                'meta_description' => 'Explore 500+ anime vinyl stickers at Tabstick. 100% waterproof, scratch-proof anime decals for laptops, cars, and phone cases. Free shipping across India.',
                'h1' => 'ANIME & MANGA STICKERS – VINYL DECALS',
                'description' => 'High-definition anime decals featuring Naruto, Jujutsu Kaisen, Demon Slayer, One Piece, and classic manga moments. Printed on weatherproof automotive-grade vinyl with vibrant UV inks.',
            ],
            'cars-bikes' => [
                'title' => 'Car & Bike Stickers – Waterproof Automotive Decals | Tabstick',
                'meta_description' => 'Buy waterproof car and bike stickers online in India. Automotive-grade vinyl decals that survive monsoons, car washes, and highway speeds. Shop Tabstick.',
                'h1' => 'CAR & BIKE STICKERS – ROAD TESTED VINYL',
                'description' => 'Designed specifically for vehicles. UV-resistant, waterproof vinyl stickers for rear windshields, car bumpers, motorcycle fuel tanks, and helmets.',
            ],
            'memes' => [
                'title' => 'Desi Pop & Meme Stickers for Laptops & Bikes | Tabstick',
                'meta_description' => 'Shop trending desi meme stickers, Bollywood humor, and pop culture decals for laptops, bikes, and water bottles at Tabstick. High quality die-cut vinyl.',
                'h1' => 'MEMES & DESI POP STICKERS – VIRAL HUMOR',
                'description' => 'The funkiest Indian meme stickers and streetwear pop culture designs. From iconic Bollywood dialogues to viral internet trends with residue-free easy peel.',
            ],
            'glitter-holo' => [
                'title' => 'Holographic & Glitter Stickers – Die-Cut Vinyl Decals | Tabstick',
                'meta_description' => 'Shop holographic and glitter vinyl stickers online in India. Mesmerizing prism rainbow effect, waterproof, and durable decals for laptops and journals.',
                'h1' => 'GLITTER & HOLOGRAPHIC STICKERS – SHINE BRIGHT',
                'description' => 'Eye-catching rainbow holographic and glitter vinyl stickers that change color with the light. Perfect for customizing MacBooks, skate decks, and scrapbooks.',
            ],
            'aesthetic' => [
                'title' => 'Aesthetic & Vibe Stickers – Cute Vinyl Decals | Tabstick',
                'meta_description' => 'Discover aesthetic stickers for laptops, phone cases, and journals at Tabstick. Minimalist, pastel, and retro indie vinyl decals with free shipping across India.',
                'h1' => 'AESTHETIC & VIBES STICKERS – MINIMAL & RETRO',
                'description' => 'Curated aesthetic sticker packs for creators, students, and dreamers. Soft pastels, vaporwave, retro typography, and nature-inspired waterproof vinyl.',
            ],
            'tech-dev' => [
                'title' => 'Tech & Developer Stickers – Linux, Code & Dev Decals | Tabstick',
                'meta_description' => 'Shop developer and programmer stickers for laptops. Linux, Python, JavaScript, Docker, AI, and developer humor stickers on premium residue-free vinyl.',
                'h1' => 'TECH & DEVELOPER STICKERS – FOR CODERS & BUILDERS',
                'description' => 'Show off your tech stack on your MacBook lid. High-grade heat-resistant vinyl decals for software engineers, designers, cybersecurity pros, and tech geeks.',
            ],
            'stickers' => [
                'title' => 'Vinyl Stickers & Decals – Creative Sticker Packs | Tabstick',
                'meta_description' => 'Buy creative vinyl stickers online in India. 100% waterproof, die-cut, residue-free stickers for laptops, cars, phones, and college gear. Shop Tabstick.',
                'h1' => 'PREMIUM VINYL STICKERS – DIE-CUT DECALS',
                'description' => 'Explore Tabstick\'s massive catalog of die-cut vinyl stickers. Crafted with automotive-grade durability, vibrant inks, and easy-peel adhesive.',
            ],
        ];

        if (isset($metaMap[$category->slug])) {
            return $metaMap[$category->slug];
        }

        return [
            'title' => "{$category->name} Stickers – Waterproof Vinyl Decals | Tabstick",
            'meta_description' => "Shop {$category->name} stickers online in India at Tabstick. 100% waterproof, durable, residue-free vinyl decals for laptops, cars, and phones.",
            'h1' => strtoupper($category->name) . ' STICKERS',
            'description' => "Explore {$category->name} stickers crafted with automotive-grade vinyl and vibrant inks. Perfect for laptops, bikes, and personal gear.",
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
}

