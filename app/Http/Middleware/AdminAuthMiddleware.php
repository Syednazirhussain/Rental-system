<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminAuthMiddleware
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
        if(Auth::check())
        {

            if (Auth::user()->user_role_code == 'admin') {
                return $next($request);    
            } else {
                $request->session()->flush();
                return redirect()->route('admin.login');
            }
            
        } else {
            return redirect()->route('admin.login');
        }
    }
}
