<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class adminPage
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public
    function handle($request, Closure $next, $permission)
    {
        $user = Auth::user();
        if (Auth::check()) {
            if ($user->hasPermission($permission)) {
                return $next($request);
            } else
                return redirect('/login');
        }
        return redirect('/login');
    }
}
