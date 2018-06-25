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
use App\Models\Company\CompanyHrDocuments;
use App\Models\User;

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


    public function getHrNotes(Request $request)
    {
        $input = $request->all();

        if( isset($input['companyHrId']) && isset($input['code']))
        {
            $companyHrNotes =  CompanyHrNotes::where('company_hr_id',$input['companyHrId'])->where('code',$input['code'])->orderBy('id', 'DESC')->get();
            $users = User::all();

            if (!empty($companyHrNotes)) 
            {
                $data = [
                    'users' => $users,
                    'companyHrNotes' => $companyHrNotes
                ];

                return response()->json($data);
            }
            else
            {
                return response()->json(['status' => 0 ,'msg' => 'Not enough HR Notes']);
            }
        }
        else
        {
            return response()->json(['status' => 0 ,'msg' => 'There is some problem while getting HR Notes']);
        }
    }


    public function editHrNotes($hrNoteId)
    {
        if ($hrNoteId) 
        {
            $companyHrNote = CompanyHrNotes::find($hrNoteId);
            if (!empty($companyHrNote)) 
            {
                return response()->json($companyHrNote);
            }
            else
            {
                return response()->json(['status' => 0,'msg' => 'Hr Note does not exist']);
            }
        }
    }

    public function updateHrNotes($id,Request $request)
    {
        $input = $request->all();

        if (isset($input['note'])) 
        {
            $companyHrNote = CompanyHrNotes::find($id);
            $companyHrNote->note = $input['note'];
            $companyHrNote->save();
            if($companyHrNote)
            {
                return response()->json($companyHrNote);
            }
            else
            {
                return response()->json(['status' => 0,'msg' => 'Hr Note are not update']);
            }
        }
        else
        {
            return response()->json(['status' => 0,'msg' => 'There is some problem while updating HR Note']);
        }
    }

    public function createHrNote(Request $request)
    {
        $input = $request->all();

        $user_id = Auth::guard('company')->user()->id;

        if( isset($input['note']) && isset($input['code']) && isset($input['companyHrId']) )
        {
            $companyHrNote = new CompanyHrNotes;
            $companyHrNote->company_hr_id = $input['companyHrId'];
            $companyHrNote->user_id = $user_id;
            $companyHrNote->code = $input['code'];
            $companyHrNote->note = $input['note'];
            $companyHrNote->save();
            if($companyHrNote)
            {
                return response()->json($companyHrNote);   
            }
            else
            {
                return response()->json(['status' => 0 ,'msg' => 'HR Note are not create']);
            }
        }
        else
        {
            return response()->json(['status' => 0,'msg' => 'There is some problem while creating HR Note']);
        }
    }

    public function deleteHrNote($id)
    {
        if ($id) 
        {
            $companyHrNote = CompanyHrNotes::find($id);
            $companyHrNote->delete();

            if($companyHrNote->deleted_at == null)
            {
                return response()->json(['status' => 0,'msg' => 'HR Note are not delete']);
            }
        }
        else
        {
            return response()->json(['status' => 0,'msg' => 'There is some problem while deleting HR Note']);   
        }
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


    /**
     * Store a newly created companyHr in storage.
     *
     * @param CreatecompanyHrRequest $request
     *
     * @return Response
     */
    public function store(CreatecompanyHrRequest $request)
    {
        $input = $request->all();

        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $user_id = Auth::guard('company')->user()->id;

        if (isset($input['father']) && $input['father'] == '1') { $input['father'] = 1; }else{ $input['father'] = 0; }
        if (isset($input['mother']) && $input['mother'] == '1') { $input['mother'] = 1; }else{ $input['mother'] = 0; }
       
        try
        {
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
            $companyHr->courses    = json_encode($input['name']);
            $companyHr->project    = $input['project'];
            $companyHr->vat_table    = $input['vat_table'];
            $companyHr->vacation_days    = $input['vacation_days'];
            $companyHr->father    = $input['father'];
            $companyHr->mother    = $input['mother'];
            $companyHr->vacation_category    = $input['vacation_category'];
            $companyHr->save();

            $driving_license = 0;

            if (isset($input['driving_license'])) 
            {
                $driving_license = 1;
            }

            if($companyHr)
            {
                $companyHr_id  =  $companyHr->id;

                $companyHrOtherInfo = new CompanyHrOtherInfo;
                $companyHrOtherInfo->company_hr_id = $companyHr_id;
                $companyHrOtherInfo->languages = $input['languages'];
                $companyHrOtherInfo->driving_license = $driving_license;
                $companyHrOtherInfo->skills = $input['skills'];
                $companyHrOtherInfo->save();


                for ($i=0; $i < count($input['organization_name']); $i++) 
                { 
                    $companyHrPreEmployment = new CompanyHrPreEmployment;
                    $companyHrPreEmployment->company_hr_id = $companyHr_id;
                    $companyHrPreEmployment->organization_name = $input['organization_name'][$i];
                    $companyHrPreEmployment->job_title = $input['job_title'][$i];
                    $companyHrPreEmployment->courses = $input['courses'][$i];
                    $companyHrPreEmployment->employed_from = $input['employed_from'][$i];
                    $companyHrPreEmployment->employed_until = $input['employed_until'][$i];
                    $companyHrPreEmployment->save();
                }

                if(isset($input['docFiles']))
                {
                    $files = $input['docFiles'];

                    if(count($files) > 0)
                    {
                        $file_names = [];
                        $index = 0;
                        foreach ($files as  $file) 
                        {
                            $path = $file->store('public/hrImages');
                            $pathArr = explode('/', $path);
                            $count = count($pathArr);
                            $path = $pathArr[$count - 1];
                            $file_names[$index] = $path;
                            $index++;
                        }

                        foreach ($file_names as  $file_name) 
                        {
                            $companyHrDocuments = new CompanyHrDocuments;
                            $companyHrDocuments->company_hr_id = $companyHr_id;
                            $companyHrDocuments->file_name = $file_name;
                            $companyHrDocuments->save();
                        }           
                    }

                    unset($input['files']);
                    unset($input['fileuploader-list-docFiles']);
                }
                session()->flash('msg.success','Hr Company Designation saved successfully.');
                return response()->json(['status' => 1,'msg' => 'Hr Company Designation saved successfully.']);

            }
            else
            {
                session()->flash('msg.error','Hr Company Designation are not saved');
                return response()->json(['status' => 0,'msg' => 'Hr Company Designation are not saved']);
            }  
        }
        catch(\Exception $e)
        {
            session()->flash('msg.error','Error : '.$e->getMessage());
            return response()->json(['status' => 0,'msg' => 'There is some problem while creating company hr..']);
        }

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

    public function imageRemove(Request $request)
    {
        $input = $request->all();

        $companyHrDocuments = CompanyHrDocuments::where('file_name',$input['image'])->delete();

        if($companyHrDocuments)
        {   
            return ['msg' => 'Image remove successfully'];
        }
        else
        {
            return ['msg' => 'Image cannot removed'];   
        }
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
        ];

        $companyHrDocuments =  CompanyHrDocuments::where('company_hr_id',$companyHr->id)->get();
        if(count($companyHrDocuments) > 0)
        {
            $data['Attachment'] = $companyHrDocuments;
            $imageFiles = [];
            $url = asset('storage/hrImages');
            $url2 = public_path()."/storage/hrImages";
            for($i = 0 ; $i < count($companyHrDocuments) ; $i++)
            {
                $imageFiles[$i]['name'] = $companyHrDocuments[$i]->file_name;
                $imageFiles[$i]['file'] = $url.'/'.$companyHrDocuments[$i]->file_name;
                $imageFiles[$i]['size'] = filesize($url2.'/'.$companyHrDocuments[$i]->file_name);
                $imageFiles[$i]['type'] = mime_content_type($url2.'/'.$companyHrDocuments[$i]->file_name);
            }
            $data['imageFiles'] = $imageFiles;
        }

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


        $companyHr = $this->companyHrRepository->findWithoutFail($id);


        if (empty($companyHr)) 
        {
            session()->flash('msg.error','Company Hr not found');
            return redirect()->route('company.companyHrs.index');
        }       


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
            $companyHr->courses    = json_encode($input['name']);
            $companyHr->project    = $input['project'];
            $companyHr->vat_table    = $input['vat_table'];
            $companyHr->vacation_days    = $input['vacation_days'];
            $companyHr->father    = $input['father'];
            $companyHr->mother    = $input['mother'];
            $companyHr->vacation_category    = $input['vacation_category'];
            $companyHr->save();

            $driving_license = 0;

            if (isset($input['driving_license'])) 
            {
                $driving_license = 1;
            }



            $companyHr_id  =  $companyHr->id;

            $companyHrOtherInfo = CompanyHrOtherInfo::where('company_hr_id',$companyHr_id)->first();
            $companyHrOtherInfo->company_hr_id = $companyHr_id;
            $companyHrOtherInfo->languages = $input['languages'];
            $companyHrOtherInfo->driving_license = $driving_license;
            $companyHrOtherInfo->skills = $input['skills'];
            $companyHrOtherInfo->save();


            $companyHrPreEmployment = CompanyHrPreEmployment::where('company_hr_id',$companyHr_id)->get();
            for ($i=0; $i < count($companyHrPreEmployment); $i++) 
            {
                $hr_pre_emp = CompanyHrPreEmployment::find($companyHrPreEmployment[$i]->id); 
                $hr_pre_emp->company_hr_id = $companyHr_id;
                $hr_pre_emp->organization_name = $input['organization_name'][$i];
                $hr_pre_emp->job_title = $input['job_title'][$i];
                $hr_pre_emp->courses = $input['courses'][$i];
                $hr_pre_emp->employed_from = $input['employed_from'][$i];
                $hr_pre_emp->employed_until = $input['employed_until'][$i];
                $hr_pre_emp->save();            
            }

            if(isset($input['docFiles']))
            {
                $files = $input['docFiles'];

                if(count($files) > 0)
                {
                    $file_names = [];
                    $index = 0;
                    foreach ($files as  $file) 
                    {
                        $path = $file->store('public/hrImages');
                        $pathArr = explode('/', $path);
                        $count = count($pathArr);
                        $path = $pathArr[$count - 1];
                        $file_names[$index] = $path;
                        $index++;
                    }

                    foreach ($file_names as  $file_name) 
                    {
                        $companyHrDocuments = new CompanyHrDocuments;
                        $companyHrDocuments->company_hr_id = $companyHr_id;
                        $companyHrDocuments->file_name = $file_name;
                        $companyHrDocuments->save();
                    }           
                }
            }

            session()->flash('msg.success','Company Hr updated successfully.');
            return response()->json(['status' => 1,'msg' => 'Company Hr updated successfully.']);
 
        }
        catch (\Exception $e) 
        {
            session()->flash('msg.error','Error : '.$e->getMessage());
            return response()->json(['status' => 0,'msg' => 'There is some problem while updating company hr..']);
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

        session()->flash('msg.success','Company Hr deleted successfully.');

        return redirect(route('company.companyHrs.index'));
    }
}
