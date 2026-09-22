<?php

namespace App\Http\Controllers;

use App\Services\StickerAiService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StickerAiController extends Controller
{
    /**
     * Interactive AI Chatbot endpoint for Tabstick sticker shoppers.
     */
    public function chat(Request $request, StickerAiService $stickerAi): JsonResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|min:2|max:500',
            'history' => 'nullable|array|max:10',
            'history.*.role' => 'required_with:history|string|in:user,assistant',
            'history.*.content' => 'required_with:history|string|max:1000',
        ]);

        $message = trim($validated['message']);
        $history = $validated['history'] ?? [];

        $response = $stickerAi->chat($message, $history);

        return response()->json([
            'success' => true,
            'reply' => $response['reply'],
            'products' => $response['products'],
        ]);
    }

    /**
     * Fast search endpoint for sticker autocomplete and quick suggestions.
     */
    public function search(Request $request, StickerAiService $stickerAi): JsonResponse
    {
        $q = trim((string) $request->query('q', ''));
        $products = $stickerAi->searchCatalog($q, 8);

        return response()->json([
            'success' => true,
            'query' => $q,
            'count' => count($products),
            'products' => $products,
        ]);
    }
}
