<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class isAdmin
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
        if(Auth::user() && Auth::user()->group_id == 99 or Auth::user() && Auth::user()->group_id == '84235') {
            return $next($request);
        }
        return redirect('/');
    }
}
