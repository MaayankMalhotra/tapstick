<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

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

        $leadsQuery = \App\Models\CustomerLead::query();
        if ($q) {
            $leadsQuery->where(function ($builder) use ($q) {
                $builder->where('name', 'like', '%'.$q.'%')
                    ->orWhere('email', 'like', '%'.$q.'%')
                    ->orWhere('phone', 'like', '%'.$q.'%');
            });
        }
        $leads = $leadsQuery->orderByDesc('created_at')->paginate(20, ['*'], 'leads_page')->withQueryString();

        return view('admin.customers.index', compact('customers', 'leads', 'q'));
    }
}
