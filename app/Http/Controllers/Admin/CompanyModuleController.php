<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateCompanyModuleRequest;
use App\Http\Requests\Admin\UpdateCompanyModuleRequest;
use App\Repositories\CompanyModuleRepository;
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
    public function update(UpdateCompanyModuleRequest $request)
    {

        $data = $request->all();

        /*echo "<pre>";
        print_r($data);
        echo "</pre>";

        exit;*/
        
        $input = [];
        $arr = [];

        $i = 0;
        $index = 0;

        foreach ($data['module'] as $module) {

            $input['id'] = $module['pk'];
            $input['module_id'] = $module['id'];
            $input['price'] = $module['price'];
            $input['users_limit'] = $module['users_limit'];
            $input['company_id'] = $data['company_id'];

            if (strpos($module['pk'], 'new-') === false) {
                $id = $module['pk'];
            } else {
                $index = preg_replace('/[^0-9]/', '', $module['pk']);
                $id = "";
            }
            
            $where = ['id' => $id];

            $companyModule = $this->companyModuleRepository->updateOrCreate($where, $input);

            if (strpos($module['pk'], 'new-') !== false) {

                $arr[$index] = $companyModule->id;
            }

        }
        

        return response()->json([
                                'success'=>1, 
                                'msg'=>'Company modules have been updated successfully',
                                'createdFields'=>$arr,
                                ]);
    }

    /**
     * Remove the specified CompanyModule from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy(Request $request)
    {

        $id = $request->only('module_id');

        $id = $id['module_id'];

        // echo $id;
        // exit;
        
        $companyModule = $this->companyModuleRepository->findWithoutFail($id);

        if (empty($companyModule)) {

            $success = 0;
            $msg = "Company module not found";
        }

        $this->companyModuleRepository->delete($id);

        $success = 1;
        $msg = "Company module deleted successfully";

        return response()->json([
                                'success'=>$success, 
                                'msg'=>$msg,
                                ]);
    }
}
