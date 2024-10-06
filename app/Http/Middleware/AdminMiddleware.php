<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Allow access to the login page
        if ($request->routeIs('filament.admin.auth.login')) {
            return $next($request);
        }

        // Check if user is logged in admin guard
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('filament.admin.auth.login');
        }

        // Check if the logged-in admin user has admin role
        if (!Auth::guard('admin')->user()->hasRole('admin')) {
            Auth::guard('admin')->logout();
            return redirect()->route('filament.admin.auth.login')->with('error', 'Unauthorized access');
        }

        return $next($request);
    }
}