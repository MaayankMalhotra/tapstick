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
            'gemini-2.0-flash',
            'gemini-1.5-flash-8b',
            'gemini-1.5-flash',
            'gemini-flash-latest',
        ];

        // Older deploys may still have experimental model names in .env.
        // Skip them for the storefront chat so failed AI calls do not stall the UX.
        if (preg_match('/^gemini-3/i', $preferred)) {
            return $fallbacks;
        }

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
        } elseif (preg_match('/(?:rs\.?|inr|₹)?\s*(\d+)\s*(?:rupees?|rs|inr|₹)\s*(?:items?|stickers?|decals?)?/i', $cleanQuery, $m)) {
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
        $scored = $products->map(function (Product $product) use ($cleanQuery, $phrase, $searchTerms, $targetCategorySlug, $maxPrice) {
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
            if ($maxPrice !== null && (float) $product->price <= $maxPrice) {
                $score += max(0, 25 - abs((float) $product->price - $maxPrice));
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
            'rings' => ['ring', 'rings', 'band', 'bands', 'solitaire', 'stackable', 'cocktail', 'finger'],
            'charms-pendants' => ['charm', 'charms', 'pendant', 'pendants', 'locket', 'evil eye', 'zodiac', 'motif'],
            'bracelets' => ['bracelet', 'bracelets', 'cuff', 'cuffs', 'bangle', 'bangles', 'tennis', 'wrist'],
            'earrings' => ['earring', 'earrings', 'stud', 'studs', 'hoop', 'hoops', 'huggie', 'huggies', 'drop', 'jhumka'],
            'necklaces' => ['necklace', 'necklaces', 'chain', 'chains', 'choker', 'chokers', 'collar', 'layering'],
            'jewelry-sets' => ['set', 'sets', 'combo', 'matching', 'gift set', 'bridal'],
            // Backwards compatibility for tests
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
     * Get popular fallback jewelry when query is empty.
     */
    public function getPopularStickers(int $limit = 8): array
    {
        return Cache::remember('sticker_ai_popular_' . $limit, 3600, function () use ($limit) {
            return Product::with('category:id,name,slug')
                ->where('is_active', true)
                ->where('stock', '>', 0)
                ->where('slug', '!=', 'one-rupee-test-sticker')
                ->orderBy('id', 'desc')
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
You are Tabstick AI, the elegant, warm, and knowledgeable AI Shopping Assistant & Fine Jewelry Stylist for Tabstick Jewelry (tabstick.in) — India's premier 18K gold-plated fine jewelry brand founded by Maayank Malhotra.

### YOUR MISSION:
Your job is to help customers discover the perfect anti-tarnish, water-resistant 18K gold-plated rings, charms & pendants, bracelets, earrings, and necklaces from our luxury collection of over 599+ fine jewelry pieces. Be warm, sophisticated, conversational, and genuinely helpful in styling recommendations!

### STORE IDENTITY & SPECS:
- **Brand**: Tabstick Jewelry (tabstick.in)
- **Catalog**: 599+ unique handcrafted fine jewelry designs across 6 curated collections:
  1. *Rings*: 18K gold plated stackable bands, solitaires, crystal statement rings.
  2. *Charms & Pendants*: Aesthetic daily pendants, zodiac symbols, celestial & floral motifs.
  3. *Bracelets & Cuffs*: Waterproof tennis bracelets, link chains, and minimalist cuffs.
  4. *Earrings & Hoops*: Hypoallergenic huggies, studs, and elegant drop earrings.
  5. *Necklaces & Chains*: Daily layering chains, choker collars, and pendant necklaces.
  6. *Jewelry Sets*: Coordinated gift sets in signature Tabstick luxury packaging.
- **Craftsmanship & Quality**:
  - Genuine 18K Vacuum Gold Plating over premium surgical-grade stainless steel.
  - 100% Water & Sweatproof — safe for showers, workouts, and swimming without tarnishing or green skin.
  - Hypoallergenic & Skin-Safe (100% nickel-free & lead-free).
  - 6-Month Warranty against fading, tarnishing, or discoloration.
- **Pricing & Shipping**:
  - Minimum order: ₹100.
  - **FREE Pan-India Express Delivery** on orders above ₹499 (flat ₹49 on smaller orders).
  - Dispatched within 24–48 hours; delivery in 2–5 business days across India.
  - Cash on Delivery (COD), UPI (GPay, PhonePe, Paytm), and Cards accepted.

### LIVE CATEGORY MAP FROM THE DATABASE:
{$catalogSummary}

### CURRENT LIVE PIECES RETRIEVED FOR THIS QUERY:
{$candidatesText}

### STRICT RULES FOR RESPONSES:
1. **Catalog Grounding**: Recommend items from the retrieved live list above. Mention exact product names, categories, and prices in ₹.
2. **Direct Links**: When mentioning a product, format it with its URL so the customer can tap it, e.g. "[Solitaire Gold Ring](https://tabstick.in/products/solitaire-gold-ring)".
3. **Tone & Style**: Warm, luxurious, helpful, and friendly.
4. **Length**: Keep replies punchy, readable, and structured (typically 2 to 3 engaging paragraphs or bullet points).
5. **No Hallucinations**: NEVER invent fictional products not in our catalog. If the user asks for something outside current stock, recommend the closest matching live products.
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

        try {
            $systemPrompt = $this->buildSystemPrompt($candidates);
        } catch (\Throwable $e) {
            Log::warning('StickerAI: Prompt build failed: ' . $e->getMessage());

            return [
                'reply' => $this->getHeuristicReply($message, $candidates),
                'products' => $candidates,
            ];
        }

        // Attempt Gemini models in order of failover
        foreach ($this->getCandidateModels() as $model) {
            $url = "{$this->baseUrl}/models/{$model}:generateContent?key={$this->apiKey}";

            try {
                $response = Http::connectTimeout(2)
                    ->timeout(4)
                    ->withHeaders(['Content-Type' => 'application/json'])
                    ->post($url, [
                        'systemInstruction' => [
                            'parts' => [['text' => $systemPrompt]],
                        ],
                        'contents' => $contents,
                        'generationConfig' => [
                            'temperature' => 0.5,
                            'maxOutputTokens' => 900,
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
            return "📦 **Shipping & Delivery Info**:\n\n- **FREE Pan-India Delivery** on all orders above ₹499! (Flat ₹49 on orders under ₹499).\n- Dispatched within **24–48 hours** with delivery in **2–5 business days**.\n- We support **Cash on Delivery (COD)**, UPI, and all major debit/credit cards!";
        }

        if (str_contains($q, 'waterproof') || str_contains($q, 'quality') || str_contains($q, 'material') || str_contains($q, 'tarnish') || str_contains($q, 'gold')) {
            return "✨ **18K Gold Plated Luxury**:\n\nEvery Tabstick piece is crafted with **18K vacuum gold ion-plating** over surgical stainless steel. They are **100% waterproof, sweatproof, and anti-tarnish** — wear them daily in showers and workouts with zero green skin!";
        }

        if (empty($products)) {
            return "I checked our fine jewelry collection but couldn't find an exact match for this vibe yet. Try exploring categories like **rings**, **pendants**, **bracelets**, **earrings**, or **necklaces** and I'll pull the exact pieces with photos and prices.";
        }

        $priceIntent = '';
        if (preg_match('/(?:under|below|less than|within|around)?\s*(?:rs\.?|inr|₹)?\s*(\d+)/i', $q, $m)) {
            $priceIntent = " around ₹{$m[1]}";
        } elseif (str_contains($q, 'cheap') || str_contains($q, 'budget')) {
            $priceIntent = ' budget';
        }

        $lines = collect(array_slice($products, 0, 4))->map(function ($p) {
            return "- **[{$p['name']}]({$p['url']})** — {$p['formatted_price']} · {$p['category']}";
        })->implode("\n");

        return "Found beautiful fine jewelry pieces{$priceIntent} for you:\n\n{$lines}\n\nThe cards below show the exact jewelry pieces, prices, and 1-click add-to-cart buttons. All pieces are 18K gold plated and anti-tarnish!";
    }
}
