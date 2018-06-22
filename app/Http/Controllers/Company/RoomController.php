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

use App\Models\Company\RoomImages;
use App\Models\Company\RoomSettingArrangment;
use App\Models\Company\RoomEquipments;
use App\Models\Company\RoomNotes;
use App\Repositories\Company\ServiceRepository;
use Session;

class RoomController extends AppBaseController
{
    /** @var  RoomRepository */
    private $roomRepository;
    private $serviceRepository;

    public function __construct(RoomRepository $roomRepository,
                                    ServiceRepository $serviceRepository)
    {
        $this->roomRepository = $roomRepository;
        $this->serviceRepository = $serviceRepository;
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
        $rooms = Room::where('company_id', $company_id)->orderBy('id', 'DESC')->get();
        $services = Service::where('company_id', $company_id)->pluck('name', 'id');
        $floors = CompanyFloorRoom::where('company_id', $company_id)->pluck('floor', 'id');


        return view('company.rooms.index', ['rooms' => $rooms, 'company' => $company, 'services' => $services,
            'floors' => $floors]);
    }

    public function imageRemove(Request $request)
    {
        $input = $request->all();

        $roomImages = RoomImages::where('image_file',$input['image'])->delete();

        if($roomImages)
        {   
            return ['msg' => 'Image remove successfully'];
        }
        else
        {
            return ['msg' => 'Image cannot removed'];   
        }
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
            'services'          => $services,
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

        $room = $this->roomRepository->findWithoutFail($id);
        $servicerepo = $this->serviceRepository->findWithoutFail($id);

        $servicejson = json_decode($room->services);

        $selectedService = Service::whereIn('id', $servicejson)->get();
         // dd($selectedService);
        // dd($room['end_date']);
        if (empty($room)) 
        {
            session()->flash('msg.error','Company Room not found');
            return redirect(route('company.rooms.index'));
        }

        $room_id = $room->id;
        $company_id = $room->company_id;
        $building_id = $room->building_id;


        $buildings = CompanyBuilding::where('company_id',$company_id)->get();
        $floors = CompanyFloorRoom::where('building_id',$building_id)->get();
        $services = Service::where('company_id',$company_id)->get();


        $roomSettings = RoomSettingArrangment::where('room_id',$room_id)->where('building_id',$building_id)->get();
        $roomImages =  RoomImages::where('room_id',$room_id)->where('building_id',$building_id)->get();
        $roomEquipments =  RoomEquipments::where('room_id',$room_id)->where('building_id',$building_id)->get();
        $equipments = Equipments::all();
        $roomSittingArrangments =  RoomSettingArrangment::where('room_id',$room_id)->get();
        $roomNote = RoomNotes::where('room_id',$room_id)->first();


        if($room->room_module_type == 'conference')
        {
            $roomImages = [];
            for($i = 0 ; $i < count($roomSittingArrangments) ; $i++)
            {
                $roomImages[$i] = RoomImages::where('sitting_id',$roomSittingArrangments[$i]->id)->get();
            }

            $url = asset('storage/uploadedimages');

            $url2 = public_path()."/storage/uploadedimages";

            for($i = 0 ; $i < count($roomImages) ; $i++)
            {
                for($j = 0 ; $j < count($roomImages[$i]) ; $j++)
                {
                    $imageFiles[$i][$j]['name'] = $roomImages[$i][$j]->image_file;
                    $imageFiles[$i][$j]['file'] = $url.'/'.$roomImages[$i][$j]->image_file;
                    $imageFiles[$i][$j]['size'] = filesize($url2.'/'.$roomImages[$i][$j]->image_file);
                    $imageFiles[$i][$j]['type'] = mime_content_type($url2.'/'.$roomImages[$i][$j]->image_file);
                }
            }


            $data = [
                'room'  => $room,
                'buildings' => $buildings,
                'floors' => $floors,
                'services' => $services,
                'roomImages' => $roomImages,
                'roomSettings' => $roomSettings,
                'roomEquipments' => $roomEquipments,
                'equipments' => $equipments,
                'roomSittingArrangments' => $roomSittingArrangments,
                'roomImages' => $roomImages,
                'imageFiles' => $imageFiles,
                'servicejson'   =>  $servicejson,
                'selectedService'   =>  $selectedService 
            ];
        }
        elseif($room->room_module_type == 'rental')
        {

            $data = [
                'room'  => $room,
                'buildings' => $buildings,
                'floors' => $floors,
                'services' => $services,
                'roomImages' => $roomImages,
                'roomSettings' => $roomSettings,
                'roomEquipments' => $roomEquipments,
                'equipments' => $equipments,
                'roomSittingArrangments' => $roomSittingArrangments,
                'roomNote'      => $roomNote,
                'servicejson'   =>  $servicejson,
                'selectedService'   =>  $selectedService 
            ];

        }

        return view('company.rooms.edit', $data);
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

        /*$actualDate = date('Y-m-d', strtotime($input['start_date']));

        $input['start_date'] = $actualDate;

        $actualDate = date('Y-m-d', strtotime($input['end_date']));

        $input['end_date'] = $actualDate;*/
        $input['services'] = json_encode(array_values($input['services']));
          // dd($input['services']);


        // dd($input['rent_room_type']);

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

        $room_type = $input['room_module_type'];


        $room = new Room;
        $room->floor_id = $input['floor_id'];
        $room->company_id = $company_id;
        $room->services = $input['services'];
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
        $room->room_module_type = $input['room_module_type'];
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


        if($room)
        {
            $room_id = $room->id;
            $company_id = $room->company_id;
            $building_id = $room->building_id;

            if($room_type == 'conference')
            {

                // This is For Room Sitting Arrangment table
                $siiting_name_arr = $input['sitting_name'];
                $siiting_num_person_arr = $input['sitting_number_person'];

                // This is For Room Images Table
                $filesCount =  count($input['sitting_name']);
                $fileList = [];
                for ($i=0; $i < $filesCount; $i++) 
                { 
                    $fileList[$i] = $input['files'.$i];
                }
                // echo "<pre>";
                // print_r($fileList);
                // echo "</pre>";exit;
                
                $equipment_ids_arr = $input['include_equipment_id'];
                $qty_arr = $input['include_qty'];
                $price_arr = $input['include_price'];
                $info_arr = $input['include_info'];

                for($i= 0; $i < count($siiting_name_arr) ; $i++ )
                {
                    $roomSittingArrangment = new  RoomSettingArrangment;
                    $roomSittingArrangment->room_id  = $room_id;           
                    $roomSittingArrangment->company_id = $company_id;            
                    $roomSittingArrangment->building_id = $building_id;          
                    $roomSittingArrangment->name = $siiting_name_arr[$i];           
                    $roomSittingArrangment->number_persons = $siiting_num_person_arr[$i];
                    $roomSittingArrangment->save();

                    if($roomSittingArrangment)
                    {
                        $sitting_id = $roomSittingArrangment->id;
            
                        foreach ($fileList[$i] as $v) 
                        {
                            $path = $v->store('public/uploadedimages');
                            $pathArr = explode('/', $path);
                            $count = count($pathArr);
                            $path = $pathArr[$count - 1];

                            $roomImages = new RoomImages;
                            $roomImages->building_id = $building_id;
                            $roomImages->room_id = $room_id;
                            $roomImages->sitting_id = $sitting_id;
                            $roomImages->entity_type = $room_type;                            
                            $roomImages->image_file = $path;
                            $roomImages->save();
                        }                      
                    }
                }

                for ($i=0; $i < count($qty_arr); $i++) 
                {
                    $roomEquipment = new RoomEquipments; 
                    $roomEquipment->room_id = $room_id;
                    $roomEquipment->building_id = $building_id;
                    $roomEquipment->room_type = $room_type;
                    $roomEquipment->equipment_id = $equipment_ids_arr[$i];
                    $roomEquipment->qty = $qty_arr[$i];
                    $roomEquipment->price = $price_arr[$i];
                    $roomEquipment->info = $info_arr[$i];
                    $roomEquipment->save();
                }
            }
            elseif($room_type == 'rental')
            {

                $equipment_ids_arr = $input['include_equipment_id_rent'];
                $qty_arr = $input['include_qty_rent'];
                $price_arr = $input['include_price_rent'];
                $info_arr = $input['include_info_rent'];

                for ($i=0; $i < count($qty_arr); $i++) 
                {
                    $roomEquipment = new RoomEquipments; 
                    $roomEquipment->room_id = $room_id;
                    $roomEquipment->building_id = $building_id;
                    $roomEquipment->room_type = $room_type;
                    $roomEquipment->equipment_id = $equipment_ids_arr[$i];
                    $roomEquipment->qty = $qty_arr[$i];
                    $roomEquipment->price = $price_arr[$i];
                    $roomEquipment->info = $info_arr[$i];
                    $roomEquipment->save();
                }
            }


            /*session()->flash('msg.success','room successfully created');*/
            Session::flash("successMessage", "room successfully created");
            return redirect()->route('company.rooms.index');            
        }
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
        $input['services'] = json_encode(array_values($input['services']));


        // dd($input['rent_room_type']);
        /*$actualDate = date('Y-m-d', strtotime($input['start_date']));

        $input['start_date'] = $actualDate;

        $actualDates = date('Y-m-d', strtotime($input['end_date']));

        $input['end_date'] = $actualDates;*/

         // dd( $input );

        if ($request->hasFile('image1')) 
        {
            $path = $request->file('image1')->store('public/uploadedimages');
            $path = explode("/", $path);
            $input['image1'] = $path[2];
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

        if($request->has('start_date') && $request->has('end_date') && $input['end_date_continue'] = 0)
        {
            // dd($input);
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


        // dd($errors);

        if($errors)
        {
            return redirect()->back()->withErrors($errors);
        }


        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;

        // dd($input);
        if (isset($input['files0'])) 
        {
            $sepratorArr = [];
            $sepratorIndex = 0;
            $cursor = 0;
            for($i= 0 ; $i < count($input['files0']) ; $i++)
            {
                if( isset($input['files0'][$cursor]) )
                {
                    $sepratorArr[$sepratorIndex] = $input['files0'][$cursor];
                    $sepratorIndex++;
                    $cursor++;
                }
                else
                {
                    while ( !isset($input['files0'][$cursor]) ) 
                    {
                        $sepratorArr[$sepratorIndex] = "-";
                        $sepratorIndex++;
                        $cursor++;
                    }
                    $sepratorArr[$sepratorIndex] = $input['files0'][$cursor];
                    $sepratorIndex++;
                    $cursor++;
                }
            }
             
        }
// dd($input);

        if($request->has('end_date_continue'))
        {
            $input['end_date_continue'] = 1;
            $input['end_date'] = null;
        }
        else
        {
            $input['end_date_continue'] = 0;
        }
        $room_id = $room->id;
        $building_id = $room->building_id;
        $user_id = Auth::guard('company')->user()->id;
        
        $room->floor_id = $input['floor_id'];
        $room->company_id = $company_id;
        $room->services = $input['services'];
        $room->building_id = $input['building_id'];
        $room->name = $input['name'];
        $room->area = $input['area'];
        $room->price = $input['price'];
        $room->security_code = $input['security_code'];
        if(isset($input['image1']))
        {
            $room->image1 = $input['image1'];
            $room->image2 = '';
            $room->image3 = '';
            $room->image4 = '';
            $room->image5 = '';            
        }
        $room->sort_index = $input['sort_index'];
        $room->article_number = $input['article_number'];
        $room->public_name = $input['public_name'];
        $room->SQNA = $input['SQNA'];
        $room->address = $input['address'];
        $room->start_date =  date('Y-m-d', strtotime(str_replace('-', '/', $input['start_date'])));
        $room->end_date = date('Y-m-d', strtotime(str_replace('-', '/', $input['end_date'])));
        $room->end_date_continue = $input['end_date_continue'];
        // dd($input['end_date_continue']);
        if($input['room_module_type'] == 'conference')
        {
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
        }
        elseif($input['room_module_type'] == 'rental')
        {
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

            if(isset($input['rent_notes']))
            {
                $roomNote = new RoomNotes;
                $roomNote->building_id = $building_id;
                $roomNote->room_id  = $room_id;
                $roomNote->user_id = $user_id;
                $roomNote->note = $input['rent_notes'];
                $roomNote->save();                
            }



        }

        $room->save();       
        // dd($input);

        $entity_type = $input['room_module_type'];

        if($input['room_module_type'] == 'conference')
        {

            $roomEquipmentId = $input['roomEquipmentId'];
            $roomEquipments = RoomEquipments::find($roomEquipmentId);

            for($i = 0 ; $i < count($roomEquipments) ; $i++)
            {
                $roomEquipments[$i]->room_id = $room_id;
                $roomEquipments[$i]->building_id = $building_id;
                $roomEquipments[$i]->room_type = $entity_type;
                $roomEquipments[$i]->equipment_id = $input['include_equipment_id'][$i]; 
                $roomEquipments[$i]->qty = $input['include_qty'][$i];
                $roomEquipments[$i]->price = $input['include_price'][$i];
                $roomEquipments[$i]->info = $input['include_info'][$i];
                $roomEquipments[$i]->save();
            }


            $sittigArrangId = $input['sittingArrangId'];
            $roomSittingArrang =  RoomSettingArrangment::find($sittigArrangId);

            for($i = 0 ; $i < count($roomSittingArrang) ; $i++) 
            {
                $roomSittingArrang[$i]->name = $input['name'][$i];
                $roomSittingArrang[$i]->number_persons = $input['sitting_number_person'][$i];
                $roomSittingArrang[$i]->save();
            }

            if(isset($input['files0']))
            {
                for($i = 0 ; $i < count($sittigArrangId) ; $i++) 
                {
                    for($j = 0 ; $j < count($sepratorArr) ; $j++)
                    {
                        if($sepratorArr[$j] == '-')
                        {
                            break;
                        }
                        else
                        {
                            $path = $sepratorArr[$j]->store('public/uploadedimages');
                            $pathArr = explode('/', $path);
                            $count = count($pathArr);
                            $path = $pathArr[$count - 1];

                            $roomImage = new RoomImages;
                            $roomImage->room_id = $room_id;
                            $roomImage->building_id = $building_id;
                            $roomImage->sitting_id = $sittigArrangId[$i];
                            $roomImage->entity_type = $entity_type;
                            $roomImage->image_file = $path;
                            $roomImage->save();
                        }
                    }
                }


            }

        }
        elseif($input['room_module_type'] == 'rental')
        {

        // dd($input);
        }

/*
        session()->flash('msg.success','Room updated successfully');*/
            Session::flash("successMessage", "Room updated successfully");
        return redirect()->route('company.rooms.index');
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

        /*$request->session()->flash('msg.success', 'Company Room deleted successfully.');*/
        Session::flash("deleteMessage", "Company Room deleted successfully");

        return redirect(route('company.rooms.index'));
    }

    /**
     * Return Lists of Rooms by Floor change as JSON.
     */
    public function getLists(Request $request)
    {
        $floor_id = $request->floor_id;
        $rooms = Room::where('floor_id', $floor_id)->get();

        return response()->json(['success'=> 1, 'rooms'=>$rooms]);
    }
}
