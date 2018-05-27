<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreateServiceRequest;
use App\Http\Requests\Company\UpdateServiceRequest;
use App\Repositories\Company\ServiceRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use App\Models\Company;
use App\Models\Service;
use App\Models\CompanyService;

class CompanyServiceController extends AppBaseController
{
    /** @var  ServiceRepository */
    private $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * Display a listing of the Service.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
    }

    /**
     * Show the form for creating a new Service.
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created Service in storage.
     *
     * @param CreateServiceRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $input = [];

        $i = 0;
        foreach($data['module'] as $module) {
            $input[$i]['room_id'] = $data['room_id'];
            $input[$i]['service_id'] = $module['id'];
            $input[$i]['price'] = $module['price'];
            $i++;
        }

        $companyModule = CompanyService::insert($input);

        return response()->json(['success'=>1, 'msg'=>'Company module have been added successfully']);

    }

    /**
     * Display the specified Service.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $company_id = Auth::user()->companyUser()->first()->company_id;
        $company = Company::find($company_id);
        $service = $this->serviceRepository->findWithoutFail($id);

        if (empty($service)) {
            Flash::error('Company Service not found');

            return redirect(route('company.services.index'));
        }

        return view('company.services.show', ['service' => $service, 'company' => $company]);
    }

    /**
     * Show the form for editing the specified Service.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $company_id = Auth::user()->companyUser()->first()->company_id;
        $company = Company::find($company_id);
        $service = $this->serviceRepository->findWithoutFail($id);

        if (empty($service)) {
            Flash::error('Company Service not found');

            return redirect(route('company.services.index'));
        }
        $free_service = NULL;
        if($service->price == 0)
            $free_service = true;

        return view('company.services.edit', ['service' => $service, 'company' => $company, 'free_service' => $free_service]);
    }

    /**
     * Update the specified Service in storage.
     *
     * @param  int              $id
     * @param UpdateServiceRequest $request
     *
     * @return Response
     */
    public function update(Request $request)
    {

        $data = $request->all();

        /*echo "<pre>";
        print_r($data);
        echo "</pre>";

        exit;*/

        $input = [];
        $arr = [];

        if (isset($data['module'])) {

            $i = 0;
            $index = 0;

            foreach ($data['module'] as $module) {

                $input['id'] = $module['pk'];
                $input['service_id'] = $module['id'];
                $input['price'] = $module['price'];
                $input['room_id'] = $data['room_id'];

                if (strpos($module['pk'], 'new-') === false) {
                    $id = $module['pk'];
                } else {
                    $index = preg_replace('/[^0-9]/', '', $module['pk']);
                    $id = "";
                }

                $where = ['id' => $id];

                $companyModule = CompanyService::updateOrCreate($where, $input);

                if (strpos($module['pk'], 'new-') !== false) {

                    $arr[$index] = $companyModule->id;
                }

            }

        }


        return response()->json([
            'success'=>1,
            'msg'=>'Company services have been updated successfully',
            'createdFields'=>$arr,
        ]);
    }

    /**
     * Remove the specified Service from storage.
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

        $companyModule = CompanyService::find($id);

        if (empty($companyModule)) {

            $success = 0;
            $msg = "Company module not found";
        }

        $service = CompanyService::find($id);
        $service->delete();
        $success = 1;
        $msg = "Company service deleted successfully";

        return response()->json([
            'success'=>$success,
            'msg'=>$msg,
        ]);
    }
}
