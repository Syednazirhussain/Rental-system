<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CompanyCustomerAuthMiddleware
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
        if(Auth::guard('company_customer')->check())
        {
            if (Auth::guard('company_customer')->user()->user_role_code == 'company_customer') 
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
            return redirect()->route('companyCustomer.login');
        }
    }
}
