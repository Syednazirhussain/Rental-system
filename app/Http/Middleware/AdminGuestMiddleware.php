<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminGuestMiddleware
{
    /**
     * Handle an incoming guest user request to access admin panel.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {

            if (Auth::user()->user_role_code == 'admin') {
                return redirect()->route('admin.dashboard');  
            } else {
                return $next($request);
            }
            
        } else {
            return $next($request);
        }
    }
}
