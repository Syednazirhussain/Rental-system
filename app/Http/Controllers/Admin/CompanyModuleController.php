<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateCompanyModuleRequest;
use App\Http\Requests\Admin\UpdateCompanyModuleRequest;
use App\Repositories\Admin\CompanyModuleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CompanyModuleController extends AppBaseController
{
    /** @var  CompanyModuleRepository */
    private $companyModuleRepository;

    public function __construct(CompanyModuleRepository $companyModuleRepo)
    {
        $this->companyModuleRepository = $companyModuleRepo;
    }

    /**
     * Display a listing of the CompanyModule.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyModuleRepository->pushCriteria(new RequestCriteria($request));
        $companyModules = $this->companyModuleRepository->all();

        return view('admin.company_modules.index')
            ->with('companyModules', $companyModules);
    }

    /**
     * Show the form for creating a new CompanyModule.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.company_modules.create');
    }

    /**
     * Store a newly created CompanyModule in storage.
     *
     * @param CreateCompanyModuleRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyModuleRequest $request)
    {
        $data = $request->all();

        $input = [];

        $i = 0;
        foreach($data['module'] as $module) {
            $input[$i]['company_id'] = $data['company_id'];
            $input[$i]['module_id'] = $module['id'];
            $input[$i]['price'] = $module['price'];
            $input[$i]['users_limit'] = $module['users_limit'];

            $i++;
        }

        $companyModule = $this->companyModuleRepository->insert($input);

        return response()->json(['success'=>1, 'msg'=>'Company module have been added successfully']);
        
    }

    /**
     * Display the specified CompanyModule.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companyModule = $this->companyModuleRepository->findWithoutFail($id);

        if (empty($companyModule)) {
            Flash::error('Company Module not found');

            return redirect(route('admin.companyModules.index'));
        }

        return view('admin.company_modules.show')->with('companyModule', $companyModule);
    }

    /**
     * Show the form for editing the specified CompanyModule.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companyModule = $this->companyModuleRepository->findWithoutFail($id);

        if (empty($companyModule)) {
            Flash::error('Company Module not found');

            return redirect(route('admin.companyModules.index'));
        }

        return view('admin.company_modules.edit')->with('companyModule', $companyModule);
    }

    /**
     * Update the specified CompanyModule in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyModuleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyModuleRequest $request)
    {
        $companyModule = $this->companyModuleRepository->findWithoutFail($id);

        if (empty($companyModule)) {
            Flash::error('Company Module not found');

            return redirect(route('admin.companyModules.index'));
        }

        $companyModule = $this->companyModuleRepository->update($request->all(), $id);

        Flash::success('Company Module updated successfully.');

        return redirect(route('admin.companyModules.index'));
    }

    /**
     * Remove the specified CompanyModule from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companyModule = $this->companyModuleRepository->findWithoutFail($id);

        if (empty($companyModule)) {
            Flash::error('Company Module not found');

            return redirect(route('admin.companyModules.index'));
        }

        $this->companyModuleRepository->delete($id);

        Flash::success('Company Module deleted successfully.');

        return redirect(route('admin.companyModules.index'));
    }
}
