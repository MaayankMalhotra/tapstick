<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class StickerAiService
{
    protected string $apiKey;
    protected string $model;
    protected string $baseUrl = 'https://generativelanguage.googleapis.com/v1beta';

    public function __construct()
    {
        $this->apiKey = (string) config('services.gemini.key', env('GEMINI_API_KEY', ''));
        $this->model = (string) config('services.gemini.model', 'gemini-flash-lite-latest');
    }

    /**
     * Models to try in sequence for maximum reliability.
     */
    protected function getCandidateModels(): array
    {
        $preferred = $this->model;
        $fallbacks = [
            'gemini-flash-lite-latest',
            'gemini-3.5-flash-lite',
            'gemini-3.1-flash-lite',
            'gemini-flash-latest',
            'gemini-3.5-flash',
            'gemini-3.6-flash',
            'gemini-3-flash-preview',
        ];

        return array_values(array_unique(array_merge([$preferred], $fallbacks)));
    }

    /**
     * Search and retrieve relevant stickers from the 4,479 catalog.
     * Uses fuzzy token matching, category intent analysis, and price filtering.
     *
     * @return array<int, array>
     */
    public function searchCatalog(string $query, int $limit = 8): array
    {
        $rawQuery = trim($query);
        if (empty($rawQuery)) {
            return $this->getPopularStickers($limit);
        }

        $cleanQuery = strtolower($rawQuery);

        // 1. Detect Price Intent (e.g. "under 100", "under 150", "below 200", "cheap")
        $maxPrice = null;
        if (preg_match('/(?:under|below|less than|within|around)\s*(?:rs\.?|inr|₹)?\s*(\d+)/i', $cleanQuery, $m)) {
            $maxPrice = (float) $m[1];
        } elseif (str_contains($cleanQuery, 'cheap') || str_contains($cleanQuery, 'budget') || str_contains($cleanQuery, 'low price')) {
            $maxPrice = 50.0;
        }

        // 2. Detect category intent using both curated aliases and live category names/slugs.
        $targetCategorySlug = $this->detectCategorySlug($cleanQuery);

        // 3. Clean search terms by stripping common conversational stopwords
        $stopwords = [
            'i', 'want', 'need', 'show', 'me', 'stickers', 'sticker', 'decals', 'decal',
            'do', 'you', 'have', 'any', 'looking', 'for', 'please', 'can', 'get', 'buy',
            'find', 'recommend', 'suggest', 'the', 'best', 'good', 'some', 'what', 'are',
            'tell', 'about', 'with', 'and', 'or', 'in', 'of', 'a', 'an', 'tabstick'
        ];
        $tokens = preg_split('/[\s,\?!]+/', $cleanQuery);
        $searchTerms = array_values(array_filter($tokens, function ($t) use ($stopwords) {
            return strlen($t) >= 2 && !in_array($t, $stopwords);
        }));

        // 4. Pull the live catalog and score every product. The catalog is small enough
        // to rank in memory, which gives better results than a random SQL fallback.
        $products = Product::with('category:id,name,slug')
            ->where('is_active', true)
            ->where('stock', '>', 0)
            ->when($maxPrice !== null && $maxPrice > 0, fn ($q) => $q->where('price', '<=', $maxPrice))
            ->get();

        $phrase = implode(' ', $searchTerms);
        $scored = $products->map(function (Product $product) use ($cleanQuery, $phrase, $searchTerms, $targetCategorySlug) {
            $categoryName = strtolower((string) $product->category?->name);
            $categorySlug = strtolower((string) $product->category?->slug);
            $name = strtolower($product->name);
            $slug = strtolower($product->slug);
            $description = strtolower((string) $product->description);
            $haystack = trim($name.' '.$slug.' '.$description.' '.$categoryName.' '.$categorySlug);

            $score = 0;
            if ($targetCategorySlug && $categorySlug === $targetCategorySlug) {
                $score += 45;
            }
            if ($phrase !== '' && str_contains($name, $phrase)) {
                $score += 60;
            }
            if ($phrase !== '' && str_contains($slug, Str::slug($phrase))) {
                $score += 45;
            }
            foreach ($searchTerms as $term) {
                if (str_contains($name, $term)) {
                    $score += 18;
                }
                if (str_contains($slug, Str::slug($term))) {
                    $score += 14;
                }
                if (str_contains($categoryName, $term) || str_contains($categorySlug, Str::slug($term))) {
                    $score += 16;
                }
                if (str_contains($description, $term)) {
                    $score += 6;
                }
                if ($term !== '' && str_contains($haystack, $term)) {
                    $score += 3;
                }
            }
            if ($cleanQuery !== '' && str_contains($haystack, $cleanQuery)) {
                $score += 30;
            }

            return ['product' => $product, 'score' => $score];
        })
        ->filter(fn ($row) => $row['score'] > 0 || $targetCategorySlug)
        ->sortByDesc(fn ($row) => [$row['score'], (float) $row['product']->price, $row['product']->id])
        ->pluck('product')
        ->values();

        $combined = $scored->take($limit);

        if ($combined->count() < $limit) {
            $fallbacks = $products
                ->whereNotIn('id', $combined->pluck('id')->all())
                ->sortByDesc('stock')
                ->take($limit - $combined->count());

            $combined = $combined->merge($fallbacks);
        }

        return $combined->map(function (Product $p) {
            return $this->formatProductCard($p);
        })->values()->toArray();
    }

    /**
     * Format a product model into a clean card payload for chat UI.
     */
    protected function formatProductCard(Product $p): array
    {
        $priceNum = (float) $p->price;
        $originalPrice = round($priceNum * 1.8, 0);

        return [
            'id' => $p->id,
            'name' => $p->name,
            'product_name' => $p->name,
            'slug' => $p->slug,
            'price' => number_format($priceNum, 2, '.', ''),
            'formatted_price' => '₹' . number_format($priceNum, 0),
            'formatted_original_price' => '₹' . number_format($originalPrice, 0),
            'category' => $p->category?->name ?? 'Sticker',
            'category_slug' => $p->category?->slug ?? 'stickers',
            'image_url' => $this->normalizeImageUrl($p->image),
            'url' => route('products.show', $p->slug),
            'stock' => $p->stock,
        ];
    }

    protected function normalizeImageUrl(?string $image): string
    {
        if (empty($image)) {
            return asset('images/hero-banner.webp');
        }

        if (Str::startsWith($image, ['http://', 'https://', '/'])) {
            return $image;
        }

        if (Str::startsWith($image, 'images/')) {
            return asset($image);
        }

        return asset('storage/' . ltrim($image, '/'));
    }

    protected function detectCategorySlug(string $cleanQuery): ?string
    {
        $categoryKeywords = [
            'cars-bikes' => ['car', 'cars', 'bike', 'bikes', 'bumper', 'driving', 'vehicle', 'rider', 'riding', 'motorcycle', 'scooter', 'bullet', 'thar', 'jeep', 'helmet', 'auto'],
            'anime' => ['anime', 'manga', 'naruto', 'gojo', 'jujutsu', 'kaisen', 'goku', 'dragon ball', 'one piece', 'luffy', 'demon slayer', 'tanjiro', 'baki', 'death note', 'levi', 'attack on titan', 'zoro', 'sukuna', 'itachi'],
            'tech-dev' => ['tech', 'code', 'coding', 'developer', 'programmer', 'python', 'javascript', 'js', 'react', 'node', 'linux', 'github', 'git', 'docker', 'terminal', 'bug', 'geek', 'nerd', 'laptop', 'software', 'dev'],
            'memes' => ['meme', 'memes', 'funny', 'desi', 'bollywood', 'humor', 'joke', 'sarcasm', 'lol', 'dank', 'jugaad'],
            'glitter-holo' => ['holo', 'holographic', 'glitter', 'sparkle', 'shiny', 'rainbow', 'prism', 'iridescent'],
            'aesthetic' => ['aesthetic', 'cute', 'vibes', 'vibe', 'pastel', 'floral', 'flower', 'coffee', 'minimal', 'chill', 'lofi'],
        ];

        foreach ($categoryKeywords as $slug => $keywords) {
            foreach ($keywords as $keyword) {
                if (preg_match('/\b' . preg_quote($keyword, '/') . '\b/i', $cleanQuery)) {
                    return $slug;
                }
            }
        }

        foreach (Category::query()->select('name', 'slug')->get() as $category) {
            $slug = strtolower($category->slug);
            $name = strtolower($category->name);
            if (str_contains($cleanQuery, $slug) || str_contains($cleanQuery, $name)) {
                return $slug;
            }
        }

        return null;
    }

    /**
     * Get popular fallback stickers when query is empty.
     */
    public function getPopularStickers(int $limit = 8): array
    {
        return Cache::remember('sticker_ai_popular_' . $limit, 3600, function () use ($limit) {
            // Pick a rich diverse mix of bumper stickers, anime, tech, and holographic
            return Product::with('category:id,name,slug')
                ->where('is_active', true)
                ->where('stock', '>', 0)
                ->where(function ($q) {
                    $q->whereIn('id', [1, 2002, 795, 3055, 3963])
                        ->orWhere('name', 'LIKE', '%Bumper Sticker%');
                })
                ->take($limit)
                ->get()
                ->map(fn(Product $p) => $this->formatProductCard($p))
                ->values()
                ->toArray();
        });
    }

    /**
     * Build the detailed knowledge base prompt for Tabstick AI.
     */
    protected function buildSystemPrompt(array $candidateProducts): string
    {
        $candidatesText = '';
        foreach ($candidateProducts as $idx => $item) {
            $candidatesText .= sprintf(
                "%d. \"%s\" | Category: %s (%s) | Price: %s | Image: %s | URL: %s\n",
                $idx + 1,
                $item['name'],
                $item['category'],
                $item['category_slug'],
                $item['formatted_price'],
                $item['image_url'],
                $item['url']
            );
        }

        $catalogSummary = $this->getCatalogSummary();

        return <<<PROMPT
You are Tabstick AI, the energetic, fun, and knowledgeable AI Shopping Assistant & Sticker Stylist for Tabstick (tabstick.in) — India's premier creative sticker brand founded by Maayank Malhotra.

### YOUR MISSION:
Your job is to help customers discover the perfect die-cut waterproof vinyl stickers, bumper decals, laptop skins, and custom gifts from our catalog of over 4,479 stickers. Be hype, helpful, conversational, and genuinely passionate about sticker culture!

### STORE IDENTITY & SPECS:
- **Brand**: Tabstick (tabstick.in)
- **Catalog Size**: 4,479 unique die-cut stickers & bumper decals across 9 categories.
- **Categories**:
  1. *Cars & Bikes*: Heavy-duty outdoor automotive bumper stickers, helmet decals, bike quotes.
  2. *Anime & Manga*: Naruto, Gojo (JJK), Goku, Demon Slayer, One Piece, Death Note, Baki, Attack on Titan.
  3. *Tech & Gaming*: Python, Linux, JavaScript, React, Docker, Git, Terminal, Cyberpunk, Gamer setups.
  4. *Memes & Desi Pop*: Indian pop culture, relatable humor, Bollywood memes, witty punchlines.
  5. *Glitter & Holographic*: Prismatic light-catching rainbow vinyl, metallic sheen, eye-catching gloss.
  6. *Aesthetic & Vibes*: Minimalist, floral, cozy coffee, retro vaporwave, pastel art, chill lofi.
  7. *Stickers & Skins*: All-purpose decals for laptops, phones, iPads, hydroflasks, diaries.
- **Material & Durability**:
  - 100% Waterproof & Weatherproof automotive-grade 3M vinyl.
  - Matte & Gloss UV laminate — resistant to direct sunlight, rain, scratches, car washes.
  - Bubble-free adhesive with residue-free peel-off (won't leave sticky glue on your MacBook or car paint).
- **Pricing & Shipping**:
  - Single decals starting from ₹10–₹49; large bumper decals ₹99–₹399.
  - Minimum order: ₹100.
  - **FREE Express Pan-India Shipping** on orders above ₹499 (otherwise flat ₹49).
  - Dispatched within 24–48 hours; delivery in 3–5 days across India.
  - Cash on Delivery (COD), UPI (GPay, PhonePe, Paytm), and Cards accepted.

### LIVE CATEGORY MAP FROM THE DATABASE:
{$catalogSummary}

### CURRENT LIVE STICKERS RETRIEVED FROM OUR 4,479 CATALOG FOR THIS QUERY:
{$candidatesText}

### STRICT RULES FOR RESPONSES:
1. **Catalog Grounding**: You MUST recommend stickers from the retrieved live list above. Mention exact product/sticker names, category names, and prices in ₹.
2. **Direct Links**: When mentioning a sticker, format it with its URL so the customer can tap it, e.g. "[Mountain Adventure Bumper Sticker](https://tabstick.in/products/mountain-adventure-bumper-sticker)".
3. **Images**: Product cards are rendered separately by the site using the Image fields above. You can mention that cards below show images, price, and add-to-cart.
4. **Tone & Style**: Friendly, enthusiastic, youth-focused (Hinglish/English friendly if the user speaks Hindi/Hinglish). Use relevant emojis (⚡, 🔥, 🚗, 💻, ✨).
5. **Length**: Keep replies punchy, readable, and structured (typically 2 to 4 engaging paragraphs or bullet points). Never write overly long essays.
6. **No Hallucinations**: NEVER invent fictional sticker designs not in our catalog. If the user asks for something outside our current stock, recommend the closest matching live products and mention custom stickers can be ordered.
PROMPT;
    }

    protected function getCatalogSummary(): string
    {
        return Cache::remember('sticker_ai_catalog_summary_v2', 1800, function () {
            $rows = Category::query()
                ->withCount(['products as active_products_count' => function ($q) {
                    $q->where('is_active', true)->where('stock', '>', 0);
                }])
                ->orderBy('name')
                ->get()
                ->map(function (Category $category) {
                    $priceRange = Product::where('category_id', $category->id)
                        ->where('is_active', true)
                        ->where('stock', '>', 0)
                        ->selectRaw('MIN(price) as min_price, MAX(price) as max_price')
                        ->first();

                    $min = $priceRange?->min_price !== null ? '₹' . number_format((float) $priceRange->min_price, 0) : 'N/A';
                    $max = $priceRange?->max_price !== null ? '₹' . number_format((float) $priceRange->max_price, 0) : 'N/A';

                    return sprintf(
                        '- %s (%s): %d live stickers, price range %s-%s',
                        $category->name,
                        $category->slug,
                        $category->active_products_count,
                        $min,
                        $max
                    );
                })
                ->implode("\n");

            return $rows !== '' ? $rows : '- No active categories found yet.';
        });
    }

    /**
     * Interactive Chat endpoint integrating Google Gemini with RAG catalog knowledge.
     *
     * @return array{reply: string, products: array}
     */
    public function chat(string $message, array $history = []): array
    {
        $message = trim($message);
        $candidates = $this->searchCatalog($message, 8);

        if (empty($this->apiKey)) {
            return [
                'reply' => $this->getHeuristicReply($message, $candidates),
                'products' => $candidates,
            ];
        }

        $contents = [];

        // Add recent conversation history (last 6 turns)
        $trimmedHistory = array_slice($history, -6);
        foreach ($trimmedHistory as $turn) {
            $role = ($turn['role'] ?? '') === 'assistant' ? 'model' : 'user';
            $text = trim($turn['content'] ?? '');
            if (!empty($text)) {
                $contents[] = [
                    'role' => $role,
                    'parts' => [['text' => $text]],
                ];
            }
        }

        // Add current question
        $contents[] = [
            'role' => 'user',
            'parts' => [['text' => $message]],
        ];

        $systemPrompt = $this->buildSystemPrompt($candidates);

        // Attempt Gemini models in order of failover
        foreach ($this->getCandidateModels() as $model) {
            $url = "{$this->baseUrl}/models/{$model}:generateContent?key={$this->apiKey}";

            try {
                $response = Http::timeout(8)
                    ->withHeaders(['Content-Type' => 'application/json'])
                    ->post($url, [
                        'systemInstruction' => [
                            'parts' => [['text' => $systemPrompt]],
                        ],
                        'contents' => $contents,
                        'generationConfig' => [
                            'temperature' => 0.5,
                            'maxOutputTokens' => 1500,
                        ],
                    ]);

                if ($response->successful()) {
                    $data = $response->json();
                    $rawText = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;
                    if (!empty($rawText)) {
                        $cleaned = preg_replace('/^(?:Thinking Process|Refinement|Draft)[^\n]*:\s*\*?\s*\n*/i', '', $rawText);
                        return [
                            'reply' => trim($cleaned),
                            'products' => $candidates,
                        ];
                    }
                } else {
                    Log::warning("StickerAI: Model {$model} HTTP " . $response->status());
                }
            } catch (\Throwable $e) {
                Log::warning("StickerAI: Model {$model} error: " . $e->getMessage());
            }
        }

        // Context-aware heuristic fallback
        return [
            'reply' => $this->getHeuristicReply($message, $candidates),
            'products' => $candidates,
        ];
    }

    /**
     * Context-aware heuristic reply if Gemini is temporarily unreachable.
     */
    protected function getHeuristicReply(string $query, array $products): string
    {
        $q = strtolower($query);

        if (str_contains($q, 'ship') || str_contains($q, 'delivery') || str_contains($q, 'cod')) {
            return "📦 **Shipping & Delivery Info**:\n\n- **FREE Shipping** across India on all orders above ₹499! (Flat ₹49 on smaller orders).\n- We dispatch within **24–48 hours**, and delivery takes **3–5 business days**.\n- We support **Cash on Delivery (COD)**, Instant UPI, and all debit/credit cards!";
        }

        if (str_contains($q, 'waterproof') || str_contains($q, 'quality') || str_contains($q, 'material')) {
            return "🛡️ **Automotive-Grade Quality**:\n\nEvery single Tabstick decal is crafted on **100% waterproof 3M vinyl** with scratch-resistant matte/gloss UV laminate. They are weatherproof, car-wash safe, and remove cleanly with **zero sticky residue**!";
        }

        if (empty($products)) {
            return "Hey! Explore our collection of 4,479 waterproof stickers! Whether you want car & bike bumper decals, anime characters, developer humor, or holographic shine, we've got you covered. What vibe are you looking for today?";
        }

        $names = array_map(fn($p) => "**{$p['name']}** ({$p['formatted_price']})", array_slice($products, 0, 3));
        $namesStr = implode(', ', $names);

        return "Here are some of our best matching stickers from the catalog:\n\nCheck out {$namesStr}! All printed on 100% waterproof vinyl. Tap any sticker card below to view details or add directly to your cart!";
    }
}
