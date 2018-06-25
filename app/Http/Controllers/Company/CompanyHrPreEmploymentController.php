<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreateCompanyHrPreEmploymentRequest;
use App\Http\Requests\Company\UpdateCompanyHrPreEmploymentRequest;
use App\Repositories\Company\CompanyHrPreEmploymentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CompanyHrPreEmploymentController extends AppBaseController
{
    /** @var  CompanyHrPreEmploymentRepository */
    private $companyHrPreEmploymentRepository;

    public function __construct(CompanyHrPreEmploymentRepository $companyHrPreEmploymentRepo)
    {
        $this->companyHrPreEmploymentRepository = $companyHrPreEmploymentRepo;
    }

    /**
     * Display a listing of the CompanyHrPreEmployment.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyHrPreEmploymentRepository->pushCriteria(new RequestCriteria($request));
        $companyHrPreEmployments = $this->companyHrPreEmploymentRepository->all();

        return view('company.company_hr_pre_employments.index')
            ->with('companyHrPreEmployments', $companyHrPreEmployments);
    }

    /**
     * Show the form for creating a new CompanyHrPreEmployment.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.company_hr_pre_employments.create');
    }

    /**
     * Store a newly created CompanyHrPreEmployment in storage.
     *
     * @param CreateCompanyHrPreEmploymentRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyHrPreEmploymentRequest $request)
    {
        $input = $request->all();

        $companyHrPreEmployment = $this->companyHrPreEmploymentRepository->create($input);

        Flash::success('Company Hr Pre Employment saved successfully.');

        return redirect(route('company.companyHrPreEmployments.index'));
    }

    /**
     * Display the specified CompanyHrPreEmployment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companyHrPreEmployment = $this->companyHrPreEmploymentRepository->findWithoutFail($id);

        if (empty($companyHrPreEmployment)) {
            Flash::error('Company Hr Pre Employment not found');

            return redirect(route('company.companyHrPreEmployments.index'));
        }

        return view('company.company_hr_pre_employments.show')->with('companyHrPreEmployment', $companyHrPreEmployment);
    }

    /**
     * Show the form for editing the specified CompanyHrPreEmployment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companyHrPreEmployment = $this->companyHrPreEmploymentRepository->findWithoutFail($id);

        if (empty($companyHrPreEmployment)) {
            Flash::error('Company Hr Pre Employment not found');

            return redirect(route('company.companyHrPreEmployments.index'));
        }

        return view('company.company_hr_pre_employments.edit')->with('companyHrPreEmployment', $companyHrPreEmployment);
    }

    /**
     * Update the specified CompanyHrPreEmployment in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyHrPreEmploymentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyHrPreEmploymentRequest $request)
    {
        $companyHrPreEmployment = $this->companyHrPreEmploymentRepository->findWithoutFail($id);

        if (empty($companyHrPreEmployment)) {
            Flash::error('Company Hr Pre Employment not found');

            return redirect(route('company.companyHrPreEmployments.index'));
        }

        $companyHrPreEmployment = $this->companyHrPreEmploymentRepository->update($request->all(), $id);

        Flash::success('Company Hr Pre Employment updated successfully.');

        return redirect(route('company.companyHrPreEmployments.index'));
    }

    /**
     * Remove the specified CompanyHrPreEmployment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companyHrPreEmployment = $this->companyHrPreEmploymentRepository->findWithoutFail($id);

        if (empty($companyHrPreEmployment)) {
            Flash::error('Company Hr Pre Employment not found');

            return redirect(route('company.companyHrPreEmployments.index'));
        }

        $this->companyHrPreEmploymentRepository->delete($id);

        Flash::success('Company Hr Pre Employment deleted successfully.');

        return redirect(route('company.companyHrPreEmployments.index'));
    }
}
