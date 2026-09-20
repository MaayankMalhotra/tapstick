<?php

namespace App\Http\Controllers;

use App\Models\CustomerLead;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function capture(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:20',
            'name' => 'nullable|string|max:100',
            'auth_provider' => 'nullable|string|max:30',
        ]);

        $email = strtolower(trim($validated['email']));
        $phone = !empty($validated['phone']) ? preg_replace('/[^0-9+]/', '', trim($validated['phone'])) : null;
        if ($phone) {
            $digits = preg_replace('/[^0-9]/', '', $phone);
            if (strlen($digits) === 10) {
                $phone = '+91 ' . $digits;
            } elseif (strlen($digits) === 12 && str_starts_with($digits, '91')) {
                $phone = '+91 ' . substr($digits, 2);
            }
        }
        $name = !empty($validated['name']) ? trim($validated['name']) : null;
        $provider = !empty($validated['auth_provider']) ? trim($validated['auth_provider']) : 'web_form';

        $lead = CustomerLead::updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'phone' => $phone,
                'auth_provider' => $provider,
                'discount_code' => 'TABSTICK10',
                'ip_address' => $request->ip(),
            ]
        );

        // Store in session so checkout fields are pre-filled automatically
        if ($lead->name) {
            session(['customer_name' => $lead->name]);
        }
        if ($lead->email) {
            session(['customer_email' => $lead->email]);
        }
        if ($lead->phone) {
            session(['customer_phone' => $lead->phone]);
        }
        session(['vip_joined' => true, 'vip_discount_code' => 'TABSTICK10']);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Welcome to the Tabstick Club! Use coupon code TABSTICK10 for 10% off.',
                'discount_code' => 'TABSTICK10',
                'customer' => [
                    'name' => $lead->name,
                    'email' => $lead->email,
                    'phone' => $lead->phone,
                    'provider' => $lead->auth_provider,
                ],
            ]);
        }

        return back()->with('success', 'Welcome to the Tabstick Club! Use coupon code TABSTICK10 for 10% off.');
    }
}
