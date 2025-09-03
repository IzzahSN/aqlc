<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $userRole = session('role');

        if (!$userRole || !in_array($userRole, $roles)) {
            return redirect()->route('login')->withErrors([
                'access' => 'You are not authorized to access this page.'
            ]);
        }

        return $next($request);
    }
}
