<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RequireVendor
{
    public function handle(Request $request, Closure $next)
    {
        if (! $request->user()) {
            return redirect()->guest(route('vendor.login'));
        }

        abort_unless($request->user()->is_vendor && $request->user()->vendor_id, 403);

        return $next($request);
    }
}
