<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreateRoomRequest;
use App\Http\Requests\Company\UpdateRoomRequest;
use App\Models\CompanyService;
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
use App\Models\Equipments;

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


    public function getFloorsByBuildingId($building_id)
    {
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $floors =   CompanyFloorRoom::where('company_id', $company_id)
                        ->where('building_id',$building_id)
                        ->pluck("floor","id");
        return response()->json($floors);
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
        $equipments = Equipments::all();

        $buildings = CompanyBuilding::where('company_id',$company_id)->get();

        $services = Service::where('company_id', $company_id)->get();

        $data = [
            'company' => $company,
            'companyFloors' => $companyFloors,
            'companyBuildings' => $companyBuildings,
            'services' => $services,
            'companyServices' => $services,
            'buildings'   => $buildings,
            'equipments'  => $equipments  
          ];

        return view('company.rooms.create', $data);
    }

    public function getCompanyRoomEquipment()
    {
        $equipments = Equipments::all();

        return json_encode($equipments);
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



        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;

        if ($request->hasFile('image1')) 
        {
            $path = $request->file('image1')->store('public/uploadedimages');
            $path = explode("/", $path);
            $input['image1'] = $path[2];
        }
        else
        {
            $input['image1'] = '';
        }

        if ($request->has('room_module_type')) 
        {
            $input['room_module_type'] = 1;    
        }
        else
        {
            $input['room_module_type'] = 0;   
        }

        if($request->has('end_date_continue'))
        {
            $input['end_date_continue'] = 1;
            $input['end_date'] = null;
        }
        else
        {
            $input['end_date_continue'] = 0;
        }

        if($request->has('rent_end_date_continue'))
        {
            $input['rent_end_date_continue'] = 1;
            $input['rent_end_date'] = null;
        }
        else
        {
            $input['rent_end_date_continue'] = 0;
        }

        if($request->has('rent_calender_available'))
        {
            $input['rent_calender_available'] = 1;
        }
        else
        {
            $input['rent_calender_available'] = 0;
        }


        if($request->has('rent_available_users'))
        {
            $input['rent_available_users'] = 1;
        }
        else
        {
            $input['rent_available_users'] = 0;
        }

        if($request->has('conf_calender_available'))
        {
            $input['conf_calender_available'] = 1;
        }
        else
        {
            $input['conf_calender_available'] = 0;
        }

        if($request->has('conf_available_users'))
        {
            $input['conf_available_users'] = 1;
        }
        else
        {
            $input['conf_available_users'] = 0;
        }

        $errors = [];

        if($request->has('start_date') && $request->has('end_date'))
        {
            $start_date = strtotime($input['start_date']);
            $end_date = strtotime($input['end_date']);

            if($end_date < $start_date)
            {

                $errors[] = 'End date must be greater than start date';
            }
        }

        if($request->has('rent_start_date') && $request->has('rent_end_date'))
        {
            $start_date = strtotime($input['rent_start_date']);
            $end_date = strtotime($input['rent_end_date']);

            if($end_date < $start_date)
            {
                $errors[] = 'Rent End date must be greater than rent start date';
            }
        }

        if($errors)
        {
            return redirect()->back()->withErrors($errors);
        }


        $room = new Room;
        $room->floor_id = $input['floor_id'];
        $room->company_id = $company_id;
        $room->service_id = $input['service_id'];
        $room->name = $input['name'];
        $room->area = $input['area'];
        $room->price = $input['price'];
        $room->security_code = $input['security_code'];
        $room->image1 = $input['image1'];
        $room->image2 = '';
        $room->image3 = '';
        $room->image4 = '';
        $room->image5 = '';
        $room->sort_index = $input['sort_index'];
        $room->article_number = $input['article_number'];
        $room->public_name = $input['public_name'];
        $room->SQNA = $input['SQNA'];
        $room->building_id = $input['building_id'];
        $room->address = $input['address'];
        $room->start_date =  date('Y-m-d', strtotime(str_replace('-', '/', $input['start_date'])));
        $room->end_date = date('Y-m-d', strtotime(str_replace('-', '/', $input['end_date'])));
        $room->end_date_continue = $input['end_date_continue'];
        $room->conf_room_type = $input['conf_room_type'];
        $room->conf_day_price = $input['conf_day_price'];
        $room->conf_half_day_price = $input['conf_half_day_price'];
        $room->conf_cost = $input['conf_cost'];
        $room->conf_small_group_price = $input['conf_sm_price'];
        $room->conf_high_price = $input['conf_high_price'];
        $room->conf_medium_price = $input['conf_medium_price'];
        $room->conf_low_price = $input['conf_low_price'];
        $room->conf_termination_cond = $input['conf_termination_cond'];
        $room->conf_vat = $input['conf_vat'];
        $room->conf_calendar_available = $input['conf_calender_available'];
        $room->conf_available_users = $input['conf_available_users'];
        $room->conf_info_internal = $input['conf_info_internal'];
        $room->conf_info_customer_se = $input['conf_info_customer_se'];
        $room->conf_info_customer_en = $input['conf_info_customer_en'];
        $room->conf_info_technical_se = $input['conf_info_technical_se'];
        $room->conf_info_technical_en = $input['conf_info_technical_en'];
        $room->rent_monthly_rent = $input['rent_monthly_rent'];
        $room->rent_num_persons = $input['rent_number_person'];
        $room->rent_vat = $input['rent_vat'];
        $room->rent_new_price = $input['rent_new_price'];
        $room->rent_start_date = date('Y-m-d', strtotime(str_replace('-', '/', $input['rent_start_date'])));
        $room->rent_end_date = date('Y-m-d', strtotime(str_replace('-', '/', $input['rent_end_date'])));
        $room->rent_end_date_continue = $input['rent_end_date_continue'];
        $room->rent_room_type = $input['rent_room_type'];
        $room->rent_calendar_available = $input['rent_calender_available'];
        $room->rent_available_users = $input['rent_available_users'];
        $room->save();


        // $room = $this->roomRepository->create($input);

        if($room)
        {
            // return response()->json(['success'=> 1, 'msg'=>'Company has been created successfully', 'room'=>$room]);

            session()->flash('msg.success','room successfully created');
            return redirect()->route('company.rooms.index');            
        }




        // $input['company_id'] = $company_id;
        // $input['image1'] = '';
        // $input['image2'] = '';
        // $input['image3'] = '';
        // $input['image4'] = '';
        // $input['image5'] = '';

        // if($request->image1)
        // {
        //     $image_link = $request->image1->hashName();
        //     $request->image1->move(public_path('/uploadedimages'), $image_link);
        //     $input['image1'] = $image_link;
        // }
        // if($request->image2)
        // {
        //     $image_link = $request->image2->hashName();
        //     $request->image2->move(public_path('/uploadedimages'), $image_link);
        //     $input['image2'] = $image_link;
        // }
        // if($request->image3)
        // {
        //     $image_link = $request->image3->hashName();
        //     $request->image3->move(public_path('/uploadedimages'), $image_link);
        //     $input['image3'] = $image_link;
        // }
        // if($request->image4)
        // {
        //     $image_link = $request->image4->hashName();
        //     $request->image4->move(public_path('/uploadedimages'), $image_link);
        //     $input['image4'] = $image_link;
        // }
        // if($request->image5)
        // {
        //     $image_link = $request->image5->hashName();
        //     $request->image5->move(public_path('/uploadedimages'), $image_link);
        //     $input['image5'] = $image_link;
        // }

        // $floor = CompanyFloorRoom::find($input['floor_id']);
        // $room_count = Room::where('company_id', $company_id)->where('floor_id',$input['floor_id'])->count();
        // //Check if room count over than specified floor room number
        // if($floor->num_rooms <= $room_count) {
        //     $request->session()->flash('msg.error', 'You can not create any more room on '.$floor->floor.'floor.');
        //     return response()->json(['success'=> 0, 'msg'=>'Can not create room anymore']);
        // }


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
        $companyServices = Service::where('company_id', $company_id)->get();
        
        // $roomServices = CompanyService::where('room_id', $room->id)->get();




        if (empty($room)) {
            Flash::error('Company Room not found');

            return redirect(route('company.rooms.index'));
        }


        $floor_name = CompanyBuilding::find(CompanyFloorRoom::find($room->floor_id)->building_id)->name.' - Floor'.CompanyFloorRoom::find($room->floor_id)->floor;
        $service_name = Service::find($room->service_id)->name;

        $data = [
            'room' => $room,
            'company' => $company,
            'companyFloors' => $companyFloors,
            'companyBuildings' => $companyBuildings,
            'services' => $services,
            'service_name' => $service_name,
            'floor_name' => $floor_name,
            'companyServices' => $companyServices,
            // 'roomServices' => $roomServices
        ];

        dd( $data );

        return view('company.rooms.edit', $data);
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
            $success = 0;

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

        $success = 1;
        $msg = "Company has been updated successfully";

        return response()->json(['success'=>$success, 'msg'=>$msg]);
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
