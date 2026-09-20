<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureCanonicalDomain
{
    /**
     * Handle an incoming request and enforce canonical domain.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $host = $request->getHost();

        // 301 Permanent Redirect any www.tabstick.in requests to non-www canonical domain
        if ($host === 'www.tabstick.in') {
            return redirect()->to('https://tabstick.in' . $request->getRequestUri(), 301);
        }

        return $next($request);
    }
}
