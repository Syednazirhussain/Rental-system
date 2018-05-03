<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateCompanyRequest;
use App\Http\Requests\Admin\UpdateCompanyRequest;
use App\Repositories\Admin\CompanyRepository;
use App\Repositories\Admin\CompanyFloorRoomRepository;
use App\Repositories\CountryRepository;
use App\Repositories\StateRepository;
use App\Repositories\CityRepository;
use App\Repositories\Admin\PaymentCycleRepository;
use App\Repositories\Admin\PaymentMethodRepository;
use App\Repositories\UserStatusRepository;
use App\Repositories\DiscountTypeRepository;
use App\Repositories\Admin\ModuleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use PDF;
use URL;


use App\Models\Company;


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


    public function __construct(CompanyRepository $companyRepo, 
                                CountryRepository $countryRepo, 
                                StateRepository $stateRepo,
                                CityRepository $cityRepo,
                                UserStatusRepository $userStatusRepo,
                                DiscountTypeRepository $discountTypeRepo,
                                ModuleRepository $moduleRepo,
                                PaymentCycleRepository $paymentCycleRepo,
                                PaymentMethodRepository $paymentMethodRepo,
                                CompanyFloorRoomRepository $companyFloorRoomRepo
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

    public function profile($id)
    {
        $company = $this->companyRepository->findWithoutFail($id);
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

        if ($request->hasFile('logo')) {

            $path = $request->file('logo')->store('public/company_logos');
            $path = explode("/", $path);

            $input['logo'] = $path[2];

        }
        

        $input['user_role_code'] = 'company';
        $input['max_users'] = 1;

        /*echo "<pre>";
        print_r($input);
        echo "</pre>";

        exit;*/


        $company = $this->companyRepository->create($input);

        return response()->json(['success'=> 1, 'msg'=>'Company has been created successfully', 'company'=>$company]);

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
    public function edit($id)
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
            ];

        if (empty($company)) {

            session()->flash('msg.error', 'Company not found');

            return redirect(route('admin.companies.index'));
        }

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
