<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateCompanyRequest;
use App\Http\Requests\Admin\UpdateCompanyRequest;
use App\Repositories\CompanyRepository;
use App\Repositories\CompanyFloorRoomRepository;
use App\Repositories\CountryRepository;
use App\Repositories\StateRepository;
use App\Repositories\CityRepository;
use App\Repositories\PaymentCycleRepository;
use App\Repositories\PaymentMethodRepository;
use App\Repositories\UserStatusRepository;
use App\Repositories\DiscountTypeRepository;
use App\Repositories\CompanyUserRepository;
use App\Repositories\UserRepository;

// use App\Repositories\Admin\ModuleRepository;

use App\Repositories\ModuleRepository;

use Auth;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use PDF;
use URL;


use App\Models\Company;
use App\Models\CompanySupportCategory;
use App\Models\CompanySupportPriorities;
use App\Models\CompanySupportStatus;

class CompanyController extends AppBaseController
{
    /** @var  CompanyRepository */
    private $companyRepository;
    private $companyFloorRoomRepository;
    private $countryRepository;
    private $stateRepository;
    private $cityRepository;
    private $userStatusRepository;
    private $discountTypeRepository;
    private $moduleRepository;
    private $paymentCycleRepository;
    private $paymentMethodRepository;
    private $companyUserRepository;
    private $userRepository;


    public function __construct(CompanyRepository $companyRepo, 
                                CountryRepository $countryRepo, 
                                StateRepository $stateRepo,
                                CityRepository $cityRepo,
                                UserStatusRepository $userStatusRepo,
                                DiscountTypeRepository $discountTypeRepo,
                                ModuleRepository $moduleRepo,
                                PaymentCycleRepository $paymentCycleRepo,
                                PaymentMethodRepository $paymentMethodRepo,
                                CompanyFloorRoomRepository $companyFloorRoomRepo,
                                CompanyUserRepository $CompanyUserRepository,
                                UserRepository $UserRepository
                                )
    {
        $this->companyRepository = $companyRepo;
        $this->stateRepository = $stateRepo;
        $this->countryRepository = $countryRepo;
        $this->cityRepository = $cityRepo;
        $this->userStatusRepository = $userStatusRepo;
        $this->discountTypeRepository = $discountTypeRepo;
        $this->moduleRepository = $moduleRepo;
        $this->paymentCycleRepository = $paymentCycleRepo;
        $this->paymentMethodRepository = $paymentMethodRepo;
        $this->companyFloorRoomRepository = $companyFloorRoomRepo;
        $this->companyUserRepository = $CompanyUserRepository;
        $this->userRepository = $UserRepository;
    }

    /**
     * Display a listing of the Company.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyRepository->pushCriteria(new RequestCriteria($request));

        $companies = $this->companyRepository->all();

        $companies = Company::where('room_contract_id', NULL)->get();

        $data = ['companies' => $companies];

        return view('admin.companies.index', $data);
    }


    public function adminLoginAsCompanyAdmin($company_id,$user_id = 0)
     {
        // return "Company ID : ".$id;

        if($user_id == 0)
        {
            $companyUser = $this->companyUserRepository->getCompanyUserByCompanyId($company_id);

            if ( count($companyUser) > 0) 
            {
                $user = $this->userRepository->findWithoutFail($companyUser->user_id);

                $logged_in = Auth::guard('company')->loginUsingId($user->id);

                if (!$logged_in)
                {
                    session()->flash('msg.error','Error Occured while logged in as company admin');
                    return redirect()->back();
                }
                else
                {
                  return redirect(route('company.dashboard'));   
                }
            }
            else
            {
                session()->flash('msg.error','No user found related to this company');
                return redirect()->back();
            }
        }
        else
        {
            $user = $this->userRepository->findWithoutFail($user_id);

            $logged_in = Auth::guard('company')->loginUsingId($user->id);

            if (!$logged_in)
            {
                session()->flash('msg.error','Error Occured while logged in as company admin');
                return redirect()->back();
            }
            else
            {
              return redirect(route('company.dashboard'));   
            }
        }
    }



    public function profile($id)
    {
        $company = $this->companyRepository->findWithoutFail($id);

        // dd($company->companyInvoices);
        return view('admin.companies.profile',compact('company'));
    }

    /**
     * Show the form for creating a new Company.
     *
     * @return Response
     */
    public function create()
    {

        $countries = $this->countryRepository->all();
        $states = $this->stateRepository->all();
        $cities = $this->cityRepository->all();
        $userstatus = $this->userStatusRepository->all();
        $discountTypes = $this->discountTypeRepository->all();
        $modules = $this->moduleRepository->all();
        $paymentCycles = $this->paymentCycleRepository->all();
        $paymentMethods = $this->paymentMethodRepository->all();

        $data = [
                'countries' => $countries,
                'states' => $states,
                'cities' => $cities,
                'userStatus' => $userstatus,
                'discountTypes' => $discountTypes,
                'modules' => $modules,
                'paymentCycles' => $paymentCycles,
                'paymentMethods' => $paymentMethods,
            ];


        return view('admin.companies.create', $data);
    }

