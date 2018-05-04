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
        if(Auth::check())
        {

            if (Auth::user()->user_role_code == 'company_admin') 
            {
                return $next($request);    
            } 
            else 
            {
                $request->session()->flush();
                return redirect()->route('company.dashboard');
            }
            
        }
        else 
        {
            return redirect()->route('company.login');
        }
    }
}
