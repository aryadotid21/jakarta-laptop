<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Http\Request;

class IsUser
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
        if (Auth::user()->role_id == 3) { // if the current role is Administrator
            return $next($request);
        } 
        return redirect()->back();
    }
}
