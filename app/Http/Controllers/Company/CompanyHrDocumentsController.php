<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreateCompanyHrDocumentsRequest;
use App\Http\Requests\Company\UpdateCompanyHrDocumentsRequest;
use App\Repositories\Company\CompanyHrDocumentsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CompanyHrDocumentsController extends AppBaseController
{
    /** @var  CompanyHrDocumentsRepository */
    private $companyHrDocumentsRepository;

    public function __construct(CompanyHrDocumentsRepository $companyHrDocumentsRepo)
    {
        $this->companyHrDocumentsRepository = $companyHrDocumentsRepo;
    }

    /**
     * Display a listing of the CompanyHrDocuments.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyHrDocumentsRepository->pushCriteria(new RequestCriteria($request));
        $companyHrDocuments = $this->companyHrDocumentsRepository->all();

        return view('company.company_hr_documents.index')
            ->with('companyHrDocuments', $companyHrDocuments);
    }

    /**
     * Show the form for creating a new CompanyHrDocuments.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.company_hr_documents.create');
    }

    /**
     * Store a newly created CompanyHrDocuments in storage.
     *
     * @param CreateCompanyHrDocumentsRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyHrDocumentsRequest $request)
    {
        $input = $request->all();

        $companyHrDocuments = $this->companyHrDocumentsRepository->create($input);

        Flash::success('Company Hr Documents saved successfully.');

        return redirect(route('company.companyHrDocuments.index'));
    }

    /**
     * Display the specified CompanyHrDocuments.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companyHrDocuments = $this->companyHrDocumentsRepository->findWithoutFail($id);

        if (empty($companyHrDocuments)) {
            Flash::error('Company Hr Documents not found');

            return redirect(route('company.companyHrDocuments.index'));
        }

        return view('company.company_hr_documents.show')->with('companyHrDocuments', $companyHrDocuments);
    }

    /**
     * Show the form for editing the specified CompanyHrDocuments.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companyHrDocuments = $this->companyHrDocumentsRepository->findWithoutFail($id);

        if (empty($companyHrDocuments)) {
            Flash::error('Company Hr Documents not found');

            return redirect(route('company.companyHrDocuments.index'));
        }

        return view('company.company_hr_documents.edit')->with('companyHrDocuments', $companyHrDocuments);
    }

    /**
     * Update the specified CompanyHrDocuments in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyHrDocumentsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyHrDocumentsRequest $request)
    {
        $companyHrDocuments = $this->companyHrDocumentsRepository->findWithoutFail($id);

        if (empty($companyHrDocuments)) {
            Flash::error('Company Hr Documents not found');

            return redirect(route('company.companyHrDocuments.index'));
        }

        $companyHrDocuments = $this->companyHrDocumentsRepository->update($request->all(), $id);

        Flash::success('Company Hr Documents updated successfully.');

        return redirect(route('company.companyHrDocuments.index'));
    }

    /**
     * Remove the specified CompanyHrDocuments from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companyHrDocuments = $this->companyHrDocumentsRepository->findWithoutFail($id);

        if (empty($companyHrDocuments)) {
            Flash::error('Company Hr Documents not found');

            return redirect(route('company.companyHrDocuments.index'));
        }

        $this->companyHrDocumentsRepository->delete($id);

        Flash::success('Company Hr Documents deleted successfully.');

        return redirect(route('company.companyHrDocuments.index'));
    }
}
