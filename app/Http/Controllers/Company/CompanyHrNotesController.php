<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreateCompanyHrNotesRequest;
use App\Http\Requests\Company\UpdateCompanyHrNotesRequest;
use App\Repositories\Company\CompanyHrNotesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CompanyHrNotesController extends AppBaseController
{
    /** @var  CompanyHrNotesRepository */
    private $companyHrNotesRepository;

    public function __construct(CompanyHrNotesRepository $companyHrNotesRepo)
    {
        $this->companyHrNotesRepository = $companyHrNotesRepo;
    }

    /**
     * Display a listing of the CompanyHrNotes.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyHrNotesRepository->pushCriteria(new RequestCriteria($request));
        $companyHrNotes = $this->companyHrNotesRepository->all();

        return view('company.company_hr_notes.index')
            ->with('companyHrNotes', $companyHrNotes);
    }

    /**
     * Show the form for creating a new CompanyHrNotes.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.company_hr_notes.create');
    }

    /**
     * Store a newly created CompanyHrNotes in storage.
     *
     * @param CreateCompanyHrNotesRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyHrNotesRequest $request)
    {
        $input = $request->all();

        $companyHrNotes = $this->companyHrNotesRepository->create($input);

        Flash::success('Company Hr Notes saved successfully.');

        return redirect(route('company.companyHrNotes.index'));
    }

    /**
     * Display the specified CompanyHrNotes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companyHrNotes = $this->companyHrNotesRepository->findWithoutFail($id);

        if (empty($companyHrNotes)) {
            Flash::error('Company Hr Notes not found');

            return redirect(route('company.companyHrNotes.index'));
        }

        return view('company.company_hr_notes.show')->with('companyHrNotes', $companyHrNotes);
    }

    /**
     * Show the form for editing the specified CompanyHrNotes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companyHrNotes = $this->companyHrNotesRepository->findWithoutFail($id);

        if (empty($companyHrNotes)) {
            Flash::error('Company Hr Notes not found');

            return redirect(route('company.companyHrNotes.index'));
        }

        return view('company.company_hr_notes.edit')->with('companyHrNotes', $companyHrNotes);
    }

    /**
     * Update the specified CompanyHrNotes in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyHrNotesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyHrNotesRequest $request)
    {
        $companyHrNotes = $this->companyHrNotesRepository->findWithoutFail($id);

        if (empty($companyHrNotes)) {
            Flash::error('Company Hr Notes not found');

            return redirect(route('company.companyHrNotes.index'));
        }

        $companyHrNotes = $this->companyHrNotesRepository->update($request->all(), $id);

        Flash::success('Company Hr Notes updated successfully.');

        return redirect(route('company.companyHrNotes.index'));
    }

    /**
     * Remove the specified CompanyHrNotes from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companyHrNotes = $this->companyHrNotesRepository->findWithoutFail($id);

        if (empty($companyHrNotes)) {
            Flash::error('Company Hr Notes not found');

            return redirect(route('company.companyHrNotes.index'));
        }

        $this->companyHrNotesRepository->delete($id);

        Flash::success('Company Hr Notes deleted successfully.');

        return redirect(route('company.companyHrNotes.index'));
    }
}
