<?php

namespace App\Http\Middleware;
use Auth;
use Closure;


class isActive
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
        if(Auth::user() && Auth::user()->is_active == 1) {
            return $next($request);
        }
        return redirect('/ban');
    }
}
