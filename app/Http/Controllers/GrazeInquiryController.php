<?php

namespace App\Http\Controllers;

use App\Models\GrazeInquiry;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GrazeInquiryController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'fullName' => 'nullable|string|max:100',
            'full_name' => 'nullable|string|max:100',
            'phone' => 'required|string|max:50',
            'email' => 'required|email|max:150',
            'date' => 'nullable|string|max:50',
            'event_date' => 'nullable|string|max:50',
            'city' => 'required|string|max:150',
            'guests' => 'nullable|numeric|min:1|max:5000',
            'guest_count' => 'nullable|numeric|min:1|max:5000',
            'budget' => 'nullable|string|max:50',
            'eventType' => 'nullable|string|max:50',
            'event_type' => 'nullable|string|max:50',
            'service' => 'required|string|max:100',
            'dietary' => 'nullable|string|max:100',
            'vision' => 'nullable|string|max:2000',
        ]);

        $fullName = $validated['full_name'] ?? $validated['fullName'] ?? 'Guest';
        $eventDate = $validated['event_date'] ?? $validated['date'] ?? null;
        $guestCount = $validated['guest_count'] ?? $validated['guests'] ?? null;
        $eventType = $validated['event_type'] ?? $validated['eventType'] ?? 'other';

        try {
            $inquiry = GrazeInquiry::create([
                'full_name' => $fullName,
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'event_date' => $eventDate,
                'city' => $validated['city'],
                'guest_count' => $guestCount ? (int)$guestCount : null,
                'budget' => $validated['budget'] ?? null,
                'event_type' => $eventType,
                'service' => $validated['service'],
                'dietary' => $validated['dietary'] ?? null,
                'vision' => $validated['vision'] ?? null,
                'status' => 'new',
                'ip_address' => $request->ip(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Inquiry received successfully. Our team will contact you within 24 hours.',
                'id' => $inquiry->id,
            ], 201);
        } catch (\Throwable $e) {
            Log::error('Graze inquiry store failed: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Unable to record inquiry right now, but please continue via WhatsApp!',
            ], 500);
        }
    }
}
