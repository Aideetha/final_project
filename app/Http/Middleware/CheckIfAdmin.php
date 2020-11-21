<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if (Auth::user()->role_id == 2) {
        //     return abort(401, 'You don\'t have authorized access.');
        // }
        // return $next($request);

        if(Auth::check()){
            if (Auth::user()->role_id == 2) {
                return abort(401, 'You don\'t have authorized access.');
            }
            return $next($request);
        }

        return $next($request);
    }
}
