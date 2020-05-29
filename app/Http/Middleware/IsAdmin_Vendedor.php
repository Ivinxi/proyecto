<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsAdmin_Vendedor
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
        if (Auth::user() && (Auth::user()->rol == 'admin' || Auth::user()->rol == 'vendedor')){

            return $next($request);
        }

        return redirect('/');
    }
}
