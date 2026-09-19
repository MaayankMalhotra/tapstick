<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerLead;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CustomerController extends Controller
{
    public function index(Request $request): View
    {
        $q = $request->input('q');

        $query = Order::query()
            ->select(
                'email',
                DB::raw('MAX(customer_name) as name'),
                DB::raw('MAX(phone) as phone'),
                DB::raw('MAX(city) as city'),
                DB::raw('MAX(state) as state'),
                DB::raw('COUNT(id) as total_orders'),
                DB::raw('SUM(total) as total_spent'),
                DB::raw('MAX(created_at) as last_order_at')
            )
            ->groupBy('email');

        if ($q) {
            $query->where(function ($builder) use ($q) {
                $builder->where('customer_name', 'like', '%'.$q.'%')
                    ->orWhere('email', 'like', '%'.$q.'%')
                    ->orWhere('phone', 'like', '%'.$q.'%')
                    ->orWhere('city', 'like', '%'.$q.'%');
            });
        }

        $customers = $query->orderByDesc('last_order_at')->paginate(20, ['*'], 'customers_page')->withQueryString();

        $leadsQuery = CustomerLead::query();
        if ($q) {
            $leadsQuery->where(function ($builder) use ($q) {
                $builder->where('name', 'like', '%'.$q.'%')
                    ->orWhere('email', 'like', '%'.$q.'%')
                    ->orWhere('phone', 'like', '%'.$q.'%');
            });
        }
        $leads = $leadsQuery->orderByDesc('created_at')->paginate(20, ['*'], 'leads_page')->withQueryString();
        $leadsCount = CustomerLead::count();

        return view('admin.customers.index', compact('customers', 'leads', 'q', 'leadsCount'));
    }

    public function leads(Request $request): View
    {
        $q = $request->input('q');
        $source = $request->input('source');

        $query = CustomerLead::query();

        if ($q) {
            $query->where(function ($builder) use ($q) {
                $builder->where('name', 'like', '%'.$q.'%')
                    ->orWhere('email', 'like', '%'.$q.'%')
                    ->orWhere('phone', 'like', '%'.$q.'%');
            });
        }

        if ($source && in_array($source, ['web_form', 'google'])) {
            $query->where('auth_provider', $source);
        }

        $leads = $query->orderByDesc('created_at')->paginate(25)->withQueryString();

        $totalLeads = CustomerLead::count();
        $webCount = CustomerLead::where('auth_provider', '!=', 'google')->count();
        $googleCount = CustomerLead::where('auth_provider', 'google')->count();

        // Get emails of customers who have actually placed orders to track lead conversion
        $orderedEmails = Order::pluck('email')->unique()->flip()->all();

        return view('admin.leads.index', compact(
            'leads', 'q', 'source', 'totalLeads', 'webCount', 'googleCount', 'orderedEmails'
        ));
    }

    public function exportLeads(): StreamedResponse
    {
        $leads = CustomerLead::orderByDesc('created_at')->get();
        $orderedEmails = Order::pluck('email')->unique()->flip()->all();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="tapstick_leads_' . date('Y-m-d_His') . '.csv"',
        ];

        $callback = function () use ($leads, $orderedEmails) {
            $file = fopen('php://output', 'w');
            fputcsv($file, [
                'ID', 'Name', 'Email Address', 'Mobile Number', 'WhatsApp Chat Link',
                'Source', 'Discount Code', 'Ordered (Converted)', 'Registered At'
            ]);

            foreach ($leads as $lead) {
                $cleanPhone = preg_replace('/[^0-9]/', '', $lead->phone ?? '');
                $waLink = $cleanPhone ? 'https://wa.me/' . (strlen($cleanPhone) === 10 ? '91' . $cleanPhone : $cleanPhone) : '';
                $hasOrdered = isset($orderedEmails[$lead->email]) ? 'YES' : 'NO';

                fputcsv($file, [
                    $lead->id,
                    $lead->name ?: 'Guest',
                    $lead->email,
                    $lead->phone ?: '',
                    $waLink,
                    $lead->auth_provider,
                    $lead->discount_code,
                    $hasOrdered,
                    $lead->created_at->format('Y-m-d H:i:s'),
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function destroyLead(CustomerLead $lead): RedirectResponse
    {
        $lead->delete();
        return back()->with('success', 'Lead removed from directory.');
    }
}
