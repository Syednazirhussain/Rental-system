<?php

namespace App\Http\Controllers\Admin;


use App\Repositories\CompanyRepository;
use App\Repositories\CompanyBuildingRepository;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Auth;

class DashboardController extends AppBaseController
{


    private $companyRepository;
    private $CompanyBuildingRepository;



    public function __construct(CompanyRepository $companyRepo,
                                CompanyBuildingRepository $companyBuildingRepo 
                                )
    {
        $this->companyRepository = $companyRepo;
        $this->companyBuildingRepository = $companyBuildingRepo;
    }

    /**
     * Display a listing of the Dashboard.
     *
     * @param Request $request
     * @return Response
     */
    public function index()
    {


        $companyCount = $this->companyRepository->companyCount();
        $companyRecent = $this->companyRepository->companyRecent();
        $companyBuildingCount = $this->companyBuildingRepository->companyBuildingCount();

        $data = [
                    'companyCount' => $companyCount,
                    'companyBuildingCount' => $companyBuildingCount,
                    'companyRecent' => $companyRecent
                ];
                
        return view('admin.dashboard.index', $data);
    }

}
