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

use Auth;
use App\Models\Company\HRCourses;
use App\Models\Company\companyHr;
use App\Models\Company\CompanyHrOtherInfo;
use App\Models\Company\CompanyHrPreEmployment;
use App\Models\Company\CompanyHrNotes;


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

        /*print_r($request->all());
        exit;*/

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

            $pre_org_courses = explode(',', $input['courses'][0]);

            $pre_courses = [];
            $index = 0;
            $value = '';
            foreach ($pre_org_courses as  $course) 
            {
                if ($course != '|') 
                {
                    $value .= $course.",";
                }
                else
                {
                    $pre_courses[$index] = substr($value, 0, -1);
                    $index++;
                    $value = '';
                    continue;
                }
            }

            $input['pre_employment_courses'] = $pre_courses;

            $input['pre_employment_org_names'] = explode(',', $input['organization_name'][0]);
            $input['pre_employment_job_titles'] = explode(',', $input['job_title'][0]);
            $input['pre_employment_from_dates'] = explode(',', $input['employed_from'][0]);
            $input['pre_employment_until_dates'] = explode(',', $input['employed_until'][0]);



            $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
            $user_id = Auth::guard('company')->user()->id;

            if (isset($input['father']) && $input['father'] == '1') { $input['father'] = 1; }else{ $input['father'] = 0; }
            if (isset($input['mother']) && $input['mother'] == '1') { $input['mother'] = 1; }else{ $input['mother'] = 0; }
           


            // dd($input);

            $companyHr = new companyHr;
            $companyHr->company_id    = $company_id;
            $companyHr->first_name    = $input['first_name'];
            $companyHr->last_name    = $input['last_name'];
            $companyHr->address_1    = $input['address_1'];
            $companyHr->address_2    = $input['address_2'];
            $companyHr->post_code    = $input['post_code'];
            $companyHr->city_id    = $input['city_id'];
            $companyHr->state_id    = $input['state_id'];
            $companyHr->country_id    = $input['country_id'];
            $companyHr->telephone_job    = $input['telephone_job'];
            $companyHr->telephone_private    = $input['telephone_private'];
            $companyHr->email_job    = $input['email_job'];
            $companyHr->email_private    = $input['email_private'];
            $companyHr->civil_status_id    = $input['civil_status_id'];
            $companyHr->employment_date    = $input['employment_date'];
            $companyHr->termination_time    = $input['termination_time'];
            $companyHr->employeed_untill    = $input['employeed_untill'];
            $companyHr->personal_category    = $input['personal_category'];
            $companyHr->collective_type    = $input['collective_type'];
            $companyHr->employment_form    = $input['employment_form'];
            $companyHr->insurance_date    = $input['insurance_date'];
            $companyHr->insurance_fees    = $input['insurance_fees'];
            $companyHr->department    = $input['department'];
            $companyHr->designation    = $input['designation'];
            $companyHr->vacancies    = $input['vacancies'];
            $companyHr->salary_type    = $input['salary_type'];
            $companyHr->salary    = $input['salary'];
            $companyHr->employment_percent    = $input['employment_percent'];
            $companyHr->cost_division    = $input['cost_division'];
            $companyHr->courses    = $input['hrCourseId'];
            $companyHr->project    = $input['project'];
            $companyHr->vat_table    = $input['vat_table'];
            $companyHr->vacation_days    = $input['vacation_days'];
            $companyHr->father    = $input['father'];
            $companyHr->mother    = $input['mother'];
            $companyHr->vacation_category    = $input['vacation_category'];
            $companyHr->save();




            if($companyHr)
            {
                $companyHr_id  =  $companyHr->id;


                $companyHrOtherInfo = new CompanyHrOtherInfo;
                $companyHrOtherInfo->company_hr_id = $companyHr_id;
                $companyHrOtherInfo->languages = $input['languages'];
                $companyHrOtherInfo->driving_license = $input['driving_license'];
                $companyHrOtherInfo->skills = $input['skills'];
                $companyHrOtherInfo->save();


                for ($i=0; $i < count($input['pre_employment_courses']); $i++) 
                { 
                    $companyHrPreEmployment = new CompanyHrPreEmployment;
                    $companyHrPreEmployment->company_hr_id = $companyHr_id;
                    $companyHrPreEmployment->organization_name = $input['pre_employment_org_names'][$i];
                    $companyHrPreEmployment->job_title = $input['pre_employment_job_titles'][$i];
                    $companyHrPreEmployment->courses = $input['pre_employment_courses'][$i];
                    $companyHrPreEmployment->employed_from = $input['pre_employment_from_dates'][$i];
                    $companyHrPreEmployment->employed_until = $input['pre_employment_until_dates'][$i];
                    $companyHrPreEmployment->save();
                }

                if (isset($input['hr_notes'])) 
                {
                    $companyHrNotes = new CompanyHrNotes;
                    $companyHrNotes->company_hr_id = $companyHr_id;
                    $companyHrNotes->user_id = $user_id;
                    $companyHrNotes->code = 'hr_notes'; 
                    $companyHrNotes->note = $input['hr_notes'];
                    $companyHrNotes->save();                
                }

                if (isset($input['manager_notes'])) 
                {
                    $companyHrNotes = new CompanyHrNotes;
                    $companyHrNotes->company_hr_id = $companyHr_id;
                    $companyHrNotes->user_id = $user_id;
                    $companyHrNotes->code = 'manager_notes'; 
                    $companyHrNotes->note = $input['manager_notes'];
                    $companyHrNotes->save();                
                }

                if (isset($input['salary_development_notes'])) 
                {
                    $companyHrNotes = new CompanyHrNotes;
                    $companyHrNotes->company_hr_id = $companyHr_id;
                    $companyHrNotes->user_id = $user_id;
                    $companyHrNotes->code =  'salary_development_notes';
                    $companyHrNotes->note = $input['salary_development_notes'];
                    $companyHrNotes->save();                    
                }

                session()->flash('msg.success','Hr Company Designation saved successfully.');

            }
            else
            {
                session()->flash('msg.success','Hr Company Designation are not saved');
            }

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
        $HRCourses = HRCourses::all();
        $companyHrOtherInfo = CompanyHrOtherInfo::where('company_hr_id',$companyHr->id)->first();
        $companyHrPreEmployment = CompanyHrPreEmployment::where('company_hr_id',$companyHr->id)->get();
        $companyHrNotes = CompanyHrNotes::where('company_hr_id',$companyHr->id)->get();



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
            'HRCourses'                 => $HRCourses,
            'companyHrOtherInfo'        => $companyHrOtherInfo,
            'companyHrPreEmployment'    => $companyHrPreEmployment,
            'companyHrNotes'            => $companyHrNotes
        ];


        if (empty($companyHr)) 
        {
            session()->flash('msg.error','Company Hr not found');
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
    public function update($id,UpdatecompanyHrRequest  $request)
    {
        $input = $request->all();

        print_r($input);

        exit();

        $companyHr = $this->companyHrRepository->findWithoutFail($id);


        if (empty($companyHr)) 
        {
            session()->flash('msg.error','Company Hr not found');
            return redirect()->route('company.companyHrs.index');
        }       

        $date = str_replace('-', '/', $input['employment_date']);

        $emplDate = date('Y-m-d', strtotime($date));

        $input['employment_date'] = $emplDate;

        $date = str_replace('-', '/', $input['employeed_untill']);

        $emplUntill = date('Y-m-d', strtotime($date));

        $input['employeed_untill'] = $emplUntill;

        $date = str_replace('-', '/', $input['insurance_date']);

        $insDate = date('Y-m-d', strtotime($date));

        $input['insurance_date'] = $insDate;

        $pre_org_courses = explode(',', $input['courses'][0]);

        $pre_courses = [];
        $index = 0;
        $value = '';
        foreach ($pre_org_courses as  $course) 
        {
            if ($course != '|') 
            {
                $value .= $course.",";
            }
            else
            {
                $pre_courses[$index] = substr($value, 0, -1);
                $index++;
                $value = '';
                continue;
            }
        }

        $input['pre_employment_courses'] = $pre_courses;

        $input['pre_employment_org_names'] = explode(',', $input['organization_name'][0]);
        $input['pre_employment_job_titles'] = explode(',', $input['job_title'][0]);
        $input['pre_employment_from_dates'] = explode(',', $input['employed_from'][0]);
        $input['pre_employment_until_dates'] = explode(',', $input['employed_until'][0]);



        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $user_id = Auth::guard('company')->user()->id;

        if (isset($input['father']) && $input['father'] == 1) { $input['father'] = 1; }else{ $input['father'] = 0; }
        if (isset($input['mother']) && $input['mother'] == 1) { $input['mother'] = 1; }else{ $input['mother'] = 0; }

        try 
        {
            $companyHr->company_id    = $company_id;
            $companyHr->first_name    = $input['first_name'];
            $companyHr->last_name    = $input['last_name'];
            $companyHr->address_1    = $input['address_1'];
            $companyHr->address_2    = $input['address_2'];
            $companyHr->post_code    = $input['post_code'];
            $companyHr->city_id    = $input['city_id'];
            $companyHr->state_id    = $input['state_id'];
            $companyHr->country_id    = $input['country_id'];
            $companyHr->telephone_job    = $input['telephone_job'];
            $companyHr->telephone_private    = $input['telephone_private'];
            $companyHr->email_job    = $input['email_job'];
            $companyHr->email_private    = $input['email_private'];
            $companyHr->civil_status_id    = $input['civil_status_id'];
            $companyHr->employment_date    = $input['employment_date'];
            $companyHr->termination_time    = $input['termination_time'];
            $companyHr->employeed_untill    = $input['employeed_untill'];
            $companyHr->personal_category    = $input['personal_category'];
            $companyHr->collective_type    = $input['collective_type'];
            $companyHr->employment_form    = $input['employment_form'];
            $companyHr->insurance_date    = $input['insurance_date'];
            $companyHr->insurance_fees    = $input['insurance_fees'];
            $companyHr->department    = $input['department'];
            $companyHr->designation    = $input['designation'];
            $companyHr->vacancies    = $input['vacancies'];
            $companyHr->salary_type    = $input['salary_type'];
            $companyHr->salary    = $input['salary'];
            $companyHr->employment_percent    = $input['employment_percent'];
            $companyHr->cost_division    = $input['cost_division'];
            $companyHr->courses    = $input['hrCourseId'];
            $companyHr->project    = $input['project'];
            $companyHr->vat_table    = $input['vat_table'];
            $companyHr->vacation_days    = $input['vacation_days'];
            $companyHr->father    = $input['father'];
            $companyHr->mother    = $input['mother'];
            $companyHr->vacation_category    = $input['vacation_category'];
            $companyHr->save();

            $companyHr_id  =  $companyHr->id;

            $companyHrOtherInfo = CompanyHrOtherInfo::where('company_hr_id',$companyHr_id)->first();
            $companyHrOtherInfo->company_hr_id = $companyHr_id;
            $companyHrOtherInfo->languages = $input['languages'];
            $companyHrOtherInfo->driving_license = $input['driving_license'];
            $companyHrOtherInfo->skills = $input['skills'];
            $companyHrOtherInfo->save();


            $companyHrPreEmployment = CompanyHrPreEmployment::where('company_hr_id',$companyHr_id)->get();
            for ($i=0; $i < count($companyHrPreEmployment); $i++) 
            {
                $hr_pre_emp = CompanyHrPreEmployment::find($companyHrPreEmployment[$i]->id); 
                $hr_pre_emp->company_hr_id = $companyHr_id;
                $hr_pre_emp->organization_name = $input['pre_employment_org_names'][$i];
                $hr_pre_emp->job_title = $input['pre_employment_job_titles'][$i];
                $hr_pre_emp->courses = $input['pre_employment_courses'][$i];
                $hr_pre_emp->employed_from = $input['pre_employment_from_dates'][$i];
                $hr_pre_emp->employed_until = $input['pre_employment_until_dates'][$i];
                $hr_pre_emp->save();            
            }

            $companyHrNotes = CompanyHrNotes::where('company_hr_id',$companyHr_id)->get();
            foreach ($companyHrNotes as $companyHrNote) 
            {
                if($companyHrNote->code == 'hr_notes')
                {
                    if (isset($input['hr_notes']) && !is_null($input['hr_notes']) ) 
                    {
                        $hr_notes = CompanyHrNotes::find($companyHrNote->id);
                        $hr_notes->company_hr_id = $companyHr_id;
                        $hr_notes->user_id = $user_id;
                        $hr_notes->code = 'hr_notes'; 
                        $hr_notes->note = $input['hr_notes'];
                        $hr_notes->save();
                    }
                    else
                    {
                        $hr_notes = CompanyHrNotes::find($companyHrNote->id);
                        $hr_notes->delete();
                    }
                }
                elseif ($companyHrNote->code == 'manager_notes') 
                {
                    if (isset($input['manager_notes']) && !is_null($input['manager_notes']) ) 
                    {
                        $manager_notes = CompanyHrNotes::find($companyHrNote->id);
                        $manager_notes->company_hr_id = $companyHr_id;
                        $manager_notes->user_id = $user_id;
                        $manager_notes->code = 'manager_notes'; 
                        $manager_notes->note = $input['manager_notes'];
                        $manager_notes->save();
                    }
                    else
                    {
                        $manager_notes = CompanyHrNotes::find($companyHrNote->id);
                        $manager_notes->delete();
                    }

                }
                elseif ($companyHrNote->code == 'salary_development_notes') 
                {
                    if(isset($input['salary_development_notes']) && !is_null($input['salary_development_notes']))
                    {
                        $salary_development_notes = CompanyHrNotes::find($companyHrNote->id);
                        $salary_development_notes->company_hr_id = $companyHr_id;
                        $salary_development_notes->user_id = $user_id;
                        $salary_development_notes->code = 'salary_development_notes'; 
                        $salary_development_notes->note = $input['salary_development_notes'];
                        $salary_development_notes->save();
                    }
                    else
                    {
                        $salary_development_notes = CompanyHrNotes::find($companyHrNote->id);
                        $salary_development_notes->delete();
                    }

                }
            }

            session()->flash('msg.success','Company Hr updated successfully.');
            return redirect()->route('company.companyHrs.index'); 
        }
        catch (\Exception $e) 
        {
            session()->flash('msg.success','Company Hr cannot updated Error : '.$e->getMessage());
            return redirect()->route('company.companyHrs.index');
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
