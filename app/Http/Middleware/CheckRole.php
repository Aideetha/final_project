<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role){
        
        if(!$request->user()->hasRole($role)){
            return abort(401, 'You don\'t have authorized access.');
        }
        return $next($request);        
    }
}