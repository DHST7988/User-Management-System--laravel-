<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PublicAccessMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the current route is one of the public routes
        $publicRoutes = [
            'home', // Replace with the names of your public routes
            'public.about',
        ];

        if (in_array($request->route()->getName(), $publicRoutes)) {
            // Allow access to public routes without requiring authentication
            return $next($request);
        }

        // Require authentication for other routes
        return redirect('/login');
    }
}

