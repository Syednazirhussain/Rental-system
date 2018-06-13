<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreatehrCompanyEmploymentRequest;
use App\Http\Requests\Company\UpdatehrCompanyEmploymentRequest;
use App\Repositories\Company\hrCompanyEmploymentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class hrCompanyEmploymentController extends AppBaseController
{
    /** @var  hrCompanyEmploymentRepository */
    private $hrCompanyEmploymentRepository;

    public function __construct(hrCompanyEmploymentRepository $hrCompanyEmploymentRepo)
    {
        $this->hrCompanyEmploymentRepository = $hrCompanyEmploymentRepo;
    }

    /**
     * Display a listing of the hrCompanyEmployment.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->hrCompanyEmploymentRepository->pushCriteria(new RequestCriteria($request));
        $hrCompanyEmployments = $this->hrCompanyEmploymentRepository->all();

        return view('company.hr_company_employments.index')
            ->with('hrCompanyEmployments', $hrCompanyEmployments);
    }

    /**
     * Show the form for creating a new hrCompanyEmployment.
     *
     * @return Response
     */
    public function create()
    {
        
        $countries = $this->countryRepository->all();
        $states = $this->stateRepository->all();
        $cities = $this->cityRepository->all();
        $hrCivil = $this->hrCivilStatusRepository->all();
        return view('company.hr_company_employments.create');
    }

    /**
     * Store a newly created hrCompanyEmployment in storage.
     *
     * @param CreatehrCompanyEmploymentRequest $request
     *
     * @return Response
     */
    public function store(CreatehrCompanyEmploymentRequest $request)
    {
        $input = $request->all();

        $hrCompanyEmployment = $this->hrCompanyEmploymentRepository->create($input);
        return response()->json($hrCompanyEmployment);
        /*Flash::success('Hr Company Employment saved successfully.');

        return redirect(route('company.hrCompanyEmployments.index'));*/
    }

    /**
     * Display the specified hrCompanyEmployment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $hrCompanyEmployment = $this->hrCompanyEmploymentRepository->findWithoutFail($id);

        if (empty($hrCompanyEmployment)) {
            Flash::error('Hr Company Employment not found');

            return redirect(route('company.hrCompanyEmployments.index'));
        }

        return view('company.hr_company_employments.show')->with('hrCompanyEmployment', $hrCompanyEmployment);
    }

    /**
     * Show the form for editing the specified hrCompanyEmployment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hrCompanyEmployment = $this->hrCompanyEmploymentRepository->findWithoutFail($id);

        if (empty($hrCompanyEmployment)) {
            Flash::error('Hr Company Employment not found');

            return redirect(route('company.hrCompanyEmployments.index'));
        }

        return view('company.hr_company_employments.edit')->with('hrCompanyEmployment', $hrCompanyEmployment);
    }

    /**
     * Update the specified hrCompanyEmployment in storage.
     *
     * @param  int              $id
     * @param UpdatehrCompanyEmploymentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatehrCompanyEmploymentRequest $request)
    {
        $hrCompanyEmployment = $this->hrCompanyEmploymentRepository->findWithoutFail($id);

        if (empty($hrCompanyEmployment)) {
            Flash::error('Hr Company Employment not found');

            return redirect(route('company.hrCompanyEmployments.index'));
        }

        $hrCompanyEmployment = $this->hrCompanyEmploymentRepository->update($request->all(), $id);

        Flash::success('Hr Company Employment updated successfully.');

        return redirect(route('company.hrCompanyEmployments.index'));
    }

    /**
     * Remove the specified hrCompanyEmployment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $hrCompanyEmployment = $this->hrCompanyEmploymentRepository->findWithoutFail($id);

        if (empty($hrCompanyEmployment)) {
            Flash::error('Hr Company Employment not found');

            return redirect(route('company.hrCompanyEmployments.index'));
        }

        $this->hrCompanyEmploymentRepository->delete($id);

        Flash::success('Hr Company Employment deleted successfully.');

        return redirect(route('company.hrCompanyEmployments.index'));
    }
}
