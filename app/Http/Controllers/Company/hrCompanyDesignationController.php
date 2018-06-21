<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreatehrCompanyDesignationRequest;
use App\Http\Requests\Company\UpdatehrCompanyDesignationRequest;
use App\Repositories\Company\hrCompanyDesignationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use App\Models\Company\hrCompanyDesignation;

class hrCompanyDesignationController extends AppBaseController
{
    /** @var  hrCompanyDesignationRepository */
    private $hrCompanyDesignationRepository;

    public function __construct(hrCompanyDesignationRepository $hrCompanyDesignationRepo)
    {
        $this->hrCompanyDesignationRepository = $hrCompanyDesignationRepo;
    }

    /**
     * Display a listing of the hrCompanyDesignation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->hrCompanyDesignationRepository->pushCriteria(new RequestCriteria($request));
        $companyId         =   Auth::guard('company')->user()->companyUser()->first()->company_id;
        
        $hrCompanyDesignations    = hrCompanyDesignation::where('company_id',$companyId)->get();


        return view('company.hr_company_designations.index')
            ->with('hrCompanyDesignations', $hrCompanyDesignations);
    }

    /**
     * Show the form for creating a new hrCompanyDesignation.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.hr_company_designations.create');
    }

    /**
     * Store a newly created hrCompanyDesignation in storage.
     *
     * @param CreatehrCompanyDesignationRequest $request
     *
     * @return Response
     */
    public function store(CreatehrCompanyDesignationRequest $request)
    {
        $input = $request->all();
        $input['company_id'] =   Auth::guard('company')->user()->companyUser()->first()->company_id;

        $hrCompanyDesignation = $this->hrCompanyDesignationRepository->create($input);

        Flash::success('Hr Company Designation saved successfully.');

        return redirect(route('company.hrCompanyDesignations.index'));
    }

    /**
     * Display the specified hrCompanyDesignation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $hrCompanyDesignation = $this->hrCompanyDesignationRepository->findWithoutFail($id);

        if (empty($hrCompanyDesignation)) {
            Flash::error('Hr Company Designation not found');

            return redirect(route('company.hrCompanyDesignations.index'));
        }

        return view('company.hr_company_designations.show')->with('hrCompanyDesignation', $hrCompanyDesignation);
    }

    /**
     * Show the form for editing the specified hrCompanyDesignation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hrCompanyDesignation = $this->hrCompanyDesignationRepository->findWithoutFail($id);

        if (empty($hrCompanyDesignation)) {
            Flash::error('Hr Company Designation not found');

            return redirect(route('company.hrCompanyDesignations.index'));
        }

        return view('company.hr_company_designations.edit')->with('hrCompanyDesignation', $hrCompanyDesignation);
    }

    /**
     * Update the specified hrCompanyDesignation in storage.
     *
     * @param  int              $id
     * @param UpdatehrCompanyDesignationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatehrCompanyDesignationRequest $request)
    {
        $hrCompanyDesignation = $this->hrCompanyDesignationRepository->findWithoutFail($id);

        if (empty($hrCompanyDesignation)) {
            Flash::error('Hr Company Designation not found');

            return redirect(route('company.hrCompanyDesignations.index'));
        }

        $hrCompanyDesignation = $this->hrCompanyDesignationRepository->update($request->all(), $id);

        Flash::success('Hr Company Designation updated successfully.');

        return redirect(route('company.hrCompanyDesignations.index'));
    }

    /**
     * Remove the specified hrCompanyDesignation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $hrCompanyDesignation = $this->hrCompanyDesignationRepository->findWithoutFail($id);

        if (empty($hrCompanyDesignation)) {
            Flash::error('Hr Company Designation not found');

            return redirect(route('company.hrCompanyDesignations.index'));
        }

        $this->hrCompanyDesignationRepository->delete($id);

        Flash::success('Hr Company Designation deleted successfully.');

        return redirect(route('company.hrCompanyDesignations.index'));
    }
}
