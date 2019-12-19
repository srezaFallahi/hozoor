<?php

namespace App\Http\Middleware;

use App\userables;
use Closure;
use Illuminate\Support\Facades\Auth;

class managerLogin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if ($this->checkRole() == 'App\\Manager') {
                return $next($request);
            }
//        else if($this->checkRole() == 'App\\Teacher'){
//            }
        }

    }

    public function checkRole()
    {
        return Auth::user()->userables()->get('userables_type');
    }

}