    /**
     * Store a newly created Company in storage.
     *
     * @param CreateCompanyRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('logo')) 
        {
            $path = $request->file('logo')->store('public/company_logos');
            $path = explode("/", $path);

            $input['logo'] = $path[2];

        }
        $input['user_role_code'] = 'company';
        $input['max_users'] = 1;

        // echo "<pre>";
        // print_r($input);
        // echo "</pre>";
        // exit;

        $company = $this->companyRepository->create($input);
        
        if($company)
        {
            $company_id = $company->id;
            $this->defaultCompanySupportStatus($company_id);
            $this->defaultCompanySupportPriorities($company_id);
            $this->defaultCompanySupportCategory($company_id);
        }
        return response()->json(['success'=> 1, 'msg'=>'Company has been created successfully', 'company'=>$company]);
    }

    public function defaultCompanySupportStatus($company_id)
    {
        $defaultValues = ['Bug','Pending','Solved','Progress'];
        foreach ($defaultValues as  $value) 
        {
            CompanySupportStatus::updateOrCreate(['name' => $value,'company_id' => $company_id]);       
        }
    }

    public function defaultCompanySupportPriorities($company_id)
    {
        $defaultValues = ['Low','Critical','Normal'];
        foreach ($defaultValues as  $value) 
        {
            CompanySupportPriorities::updateOrCreate(['name' => $value,'company_id' => $company_id]);       
        }
    }


    public function defaultCompanySupportCategory($company_id)
    {
        $defaultValues = ['Technical','Customer Service','Billing'];
        foreach ($defaultValues as  $value) 
        {
            CompanySupportCategory::updateOrCreate(['name' => $value,'company_id' => $company_id]);       
        }
    }

    /**
     * Display the specified Company.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $company = $this->companyRepository->findWithoutFail($id);

        if (empty($company)) {

            session()->flash('msg.error', 'Company not found');


            return redirect(route('admin.companies.index'));
        }

        return view('admin.companies.show')->with('company', $company);
    }

    /**
     * Show the form for editing the specified Company.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id,$wizard = '')
    {
        $company = $this->companyRepository->findWithoutFail($id);

        $buildings = [];

        foreach ($company->companyBuildings as $b) {
            $buildings[] = $b->id;
        }

        $companyBuildingFloors = $this->companyFloorRoomRepository->getBuildingFloors($buildings);

        $countries = $this->countryRepository->all();
        $states = $this->stateRepository->all();
        $cities = $this->cityRepository->all();
        $userstatus = $this->userStatusRepository->all();
        $discountTypes = $this->discountTypeRepository->all();
        $modules = $this->moduleRepository->all();
        $paymentCycles = $this->paymentCycleRepository->all();
        $paymentMethods = $this->paymentMethodRepository->all();

        if($wizard == '')
        {
            $data = [
                'countries' => $countries,
                'states' => $states,
                'cities' => $cities,
                'userStatus' => $userstatus,
                'discountTypes' => $discountTypes,
                'modules' => $modules,
                'paymentCycles' => $paymentCycles,
                'paymentMethods' => $paymentMethods,                
                'company' => $company,
                'companyBuildingFloors' => $companyBuildingFloors
            ];
        }
        else
        {
            $data = [
                'countries' => $countries,
                'states' => $states,
                'cities' => $cities,
                'userStatus' => $userstatus,
                'discountTypes' => $discountTypes,
                'modules' => $modules,
                'paymentCycles' => $paymentCycles,
                'paymentMethods' => $paymentMethods,                
                'company' => $company,
                'companyBuildingFloors' => $companyBuildingFloors,
                'wizard'  => $wizard
            ];
        }



        if (empty($company)) {

            session()->flash('msg.error', 'Company not found');

            return redirect(route('admin.companies.index'));
        }

        // dd($company);

        return view('admin.companies.edit', $data);
    }

    /**
     * Update the specified Company in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyRequest $request)
    {

        $input = $request->all();

        $company = $this->companyRepository->findWithoutFail($id);

        if (empty($company)) {

            session()->flash('msg.error', 'Company not found');

            $success = 0;
            $msg = "Company not found";
        } else {

            if ($request->hasFile('logo') && !empty($request->hasFile('logo'))) {

                if (isset($input['logo_hidden']) && $company->logo == $input['logo_hidden']) {
                   $oldLogo = true;

                } else {
                     $path = $request->file('logo')->store('public/company_logos');
                     $path = explode("/", $path);
                     $input['logo'] = $path[2];

                     $oldLogo = false;
                }
            }
            
            $company = $this->companyRepository->update($input, $id);

            $success = 1;
            $msg = "Company has been updated successfully";
        }


        return response()->json(['success'=>$success, 'msg'=>$msg]);
        
    }

    /**
     * Remove the specified Company from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $company = $this->companyRepository->findWithoutFail($id);

        if (empty($company)) {

            session()->flash('msg.error', 'Company not found');

            return redirect(route('admin.companies.index'));
        }

        $this->companyRepository->delete($id);

        session()->flash('msg.success', 'Company deleted successfully.');


        return redirect(route('admin.companies.index'));
    }


    // method for invoice generation testing by moiz
    public function invoiceView() {

        // dd('test');

        $title = "TESTING";

        $data = ['title' => $title ];

        $pdf = PDF::loadView('admin.companies.invoice', $data);
        return $pdf->download('invoice.pdf');

        // return view('admin.companies.invoice', $data);
        
    }


}
