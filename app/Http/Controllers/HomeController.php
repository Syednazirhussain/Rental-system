<?php

namespace App\Http\Controllers;

use App\Models\CompanyContract;
use Illuminate\Http\Request;
use App\Http\Requests\CreateRoomContractRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Repositories\RoomContractRepository;
use App\Repositories\Company\RoomRepository;
use Auth;
use App\Models\Company;
use App\Models\CompanyBuilding;
use App\Models\CompanyFloorRoom;
use App\Models\Service;
use App\Models\Room;
use App\Models\RoomContracts;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $roomContractRepository;
    private $roomRepository;

    public function __construct(RoomContractRepository $roomContractRepository, RoomRepository $roomRepository)
    {
        $this->roomContractRepository = $roomContractRepository;
        $this->roomRepository = $roomRepository;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_id = Auth::user()->companyUser()->first()->company_id;
        $company = Company::find($company_id)->get();
        $services = Service::pluck('name', 'id');
        $rooms = Room::join('company_floor_rooms', 'rooms.floor_id', '=', 'company_floor_rooms.id')
            ->join('company_buildings', 'building_id', '=', 'company_buildings.id')
            ->select('rooms.*', 'company_floor_rooms.*', 'rooms.name as room_name', 'rooms.id as room_id', 'company_buildings.*')
            ->where('rooms.company_id', $company_id)->get();

        return view('customers.home.index', ['rooms' => $rooms, 'company' => $company, 'services' => $services]);
    }

    public function show($id){
        $company_id = Auth::user()->companyUser()->first()->company_id;
        $company = Company::find($company_id);
        $room = $this->roomRepository->findWithoutFail($id);
        $building = CompanyBuilding::find(CompanyFloorRoom::find($room->floor_id)->building_id);
        $floor = CompanyFloorRoom::find($room->floor_id)->floor;
        $service = Service::find($room->service_id)->name;
        $room_contracts = RoomContracts::where('room_id', $id)->get();

        if (empty($room)) {
            Flash::error('Room not found');

            return redirect(route('home'));
        }

        return view('customers.home.show', ['room' => $room, 'company' => $company, 'building' => $building, 'floor' => $floor,
            'service' => $service, 'room_contracts' => $room_contracts]);
    }

    public function book($id){
        $company_id = Auth::user()->companyUser()->first()->company_id;
        $company = Company::find($company_id);
        $room = $this->roomRepository->findWithoutFail($id);
        $building = CompanyBuilding::find(CompanyFloorRoom::find($room->floor_id)->building_id);
        $floor = CompanyFloorRoom::find($room->floor_id)->floor;
        $service = Service::find($room->service_id)->name;

        if (empty($room)) {
            Flash::error('Room not found');

            return redirect(route('home'));
        }

        return view('customers.home.show', ['room' => $room, 'company' => $company, 'building' => $building, 'floor' => $floor,
            'service' => $service]);
    }

    public function store(CreateRoomContractRequest $request) {
        $input = $request->all();
        $customer_id = Auth::user()->id;
        $company_id = Auth::user()->companyUser()->first()->company_id;
        $company_contract_id = CompanyContract::where('company_id', $company_id)->first()->id;

        $input['company_id'] = $company_id;
        $input['customer_id'] = $customer_id;
        $input['company_contract_id'] = $company_contract_id;
        $input['price'] = 450;
        $input['contract_number'] = 11202;
        $input['content'] = '';

        $this->roomContractRepository->create($input);

        $request->session()->flash('msg.success', 'Booked successfully.');

        return redirect(route('home'));
    }
}
