<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreatecompanyHrRequest;
use App\Http\Requests\Company\UpdatecompanyHrRequest;
use App\Repositories\Company\companyHrRepository;
use App\Repositories\Company\hrPersonalCatRepository;
use App\Repositories\Company\hrCompanyCollectiveRepository;
use App\Repositories\Company\hrEmploymentFormRepository;
use App\Repositories\Company\hrCompanyDesignationRepository;
use App\Repositories\Company\hrSalaryTypeRepository;
use App\Repositories\Company\hrCompanyProjectRepository;
use App\Repositories\Company\hrVacationCategoryRepository;
use App\Repositories\CountryRepository;
use App\Repositories\StateRepository;
use App\Repositories\CityRepository;
use App\Repositories\Company\hrCivilStatusRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\Company\HRCourses;

class companyHrController extends AppBaseController
{
    /** @var  companyHrRepository */
    private $companyHrRepository;
    private $countryRepository;
    private $stateRepository;
    private $cityRepository;
    private $hrCivilStatusRepository;
    private $hrPersonalCatRepository;
    private $hrCompanyCollectiveRepository;
    private $hrEmploymentFormRepository;
    private $hrCompanyDesignationRepository;
    private $hrSalaryTypeRepository;
    private $hrCompanyProjectRepository;
    private $hrVacationCategoryRepository;

    public function __construct(companyHrRepository $companyHrRepo, 
                                CountryRepository $countryRepo, 
                                StateRepository $stateRepo,
                                CityRepository $cityRepo,
                                hrCivilStatusRepository $hrCivilRepo,
                                hrPersonalCatRepository $hrPersonalRepo,
                                hrCompanyCollectiveRepository $hrCollectiveRepo,
                                hrEmploymentFormRepository $hrEmployRepo,
                                hrCompanyDesignationRepository $hrDesigRepo,
                                hrSalaryTypeRepository $hrSalaryTypeRepo,
                                hrCompanyProjectRepository $hrProjectRepo,
                                hrVacationCategoryRepository $hrVacationCatRepo
                                )
    {
        $this->companyHrRepository = $companyHrRepo;
        $this->stateRepository = $stateRepo;
        $this->countryRepository = $countryRepo;
        $this->cityRepository = $cityRepo;
        $this->hrCivilStatusRepository = $hrCivilRepo;
        $this->hrPersonalCatRepository = $hrPersonalRepo;
        $this->hrCompanyCollectiveRepository = $hrCollectiveRepo;
        $this->hrEmploymentFormRepository = $hrEmployRepo;
        $this->hrCompanyDesignationRepository = $hrDesigRepo;
        $this->hrSalaryTypeRepository = $hrSalaryTypeRepo;
        $this->hrCompanyProjectRepository = $hrProjectRepo;
        $this->hrVacationCategoryRepository = $hrVacationCatRepo;
    }

    /**
     * Display a listing of the companyHr.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyHrRepository->pushCriteria(new RequestCriteria($request));
        $companyHrs = $this->companyHrRepository->all();

        return view('company.company_hrs.index')
            ->with('companyHrs', $companyHrs);
    }

    /**
     * Show the form for creating a new companyHr.
     *
     * @return Response
     */
    public function create()
    {
        $countries                  =   $this->countryRepository->all();
        $states                     =   $this->stateRepository->all();
        $cities                     =   $this->cityRepository->all();
        $hrCivil                    =   $this->hrCivilStatusRepository->all();
        $hrPersonal                 =   $this->hrPersonalCatRepository->all();
        $hrCollectivetype           =   $this->hrCompanyCollectiveRepository->all();
        $hrEmployForm               =   $this->hrEmploymentFormRepository->all();
        $hrDesig                    =   $this->hrCompanyDesignationRepository->all();
        $hrSalaryType               =   $this->hrSalaryTypeRepository->all();
        $hrCompanyPro               =   $this->hrCompanyProjectRepository->all();
        $hrVacCategory              =   $this->hrVacationCategoryRepository->all();
        $HRCourses = HRCourses::all();

        $data   =   [
            'countries'                 => $countries,
            'states'                    => $states,
            'cities'                    => $cities,
            'hrCivil'                   => $hrCivil,
            'hrPersonal'                => $hrPersonal,
            'hrCollectivetype'          => $hrCollectivetype,
            'hrEmployForm'              => $hrEmployForm,
            'hrDesig'                   => $hrDesig,
            'hrSalaryType'              => $hrSalaryType,
            'hrCompanyPro'              => $hrCompanyPro,
            'hrVacCategory'             => $hrVacCategory,
            'HRCourses'                 => $HRCourses
        ];

        return view('company.company_hrs.create', $data);
    }


    public function hrOtherInformation(Request $request){

        print_r($request->all());
        exit;
    }

