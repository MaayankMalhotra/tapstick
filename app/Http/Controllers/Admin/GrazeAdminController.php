<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GrazeInquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class GrazeAdminController extends Controller
{
    protected function isAuthorized(Request $request): bool
    {
        if (Auth::check() && Auth::user()?->is_admin) {
            return true;
        }

        return (bool)$request->session()->get('graze_admin_auth', false);
    }

    public function loginForm(Request $request): View|RedirectResponse
    {
        if ($this->isAuthorized($request)) {
            return redirect()->route('graze.admin.index');
        }

        return view('admin.graze.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'nullable|string',
            'password' => 'required|string',
        ]);

        $grazePass = config('app.graze_admin_password', env('GRAZE_ADMIN_PASSWORD', 'graze2026'));

        // Check if matching dedicated Graze passcode
        if ($request->password === $grazePass) {
            $request->session()->regenerate();
            $request->session()->put('graze_admin_auth', true);
            $request->session()->put('graze_admin_name', $request->email ?: 'Graze Manager');
            return redirect()->route('graze.admin.index')->with('success', 'Welcome to Graze & Gift Co. Admin');
        }

        // Otherwise try Tabstick Admin credentials
        if ($request->email && Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => true])) {
            $request->session()->regenerate();
            return redirect()->route('graze.admin.index')->with('success', 'Signed in as ' . Auth::user()->name);
        }

        return back()->withErrors(['password' => 'Invalid passcode or administrator credentials.'])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget(['graze_admin_auth', 'graze_admin_name']);
        if (Auth::check()) {
            Auth::logout();
        }
        $request->session()->regenerateToken();

        return redirect()->route('graze.admin.login')->with('success', 'You have been signed out.');
    }

    public function index(Request $request): View|RedirectResponse
    {
        if (! $this->isAuthorized($request)) {
            return redirect()->route('graze.admin.login');
        }

        $q = $request->input('q');
        $status = $request->input('status');
        $service = $request->input('service');
        $sort = $request->input('sort', 'latest');

        $query = GrazeInquiry::query();

        if ($q) {
            $query->where(function ($builder) use ($q) {
                $builder->where('full_name', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%")
                    ->orWhere('phone', 'like', "%{$q}%")
                    ->orWhere('city', 'like', "%{$q}%")
                    ->orWhere('vision', 'like', "%{$q}%")
                    ->orWhere('admin_notes', 'like', "%{$q}%");
            });
        }

        if ($status && array_key_exists($status, GrazeInquiry::$statuses)) {
            $query->where('status', $status);
        }

        if ($service && array_key_exists($service, GrazeInquiry::$services)) {
            $query->where('service', $service);
        }

        match ($sort) {
            'oldest' => $query->orderBy('created_at', 'asc'),
            'event_asc' => $query->orderByRaw("event_date IS NULL, event_date ASC"),
            'event_desc' => $query->orderByRaw("event_date IS NULL, event_date DESC"),
            default => $query->orderByDesc('created_at'),
        };

        $inquiries = $query->paginate(20)->withQueryString();

        $stats = [
            'total' => GrazeInquiry::count(),
            'new' => GrazeInquiry::where('status', 'new')->count(),
            'confirmed' => GrazeInquiry::where('status', 'confirmed')->count(),
            'quoted' => GrazeInquiry::where('status', 'quoted')->count(),
            'upcoming' => GrazeInquiry::whereNotNull('event_date')
                ->where('event_date', '>=', now()->toDateString())
                ->count(),
        ];

        $adminName = Auth::user()?->name ?? $request->session()->get('graze_admin_name', 'Graze Manager');

        return view('admin.graze.index', compact('inquiries', 'stats', 'q', 'status', 'service', 'sort', 'adminName'));
    }

    public function update(Request $request, GrazeInquiry $inquiry): RedirectResponse
    {
        if (! $this->isAuthorized($request)) {
            return redirect()->route('graze.admin.login');
        }

        $validated = $request->validate([
            'status' => 'required|string|in:' . implode(',', array_keys(GrazeInquiry::$statuses)),
            'admin_notes' => 'nullable|string|max:5000',
        ]);

        $inquiry->update($validated);

        return back()->with('success', "Inquiry #{$inquiry->id} ({$inquiry->full_name}) updated.");
    }

    public function destroy(Request $request, GrazeInquiry $inquiry): RedirectResponse
    {
        if (! $this->isAuthorized($request)) {
            return redirect()->route('graze.admin.login');
        }

        $clientName = $inquiry->full_name;
        $inquiry->delete();

        return back()->with('success', "Inquiry for {$clientName} has been deleted.");
    }

    public function export(Request $request): StreamedResponse|RedirectResponse
    {
        if (! $this->isAuthorized($request)) {
            return redirect()->route('graze.admin.login');
        }

        $inquiries = GrazeInquiry::orderByDesc('created_at')->get();

        $filename = 'graze_inquiries_' . date('Y-m-d_His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function () use ($inquiries) {
            $file = fopen('php://output', 'w');
            // Write UTF-8 BOM for Excel compatibility
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

            fputcsv($file, [
                'Inquiry ID',
                'Submitted At',
                'Status',
                'Client Name',
                'Phone Number',
                'WhatsApp Chat Link',
                'Email Address',
                'Event Date',
                'City / Venue Location',
                'Guest Count',
                'Budget Range',
                'Event Type',
                'Service Requested',
                'Dietary Preference',
                'Vision & Special Requests',
                'Admin Internal Notes',
                'IP Address'
            ]);

            foreach ($inquiries as $item) {
                fputcsv($file, [
                    $item->id,
                    $item->created_at?->format('Y-m-d H:i:s'),
                    $item->status_label,
                    $item->full_name,
                    $item->phone,
                    $item->wa_link,
                    $item->email,
                    $item->event_date,
                    $item->city,
                    $item->guest_count,
                    $item->budget_label,
                    $item->event_type_label,
                    $item->service_label,
                    $item->dietary_label,
                    $item->vision,
                    $item->admin_notes,
                    $item->ip_address,
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
