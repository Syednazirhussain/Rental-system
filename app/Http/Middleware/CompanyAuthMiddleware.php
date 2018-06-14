<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CompanyAuthMiddleware
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
        if(Auth::guard('company')->check())
        {
            if (Auth::guard('company')->user()->user_role_code == 'company_admin' ||
                Auth::guard('company')->user()->user_role_code == 'company_technical_support' ) 
            {
                return $next($request);  
            } 
            else 
            {
                return redirect()->back();
            }
        }
        else 
        {
            return redirect()->route('company.login');
        }
    }
}
