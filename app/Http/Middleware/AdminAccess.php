<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $adminRole = Role::where('name', 'Admin')->first();
        $editorRole = Role::where('name', 'Editor')->first();

        if (Auth::check() && Auth::user()->role_id === $adminRole->id) {
            return $next($request);
        }

        if (Auth::check() && Auth::user()->role_id === $editorRole->id) {
            return redirect()->route('home'); // Redirect to the home page
        }

        abort(403, 'Unauthorized.');
    }
}
