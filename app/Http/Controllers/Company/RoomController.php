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
use App\Models\RoomContracts;

class RoomController extends AppBaseController
{
    /** @var  RoomRepository */
    private $roomRepository;

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
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
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
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $company = Company::find($company_id);
        $companyFloors = CompanyFloorRoom::where('company_id', $company_id)->get();
        $companyBuildings = CompanyBuilding::pluck('name', 'id');
        $services = Service::where('company_id', $company_id)->get();

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
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $input = $request->all();
        $input['company_id'] = $company_id;
        $input['image1'] = '';
        $input['image2'] = '';
        $input['image3'] = '';
        $input['image4'] = '';
        $input['image5'] = '';

        if($request->image1)
        {
            $image_link = $request->image1->hashName();
            $request->image1->move(public_path('/uploadedimages'), $image_link);
            $input['image1'] = $image_link;
        }
        if($request->image2)
        {
            $image_link = $request->image2->hashName();
            $request->image2->move(public_path('/uploadedimages'), $image_link);
            $input['image2'] = $image_link;
        }
        if($request->image3)
        {
            $image_link = $request->image3->hashName();
            $request->image3->move(public_path('/uploadedimages'), $image_link);
            $input['image3'] = $image_link;
        }
        if($request->image4)
        {
            $image_link = $request->image4->hashName();
            $request->image4->move(public_path('/uploadedimages'), $image_link);
            $input['image4'] = $image_link;
        }
        if($request->image5)
        {
            $image_link = $request->image5->hashName();
            $request->image5->move(public_path('/uploadedimages'), $image_link);
            $input['image5'] = $image_link;
        }

        $floor = CompanyFloorRoom::find($input['floor_id']);
        $room_count = Room::where('company_id', $company_id)->where('floor_id',$input['floor_id'])->count();
        //Check if room count over than specified floor room number
        if($floor->num_rooms <= $room_count) {
            $request->session()->flash('msg.error', 'You can not create any more room on '.$floor->floor.'floor.');
            return redirect(route('company.rooms.index'));
        }

        $this->roomRepository->create($input);

        Flash::success('Company Floor Room saved successfully.');

        return redirect(route('company.rooms.index'));
    }

    /**
     * Display the specified Room.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $company = Company::find($company_id);
        $room = $this->roomRepository->findWithoutFail($id);
        $building = CompanyBuilding::find(CompanyFloorRoom::find($room->floor_id)->building_id);
        $floor = CompanyFloorRoom::find($room->floor_id)->floor;
        $service = Service::find($room->service_id)->name;
        $roomContracts = RoomContracts::where('room_id', $id)->get();

        if (empty($room)) {
            Flash::error('Company Room not found');

            return redirect(route('company.rooms.index'));
        }

        return view('company.rooms.show', ['room' => $room, 'company' => $company, 'building' => $building, 'floor' => $floor,
            'service' => $service, 'roomContracts' => $roomContracts]);
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
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $company = Company::find($company_id);
        $companyFloors = CompanyFloorRoom::where('company_id', $company_id)->get();
        $companyBuildings = CompanyBuilding::pluck('name', 'id');
        $services = Service::where('company_id', $company_id)->get();

        $room = $this->roomRepository->findWithoutFail($id);

        if (empty($room)) {
            Flash::error('Company Room not found');

            return redirect(route('company.rooms.index'));
        }

        $floor_name = CompanyBuilding::find(CompanyFloorRoom::find($room->floor_id)->building_id)->name.' - Floor'.CompanyFloorRoom::find($room->floor_id)->floor;
        $service_name = Service::find($room->service_id)->name;
        return view('company.rooms.edit', ['room' => $room, 'company' => $company, 'companyFloors' => $companyFloors,
            'companyBuildings' => $companyBuildings, 'services' => $services, 'service_name' => $service_name, 'floor_name' => $floor_name]);
    }

    /**
     * Update the specified Room in storage.
     *
     * @param  int              $id
     * @param UpdateRoomRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoomRequest $request)
    {
        $room = $this->roomRepository->findWithoutFail($id);
        $input = $request->all();
        $data = request()->except(['_token', '_method']);

        if (empty($room)) {
            Flash::error('Company Room not found');

            return redirect(route('company.rooms.index'));
        }
        if($request->image1)
        {
            $image_link = $request->image1->hashName();
            $request->image1->move(public_path('/uploadedimages'), $image_link);
            $input['image1'] = $image_link;
        }else
            $input['image1'] = $room['image1'];

        if($request->image2)
        {
            $image_link = $request->image2->hashName();
            $request->image2->move(public_path('/uploadedimages'), $image_link);
            $input['image2'] = $image_link;
        }else
            $input['image2'] = $room['image2'];

        if($request->image3)
        {
            $image_link = $request->image3->hashName();
            $request->image3->move(public_path('/uploadedimages'), $image_link);
            $input['image3'] = $image_link;
        }else
            $input['image3'] = $room['image3'];

        if($request->image4)
        {
            $image_link = $request->image4->hashName();
            $request->image4->move(public_path('/uploadedimages'), $image_link);
            $input['image4'] = $image_link;
        }else
            $input['image4'] = $room['image4'];

        if($request->image5)
        {
            $image_link = $request->image5->hashName();
            $request->image5->move(public_path('/uploadedimages'), $image_link);
            $input['image5'] = $image_link;
        }else
            $input['image5'] = $room['image5'];

        $this->roomRepository->update($input, $id);
        $request->session()->flash('msg.success', 'Company Room updated successfully.');

        return redirect(route('company.rooms.index'));
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
        $room = $this->roomRepository->findWithoutFail($id);

        if (empty($room)) {
            Flash::error('Company Room not found');

            return redirect(route('company.rooms.index'));
        }

        $this->roomRepository->delete($id);

        $request->session()->flash('msg.success', 'Company Room deleted successfully.');

        return redirect(route('company.rooms.index'));
    }
}
