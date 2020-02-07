<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->level == 3){
                return redirect('/cashier/order');
            }else if(Auth::user()->level == 1){
                return redirect('/admin/dashboard');
            }else if(Auth::user()->lecel == 2){
                return redirect('/outlet/dashboard');
            }
            return redirect('/home');
        }

        return $next($request);
    }
}
