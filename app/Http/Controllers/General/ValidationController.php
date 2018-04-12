<?php

namespace App\Http\Controllers\General;

use App\Repositories\CountryRepository;
use App\Repositories\StateRepository;
use App\Repositories\CityRepository;
use App\Repositories\Admin\CompanyContractRepository;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ValidationController extends AppBaseController
{
    /** @var  UserRoleRepository */
    private $companyContractRepository;


    public function __construct(CompanyContractRepository $contractRepo)
    {
        $this->companyContractRepository = $contractRepo;
    }

    /**
     * Validate Contract No is already in use or not 
     *
     * @param Request $request
     * @return Json Response
     */
    public function contractNo(Request $request)
    {
        $contractNo = $request->number;


        $contract = $this->companyContractRepository->findContractByNumber($contractNo);

        if (count($contract) > 0) {
            $success = 0;
            $response = 401;
        } else {
            $success = 1;
            $response = 200;
        }
        return response()->json(['success'=> $success, 'code'=>$response]);
        
    }

    
}
