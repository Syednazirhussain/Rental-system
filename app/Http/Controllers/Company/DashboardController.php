<?php

namespace App\Http\Controllers\Company;


use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

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
        return view('company.dashboard.index');
    }

}
