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
        if(Auth::guard('admin')->check())
        {
            if (Auth::guard('admin')->user()->user_role_code == 'admin' || 
                Auth::guard('admin')->user()->user_role_code == 'admin_technical_support') {

                $collection = auth()->guard('admin')->user()->getPermissionsViaRoles();
                $permissions = [];
                foreach ($collection as $key=>$value) 
                {
                    $permissions[] = $value['name'];
                }

                session(['permissions' => $permissions]);

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
