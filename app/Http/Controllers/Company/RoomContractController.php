<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\CreateRoomContractRequest;
use App\Http\Requests\UpdateRoomContractRequest;
use App\Models\CompanyUser;
use App\Repositories\RoomContractRepository;
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
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\DiscountType;
use App\Models\Module;
use App\Models\PaymentCycle;
use App\Models\PaymentMethod;
use App\Models\UserStatus;

class RoomContractController extends AppBaseController
{
    /** @var  RoomRepository */
    private $roomContractRepository;

    public function __construct(RoomContractRepository $roomContractRepository)
    {
        $this->roomContractRepository = $roomContractRepository;
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
        $room_contracts = RoomContracts::all();

        return view('company.contracts.index', ['room_contracts' => $room_contracts, 'owner' => $company_id]);
    }

    /**
     * Show the form for creating a new Room.
     *
     * @return Response
     */
    public function create()
    {
        $company_id = Auth::user()->companyUser()->first()->company_id;
        $rooms = Room::where('company_id', $company_id)->get();
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $userstatus = UserStatus::all();
        $discountTypes = DiscountType::all();
        $modules = Module::all();
        $paymentCycles = PaymentCycle::all();
        $paymentMethods = PaymentMethod::all();

        $data = [
            'rooms' => $rooms,
            'countries' => $countries,
            'states' => $states,
            'cities' => $cities,
            'userStatus' => $userstatus,
            'discountTypes' => $discountTypes,
            'modules' => $modules,
            'paymentCycles' => $paymentCycles,
            'paymentMethods' => $paymentMethods,
            'companyUsers' => '',
        ];
        //dd($rooms);

        return view('company.contracts.create', $data);
    }

    /**
     * Store a newly created Room in storage.
     *
     * @param CreateRoomRequest $request
     *
     * @return Response
     */
    public function store(CreateRoomContractRequest $request)
    {
        $input = $request->all();
        $company_id = Auth::user()->companyUser()->first()->company_id;

        $input['company_id'] = $company_id;
        $input['start_date'] = date('Y-m-d', strtotime($input['start_date']));
        $input['end_date'] = date('Y-m-d', strtotime($input['end_date']));

        $roomContract = $this->roomContractRepository->create($input);

        return response()->json(['success'=>1, 'msg'=>'Company contract has been generated successfully', 'room_contract_id'=>$roomContract->id]);
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
        $company_id = Auth::user()->companyUser()->first()->company_id;
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
        $contract = RoomContracts::find($id);
        $company = Company::where('room_contract_id', $contract->id)->first();
        $company_id = Auth::user()->companyUser()->first()->company_id;
        $rooms = Room::where('company_id', $company_id)->get();
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $userstatus = UserStatus::all();
        $discountTypes = DiscountType::all();
        $modules = Module::all();
        $paymentCycles = PaymentCycle::all();
        $paymentMethods = PaymentMethod::all();
        $companyUsers = CompanyUser::where('company_id', $company->id)->get();

        $data = [
            'contract' => $contract,
            'company' => $company,
            'rooms' => $rooms,
            'countries' => $countries,
            'states' => $states,
            'cities' => $cities,
            'userStatus' => $userstatus,
            'discountTypes' => $discountTypes,
            'modules' => $modules,
            'paymentCycles' => $paymentCycles,
            'paymentMethods' => $paymentMethods,
            'companyUsers' => $companyUsers,
        ];
        //dd($rooms);

        return view('company.contracts.edit', $data);
    }

    /**
     * Update the specified Room in storage.
     *
     * @param  int              $id
     * @param UpdateRoomRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoomContractRequest $request)
    {

        $input = $request->all();
        $room_contract = $this->roomContractRepository->findWithoutFail($id);

        if (empty($room_contract)) {
            Flash::error('Company Room not found');

            return redirect(route('company.rooms.index'));
        }

        $input['start_date'] = date('Y-m-d', strtotime($input['start_date']));
        $input['end_date'] = date('Y-m-d', strtotime($input['end_date']));

        $this->roomContractRepository->update($input, $id);

        return response()->json(['success'=>1, 'msg'=>'Company contract has been updated successfully', 'room_contract_id'=>$id]);

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
        $room = $this->roomContractRepository->findWithoutFail($id);

        if (empty($room)) {
            Flash::error('Company Room not found');

            return redirect(route('company.rooms.index'));
        }

        $this->roomContractRepository->delete($id);

        $request->session()->flash('msg.success', 'Company Room deleted successfully.');

        return redirect(route('company.contracts.index'));
    }


    /**
     * Get contract status as calendar view
     * */

    public function status()
    {
        $company_id = Auth::user()->companyUser()->first()->company_id;
        $contracts = Room::leftJoin('room_contracts', 'rooms.id', '=', 'room_contracts.room_id')
            ->join('company_floor_rooms', 'rooms.floor_id', '=', 'company_floor_rooms.id')
            ->join('company_buildings', 'company_floor_rooms.building_id', '=', 'company_buildings.id')
            ->where('rooms.company_id', $company_id)
            ->where('room_contracts.deleted_at', NULL)
            ->select('rooms.id','rooms.name', 'start_date', 'end_date', 'company_buildings.name as buildingName', 'company_floor_rooms.floor')
            ->distinct('rooms.id')->orderBy('company_buildings.id', 'DESC')->get();
        $data = json_encode($contracts);

        return view('company.contracts.status', ['data' => $data]);
    }

    /**
     * Return Period data by Room ID
     **/

    public function getPeriod(Request $request)
    {
        $input = $request->room_id;
        $contracts = RoomContracts::where('room_id', $input)->get();
        return response()->json(['success'=>1, 'msg'=>'Fetched Room Contract Period successfully', 'data' => $contracts]);
    }
}
