<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Company\RoomRepository;
use Auth;
use App\Models\Company;
use App\Models\CompanyBuilding;
use App\Models\CompanyFloorRoom;
use App\Models\Service;
use App\Models\Room;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $roomRepository;

    public function __construct(RoomRepository $roomRepository)
    {
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

        if (empty($room)) {
            Flash::error('Room not found');

            return redirect(route('home'));
        }

        return view('customers.home.show', ['room' => $room, 'company' => $company, 'building' => $building, 'floor' => $floor,
            'service' => $service]);
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

    public function store() {

    }
}
