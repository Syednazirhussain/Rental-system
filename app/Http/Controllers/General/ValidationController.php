<?php

namespace App\Http\Controllers\General;

use App\Repositories\CountryRepository;
use App\Repositories\StateRepository;
use App\Repositories\CityRepository;
use App\Repositories\CompanyContractRepository;
use App\Repositories\CompanyUserRepository;
use App\Repositories\UserRepository;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Mail\TestEmail;
use Mail;

class ValidationController extends AppBaseController
{
    /** @var  UserRoleRepository */
    private $companyContractRepository;
    private $companyUserRepository;
    private $userRepository;


    public function __construct(CompanyContractRepository $contractRepo,
                                CompanyUserRepository $companyUserRepo,
                                UserRepository $userRepo)
    {
        $this->companyContractRepository = $contractRepo;
        $this->companyUserRepository = $companyUserRepo;
        $this->userRepository = $userRepo;
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


    /**
     * Validate Admin Email is already in use or not 
     *
     * @param Request $request
     * @return Json Response
     */
    public function adminEmail(Request $request)
    {
        $adminEmail = $request->admin_email;


        $admin = $this->companyUserRepository->findAdminByEmail($adminEmail);

        if (count($admin) > 0) {
            $success = 0;
            $response = 401;
        } else {
            $success = 1;
            $response = 200;
        }

        return response()->json(['success'=> $success, 'code'=>$response]);
        
    }


    public function siteAdminEmail(Request $request)
    {
        
        $siteAdmin_email = $request->email;

        $siteAdmin = $this->userRepository->findSiteAdminByEmail($siteAdmin_email);

        
        if (count($siteAdmin) > 0) {
            $success = 0;
            $response = 401;
        } else {
            $success = 1;
            $response = 200;
        }

        return response()->json(['success'=> $success, 'code'=>$response]);
        
    }


    public function sendMail(Request $request) {

        $data = ['message' => 'This is a test!'];

        Mail::to('thefaizan@gmail.com')->send(new TestEmail($data));
    }

    
}
