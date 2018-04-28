<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\CompanyModule;
use App\Models\Module;

class NewsLetterAuthMiddleware
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

        $company_id = Auth::user()->companyUser()->first()->company_id;
        $module = CompanyModule::where('company_id', $company_id)
            ->join('modules', 'module_id', '=', 'modules.id')
            ->where('modules.code', 'newsletter_module')->first();

        if ($module) {
            return $next($request);
        } else {
            return redirect()->route('company.dashboard');
        }

    }
}
