<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreateRoomRequest;
use App\Http\Requests\Company\UpdateRoomRequest;
use App\Repositories\Company\RoomRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use App\Models\Company;
use App\Models\CompanyBuilding;
use App\Models\CompanyFloorRoom;
use App\Models\Service;
use App\Models\Room;

class RoomController extends AppBaseController
{
    /** @var  RoomRepository */
    private $serviceRepository;

    public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    /**
     * Display a listing of the Room.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $company_id = Auth::user()->companyUser()->first()->company_id;
        $company = Company::find($company_id);
        $rooms = Room::where('company_id', $company_id)->get();
        $services = Service::where('company_id', $company_id)->pluck('name', 'id');
        $floors = CompanyFloorRoom::where('company_id', $company_id)->pluck('floor', 'id');

        return view('company.rooms.index', ['rooms' => $rooms, 'company' => $company, 'services' => $services,
            'floors' => $floors]);
    }

    /**
     * Show the form for creating a new Room.
     *
     * @return Response
     */
    public function create()
    {
        $company_id = Auth::user()->companyUser()->first()->company_id;
        $company = Company::find($company_id);
        $companyFloors = CompanyFloorRoom::where('company_id', $company_id)->get();
        $companyBuildings = CompanyBuilding::pluck('name', 'id');
        $services = Service::where('company_id', $company_id)->get();
        //dd($companyFloors);

        return view('company.rooms.create', ['company' => $company, 'companyFloors' => $companyFloors,
            'companyBuildings' => $companyBuildings, 'services' => $services]);
    }

    /**
     * Store a newly created Room in storage.
     *
     * @param CreateRoomRequest $request
     *
     * @return Response
     */
    public function store(CreateRoomRequest $request)
    {
        $company_id = Auth::user()->companyUser()->first()->company_id;
        $input = $request->all();
        $input['company_id'] = $company_id;
        $input['image1'] = '';
        $input['image2'] = '';
        $input['image3'] = '';
        $input['image4'] = '';
        $input['image5'] = '';

        if($request->image1)
        {
            $image_link = $request->image1->store('rooms');
            $input['image1'] = $image_link;
        }
        if($request->image2)
        {
            $image_link = $request->image2->store('rooms');
            $input['image2'] = $image_link;
        }
        if($request->image3)
        {
            $image_link = $request->image3->store('rooms');
            $input['image3'] = $image_link;
        }
        if($request->image4)
        {
            $image_link = $request->image4->store('rooms');
            $input['image4'] = $image_link;
        }
        if($request->image5)
        {
            $image_link = $request->image5->store('rooms');
            $input['image5'] = $image_link;
        }

        $this->roomRepository->create($input);

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
        $service = $this->serviceRepository->findWithoutFail($id);

        if (empty($service)) {
            Flash::error('Company Service not found');

            return redirect(route('company.services.index'));
        }

        return view('company.services.show', ['service' => $service, 'company' => $company]);
    }

    /**
     * Show the form for editing the specified Room.
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
     * Update the specified Room in storage.
     *
     * @param  int              $id
     * @param UpdateRoomRequest $request
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

        $company_id = Auth::user()->companyUser()->first()->company_id;
        $input = $request->all();

        if($request->freeService)
        {
            $input['price'] = 0;
        }
        $input['company_id'] = $company_id;

        $this->serviceRepository->update($input, $id);
        $request->session()->flash('msg.success', 'Company Floor Room updated successfully.');

        return redirect(route('company.services.index'));
    }

    /**
     * Remove the specified Room from storage.
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

        $request->session()->flash('msg.success', 'Company Service deleted successfully.');

        return redirect(route('company.services.index'));
    }
}
