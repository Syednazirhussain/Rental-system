<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateCompanyContactPersonRequest;
use App\Http\Requests\Admin\UpdateCompanyContactPersonRequest;
use App\Repositories\Admin\CompanyContactPersonRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CompanyContactPersonController extends AppBaseController
{
    /** @var  CompanyContactPersonRepository */
    private $companyContactPersonRepository;

    public function __construct(CompanyContactPersonRepository $companyContactPersonRepo)
    {
        $this->companyContactPersonRepository = $companyContactPersonRepo;
    }

    /**
     * Display a listing of the CompanyContactPerson.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyContactPersonRepository->pushCriteria(new RequestCriteria($request));
        $companyContactPeople = $this->companyContactPersonRepository->all();

        return view('admin.company_contact_people.index')
            ->with('companyContactPeople', $companyContactPeople);
    }

    /**
     * Show the form for creating a new CompanyContactPerson.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.company_contact_people.create');
    }

    /**
     * Store a newly created CompanyContactPerson in storage.
     *
     * @param CreateCompanyContactPersonRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyContactPersonRequest $request)
    {
        $input = $request->all();

        $companyContactPerson = $this->companyContactPersonRepository->create($input);

        Flash::success('Company Contact Person saved successfully.');

        return redirect(route('admin.companyContactPeople.index'));
    }

    /**
     * Display the specified CompanyContactPerson.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companyContactPerson = $this->companyContactPersonRepository->findWithoutFail($id);

        if (empty($companyContactPerson)) {
            Flash::error('Company Contact Person not found');

            return redirect(route('admin.companyContactPeople.index'));
        }

        return view('admin.company_contact_people.show')->with('companyContactPerson', $companyContactPerson);
    }

    /**
     * Show the form for editing the specified CompanyContactPerson.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companyContactPerson = $this->companyContactPersonRepository->findWithoutFail($id);

        if (empty($companyContactPerson)) {
            Flash::error('Company Contact Person not found');

            return redirect(route('admin.companyContactPeople.index'));
        }

        return view('admin.company_contact_people.edit')->with('companyContactPerson', $companyContactPerson);
    }

    /**
     * Update the specified CompanyContactPerson in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyContactPersonRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyContactPersonRequest $request)
    {
        $companyContactPerson = $this->companyContactPersonRepository->findWithoutFail($id);

        if (empty($companyContactPerson)) {
            Flash::error('Company Contact Person not found');

            return redirect(route('admin.companyContactPeople.index'));
        }

        $companyContactPerson = $this->companyContactPersonRepository->update($request->all(), $id);

        Flash::success('Company Contact Person updated successfully.');

        return redirect(route('admin.companyContactPeople.index'));
    }

    /**
     * Remove the specified CompanyContactPerson from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companyContactPerson = $this->companyContactPersonRepository->findWithoutFail($id);

        if (empty($companyContactPerson)) {
            Flash::error('Company Contact Person not found');

            return redirect(route('admin.companyContactPeople.index'));
        }

        $this->companyContactPersonRepository->delete($id);

        Flash::success('Company Contact Person deleted successfully.');

        return redirect(route('admin.companyContactPeople.index'));
    }
}
