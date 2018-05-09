<?php

namespace App\Http\Middleware;

use Closure;

class AdminUsersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$permission)
    {
        if (in_array($permission, session('permissions'))) 
        {
            return $next($request);
        }
        else
        {
            return redirect()->back();
        }



    }
}