    /**
     * Store a newly created companyHr in storage.
     *
     * @param CreatecompanyHrRequest $request
     *
     * @return Response
     */
    public function store(CreatecompanyHrRequest $request)
    {

        print_r($request->all());
        exit;

        $input = $request->all();

            $date = str_replace('-', '/', $input['employment_date']);

            $emplDate = date('Y-m-d', strtotime($date));

            $input['employment_date'] = $emplDate;

            $date = str_replace('-', '/', $input['employeed_untill']);

            $emplUntill = date('Y-m-d', strtotime($date));

            $input['employeed_untill'] = $emplUntill;

            $date = str_replace('-', '/', $input['insurance_date']);

            $insDate = date('Y-m-d', strtotime($date));

            $input['insurance_date'] = $insDate;



            if ($input['father'] == 'on') {
                    $input['father'] = 1;
                } else {
                    $input['father'] = 0;
                }

            if ($input['mother'] == 'on') {
                    $input['mother'] = 1;
                }
                else {
                    $input['mother'] = 0;
                }
                     
         // dd($input);
        // print_r($input);
        // exit();
        $companyHr = $this->companyHrRepository->create($input);

        // return response()->json($companyHr);
        
        Flash::success('Hr Company Designation saved successfully.');

        return redirect(route('company.companyHrs.index'));
    }

    /**
     * Display the specified companyHr.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companyHr = $this->companyHrRepository->findWithoutFail($id);

        if (empty($companyHr)) {
            Flash::error('Company Hr not found');

            return redirect(route('company.companyHrs.index'));
        }

        return view('company.company_hrs.show')->with('companyHr', $companyHr);
    }

    /**
     * Show the form for editing the specified companyHr.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companyHr = $this->companyHrRepository->findWithoutFail($id);

        $countries                  =   $this->countryRepository->all();
        $states                     =   $this->stateRepository->all();
        $cities                     =   $this->cityRepository->all();
        $hrCivil                    =   $this->hrCivilStatusRepository->all();
        $hrPersonal                 =   $this->hrPersonalCatRepository->all();
        $hrCollectivetype           =   $this->hrCompanyCollectiveRepository->all();
        $hrEmployForm               =   $this->hrEmploymentFormRepository->all();
        $hrDesig                    =   $this->hrCompanyDesignationRepository->all();
        $hrSalaryType               =   $this->hrSalaryTypeRepository->all();
        $hrCompanyPro               =   $this->hrCompanyProjectRepository->all();
        $hrVacCategory              =   $this->hrVacationCategoryRepository->all();

         $data = [
            'countries'                 => $countries,
            'states'                    => $states,
            'cities'                    => $cities,
            'hrCivil'                   => $hrCivil,
            'companyHr'                 => $companyHr,
            'hrPersonal'                => $hrPersonal,
            'hrCollectivetype'          => $hrCollectivetype,
            'hrEmployForm'              => $hrEmployForm,
            'hrDesig'                   => $hrDesig,
            'hrSalaryType'              => $hrSalaryType,
            'hrCompanyPro'              => $hrCompanyPro,
            'hrVacCategory'             => $hrVacCategory,
        ];

        // dd($companyHr);

        if (empty($companyHr)) {
            Flash::error('Company Hr not found');

            return redirect(route('company.companyHrs.index'));
        }

        return view('company.company_hrs.edit', $data);
    }

    /**
     * Update the specified companyHr in storage.
     *
     * @param  int              $id
     * @param UpdatecompanyHrRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecompanyHrRequest $request)
    {
        $input = $request->all();

        $date = str_replace('-', '/', $input['employment_date']);

            $emplDate = date('Y-m-d', strtotime($date));

            $input['employment_date'] = $emplDate;

            $date = str_replace('-', '/', $input['employeed_untill']);

            $emplUntill = date('Y-m-d', strtotime($date));

            $input['employeed_untill'] = $emplUntill;

            $date = str_replace('-', '/', $input['insurance_date']);

            $insDate = date('Y-m-d', strtotime($date));

            $input['insurance_date'] = $insDate;



        // dd($input);
        // dd($input['employment_date']);
        $companyHr = $this->companyHrRepository->findWithoutFail($id);


        if (empty($companyHr)) {
            Flash::error('Company Hr not found');

            return redirect(route('company.companyHrs.index'));
        }

/*        $companyHr->first_name = $input[''];
        $companyHr->last_name = $input[''];
        $companyHr->address_1 = $input[''];
        $companyHr->address_2 = $input[''];
        $companyHr->post_code = $input[''];
        $companyHr->city_id = $input[''];
        $companyHr->state_id = $input[''];
        $companyHr->country_id = $input[''];
        $companyHr->telephone_job = $input[''];
        $companyHr->telephone_private = $input[''];
        $companyHr->email_job = $input[''];
        $companyHr->email_private = $input[''];
        $companyHr->civil_status_id = $input[''];
        $companyHr-> = $input[''];*/

        $companyHrUpdate = $this->companyHrRepository->update($input, $id);

        if($companyHrUpdate)
        {
            Flash::success('Company Hr updated successfully.');
            return redirect(route('company.companyHrs.index'));            
        }



    }

    /**
     * Remove the specified companyHr from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companyHr = $this->companyHrRepository->findWithoutFail($id);
        if (empty($companyHr)) {
            Flash::error('Company Hr not found');

            return redirect(route('company.companyHrs.index'));
        }

        $this->companyHrRepository->delete($id);

        Flash::success('Company Hr deleted successfully.');

        return redirect(route('company.companyHrs.index'));
    }
}
