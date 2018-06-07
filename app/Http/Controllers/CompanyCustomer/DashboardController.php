<?php

namespace App\Http\Controllers\CompanyCustomer;


use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;

use App\Models\User;


class DashboardController extends AppBaseController
{

    /**
     * Display a listing of the Dashboard.
     *
     * @param Request $request
     * @return Response
     */
    public function index()
    {
        return view('company_customer.dashboard.index');
    }

    public function profile() 
    {
        $user_id = Auth::guard('company_customer')->user()->id;
        $user = User::find($user_id);
        return view('company_customer.dashboard.profile', ['user' => $user]);
    }

}
