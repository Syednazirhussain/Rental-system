<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateCompanyUserRequest;
use App\Http\Requests\Admin\UpdateCompanyUserRequest;
use App\Repositories\Admin\CompanyUserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CompanyUserController extends AppBaseController
{
    /** @var  CompanyUserRepository */
    private $companyUserRepository;

    public function __construct(CompanyUserRepository $companyUserRepo)
    {
        $this->companyUserRepository = $companyUserRepo;
    }

    /**
     * Display a listing of the CompanyUser.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyUserRepository->pushCriteria(new RequestCriteria($request));
        $companyUsers = $this->companyUserRepository->all();

        return view('admin.company_users.index')
            ->with('companyUsers', $companyUsers);
    }

    /**
     * Show the form for creating a new CompanyUser.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.company_users.create');
    }

    /**
     * Store a newly created CompanyUser in storage.
     *
     * @param CreateCompanyUserRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyUserRequest $request)
    {
        $input = $request->all();

        $companyUser = $this->companyUserRepository->create($input);

        Flash::success('Company User saved successfully.');

        return redirect(route('admin.companyUsers.index'));
    }

    /**
     * Display the specified CompanyUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companyUser = $this->companyUserRepository->findWithoutFail($id);

        if (empty($companyUser)) {
            Flash::error('Company User not found');

            return redirect(route('admin.companyUsers.index'));
        }

        return view('admin.company_users.show')->with('companyUser', $companyUser);
    }

    /**
     * Show the form for editing the specified CompanyUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companyUser = $this->companyUserRepository->findWithoutFail($id);

        if (empty($companyUser)) {
            Flash::error('Company User not found');

            return redirect(route('admin.companyUsers.index'));
        }

        return view('admin.company_users.edit')->with('companyUser', $companyUser);
    }

    /**
     * Update the specified CompanyUser in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyUserRequest $request)
    {
        $companyUser = $this->companyUserRepository->findWithoutFail($id);

        if (empty($companyUser)) {
            Flash::error('Company User not found');

            return redirect(route('admin.companyUsers.index'));
        }

        $companyUser = $this->companyUserRepository->update($request->all(), $id);

        Flash::success('Company User updated successfully.');

        return redirect(route('admin.companyUsers.index'));
    }

    /**
     * Remove the specified CompanyUser from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companyUser = $this->companyUserRepository->findWithoutFail($id);

        if (empty($companyUser)) {
            Flash::error('Company User not found');

            return redirect(route('admin.companyUsers.index'));
        }

        $this->companyUserRepository->delete($id);

        Flash::success('Company User deleted successfully.');

        return redirect(route('admin.companyUsers.index'));
    }
}
