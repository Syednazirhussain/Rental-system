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

class ServiceController extends AppBaseController
{
    /** @var  ServiceRepository */
    private $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * Display a listing of the CompanyFloorRoom.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $company_id = Auth::user()->companyUser()->first()->company_id;
        $company = Company::find($company_id);
        $services = Service::where('company_id', $company_id);

        return view('company.services.index', ['services' => $services, 'company' => $company]);
    }

    /**
     * Show the form for creating a new CompanyFloorRoom.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.services.create');
    }

    /**
     * Store a newly created CompanyFloorRoom in storage.
     *
     * @param CreateCompanyFloorRoomRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyFloorRoomRequest $request)
    {
        $input = $request->all();

        $companyFloorRoom = $this->serviceRepository->create($input);

        Flash::success('Company Floor Room saved successfully.');

        return redirect(route('company.services.index'));
    }

    /**
     * Display the specified CompanyFloorRoom.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $company_id = Auth::user()->companyUser()->first()->company_id;
        $company = Company::find($company_id);
        $companyBuildings = CompanyBuilding::pluck('name', 'id');
        $companyFloorRoom = $this->serviceRepository->findWithoutFail($id);

        if (empty($companyFloorRoom)) {
            Flash::error('Company Floor Room not found');

            return redirect(route('company.companyFloorRooms.index'));
        }

        return view('company.services.show', ['companyFloorRoom' => $companyFloorRoom,
            'company' => $company, 'companyBuildings' => $companyBuildings]);
    }

    /**
     * Show the form for editing the specified CompanyFloorRoom.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $company_id = Auth::user()->companyUser()->first()->company_id;
        $company = Company::find($company_id);
        $companyBuildings = CompanyBuilding::pluck('name', 'id');
        $companyFloorRoom = $this->serviceRepository->findWithoutFail($id);

        if (empty($companyFloorRoom)) {
            Flash::error('Company Floor Room not found');

            return redirect(route('company.companyFloorRooms.index'));
        }

        return view('company.services.edit', ['companyFloorRoom' => $companyFloorRoom,
            'company' => $company, 'companyBuildings' => $companyBuildings]);
    }

    /**
     * Update the specified CompanyFloorRoom in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyFloorRoomRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyFloorRoomRequest $request)
    {
        $companyFloorRoom = $this->serviceRepository->findWithoutFail($id);

        if (empty($companyFloorRoom)) {
            Flash::error('Company Floor Room not found');

            return redirect(route('company.services.index'));
        }

        $this->serviceRepository->update($request->all(), $id);
        $request->session()->flash('msg.success', 'Company Floor Room updated successfully.');

        return redirect(route('company.companyFloorRooms.index'));
    }

    /**
     * Remove the specified CompanyFloorRoom from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companyFloorRoom = $this->serviceRepository->findWithoutFail($id);

        if (empty($companyFloorRoom)) {
            Flash::error('Company Floor Room not found');

            return redirect(route('company.services.index'));
        }

        $this->serviceRepository->delete($id);

        Flash::success('Company Floor Room deleted successfully.');

        return redirect(route('company.services.index'));
    }
}
