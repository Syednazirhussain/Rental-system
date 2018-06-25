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
use Session;

class ServiceController extends AppBaseController
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
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $company = Company::find($company_id);
        $services = Service::where('company_id', $company_id)->get();

        return view('company.services.index', ['services' => $services, 'company' => $company]);
    }

    /**
     * Show the form for creating a new Service.
     *
     * @return Response
     */
    public function create()
    {
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $company = Company::find($company_id);
        return view('company.services.create', ['company' => $company]);
    }

    /**
     * Store a newly created Service in storage.
     *
     * @param CreateServiceRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceRequest $request)
    {
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $input = $request->all();

        if($request->freeService)
        {
            $input['price'] = 0;
        }
        $input['company_id'] = $company_id;

        $this->serviceRepository->create($input);

        /*Flash::success('Company Floor Room saved successfully.');*/
        Session::flash("successMessage", "Service saved successfully");

        return redirect(route('company.services.index'));
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
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
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
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
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
    public function update($id, UpdateServiceRequest $request)
    {
        $service = $this->serviceRepository->findWithoutFail($id);

        if (empty($service)) {
            Flash::error('Company Service not found');

            return redirect(route('company.services.index'));
        }

        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $input = $request->all();

        if($request->freeService)
        {
            $input['price'] = 0;
        }
        $input['company_id'] = $company_id;

        $this->serviceRepository->update($input, $id);
        /*$request->session()->flash('successMessage', 'Service updated successfully.');*/
        Session::flash("successMessage", "Service updated successfully");

        return redirect(route('company.services.index'));
    }

    /**
     * Remove the specified Service from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $service = $this->serviceRepository->findWithoutFail($id);

        if (empty($service)) {
            Flash::error('Company Floor Room not found');

            return redirect(route('company.services.index'));
        }

        $this->serviceRepository->delete($id);

       /* $request->session()->flash('msg.success', 'Company Service deleted successfully.');*/
        Session::flash("deleteMessage", "Company Service deleted successfully");

        return redirect(route('company.services.index'));
    }
}
