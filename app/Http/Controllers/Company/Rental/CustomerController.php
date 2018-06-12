<?php

namespace App\Http\Controllers\Company\Rental;

use App\Models\CompanyUser;
use App\Models\Rental\CompanyCustomer;
use App\Models\Rental\CustomerContactPerson;
use App\Models\Rental\CustomerInvoice;
use App\Models\Rental\Signage;
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
use App\Models\Room;

class CustomerController extends AppBaseController
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
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $customers = CompanyCustomer::where('company_id', $company_id)->get();
        $companyBuildings = CompanyBuilding::where('company_id', $company_id)->get();
        $companyFloors = CompanyFloorRoom::where('company_id', $company_id)->get();
        $data = [
            'company_id' => $company_id,
            'customers' => $customers,
            'buildings' => $companyBuildings,
            'floors' => $companyFloors,
        ];

        return view('company.rental.customers.index', $data);
    }

    /**
     * Show the form for creating a new Room.
     *
     * @return Response
     */
    public function create()
    {
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $companyBuildings = CompanyBuilding::where('company_id', $company_id)->get();
        $companyFloors = CompanyFloorRoom::where('company_id', $company_id)->get();
        $rooms = Room::where('company_id', $company_id)->get();

        $data = [
            'company_id' => $company_id,
            'buildings' => $companyBuildings,
            'floors' => $companyFloors,
            'rooms' => $rooms,
        ];

        return view('company.rental.customers.create', $data);
    }

    /**
     * Store a newly created Room in storage.
     *
     * @param CreateRoomRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        /*echo "<pre>";
        print_r($input);
        echo "</pre>";*/

        $customer = CompanyCustomer::create($input);

        return response()->json(['success'=> 1, 'msg'=>'Company has been created successfully', 'customer'=>$customer]);
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
        $companyBuildings = CompanyBuilding::where('company_id', $company_id)->get();
        $companyFloors = CompanyFloorRoom::where('company_id', $company_id)->get();
        $rooms = Room::where('company_id', $company_id)->get();
        $customer = CompanyCustomer::find($id);
        $contact = CustomerContactPerson::where('customer_id', $id)->first();
        $invoice = CustomerInvoice::where('customer_id', $id)->first();
        $signage = Signage::where('customer_id', $id)->first();
        $building_name = CompanyBuilding::find($customer->building)->name;
        $floor_name = CompanyFloorRoom::find($customer->floor)->floor;
        $room_name = Room::find($customer->room)->name;

        $data = [
            'company_id' => $company_id,
            'buildings' => $companyBuildings,
            'floors' => $companyFloors,
            'rooms' => $rooms,
            'customer' => $customer,
            'contact' => $contact,
            'invoice' => $invoice,
            'signage' => $signage,
            'building_name' => $building_name,
            'floor_name' => $floor_name,
            'room_name' => $room_name,
        ];

        return view('company.rental.customers.edit', $data);
    }

    /**
     * Update the specified Room in storage.
     *
     * @param  int              $id
     * @param UpdateRoomRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->except('_token', '_method');

        $customer = CompanyCustomer::find($id);
        if(empty($customer)) {
            $success = 0;
            $msg = "Customer not found";
        }else {

            $customer = CompanyCustomer::whereId($id)->update($input);
            $success = 1;
            $msg = "Company customer has been updated successfully";
        }

        return response()->json(['success'=>$success, 'msg'=>$msg, 'customer'=>$customer]);
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
        return redirect(route('company.contracts.index'));
    }

    /**
     * Customers Normal Search by name, org.nr, email
     */
    public function normal_search(Request $request)
    {
        $input = $request->all();
/*        echo "<pre>";
        print_r($input['data']);
        echo "</pre>";
        exit;*/
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        if($input['data'] !== '') {
            $customers = CompanyCustomer::where('company_id', $company_id)
                ->where(function($q) use($input){
                    $q->where('org_no', $input['data'])
                        ->orwhere('email', $input['data'])
                        ->orWhere('name', 'like', '%'.$input['data'].'%');
                })->get();
        } else {
            $customers = CompanyCustomer::where('company_id', $company_id)->get();
        }

        $data = [
            'company_id' => $company_id,
            'customers' => $customers,
        ];

        return response()->json(['success'=>1, 'msg'=>'', 'data'=>$data]);
    }


    /**
     * Customers Normal Search by building, floor
     */
    public function advance_search(Request $request)
    {
        $input = $request->all();

        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        if($input['building'] !== '') {
            $customers = CompanyCustomer::where('company_id', $company_id)
                ->where('building', $input['building'])
                ->where('floor', $input['floor'])
                ->get();
        } else {
            $customers = CompanyCustomer::where('company_id', $company_id)->get();
        }

        $data = [
            'company_id' => $company_id,
            'customers' => $customers,
        ];

        return response()->json(['success'=>1, 'msg'=>'', 'data'=>$data]);
    }
}
