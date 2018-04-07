<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateCompanyRequest;
use App\Http\Requests\Admin\UpdateCompanyRequest;
use App\Repositories\Admin\CompanyRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CompanyController extends AppBaseController
{
    /** @var  CompanyRepository */
    private $companyRepository;

    public function __construct(CompanyRepository $companyRepo)
    {
        $this->companyRepository = $companyRepo;
    }

    /**
     * Display a listing of the Company.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyRepository->pushCriteria(new RequestCriteria($request));
        $companies = $this->companyRepository->all();

        return view('admin.companies.index')
            ->with('companies', $companies);
    }

    /**
     * Show the form for creating a new Company.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created Company in storage.
     *
     * @param CreateCompanyRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyRequest $request)
    {

        $input = $request->all();

        $file = $request->file('logo');

        $newFileName = uniqid()."_".$file->getClientOriginalName();

        $input['user_role_code'] = 'company';
        $input['logo'] = $newFileName;
        $input['max_users'] = 1;

        /*echo "<pre>";
        print_r($input);
        echo "</pre>";

        exit;*/


        $company = $this->companyRepository->create($input);

        return response()->json(['success'=> 1, 'msg'=>'Company has been created successfully']);

    }

    /**
     * Display the specified Company.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $company = $this->companyRepository->findWithoutFail($id);

        if (empty($company)) {

            session()->flash('msg.error', 'Company not found');


            return redirect(route('admin.companies.index'));
        }

        return view('admin.companies.show')->with('company', $company);
    }

    /**
     * Show the form for editing the specified Company.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $company = $this->companyRepository->findWithoutFail($id);

        if (empty($company)) {

            session()->flash('msg.error', 'Company not found');

            return redirect(route('admin.companies.index'));
        }

        return view('admin.companies.edit')->with('company', $company);
    }

    /**
     * Update the specified Company in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyRequest $request)
    {
        $company = $this->companyRepository->findWithoutFail($id);

        if (empty($company)) {

            session()->flash('msg.error', 'Company not found');

            return redirect(route('admin.companies.index'));
        }

        $company = $this->companyRepository->update($request->all(), $id);

        Flash::success('Company updated successfully.');

        return redirect(route('admin.companies.index'));
    }

    /**
     * Remove the specified Company from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $company = $this->companyRepository->findWithoutFail($id);

        if (empty($company)) {

            session()->flash('msg.error', 'Company not found');

            return redirect(route('admin.companies.index'));
        }

        $this->companyRepository->delete($id);

        session()->flash('msg.success', 'Company deleted successfully.');


        return redirect(route('admin.companies.index'));
    }
}
