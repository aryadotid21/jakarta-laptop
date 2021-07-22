<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,)
    {
        if (Auth::user()->role_id == 1) { // if the current role is Administrator
            return $next($request);
        } 
        return redirect()->back();
    }
}
