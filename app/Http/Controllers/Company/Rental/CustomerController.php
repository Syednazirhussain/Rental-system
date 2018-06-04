<?php

namespace App\Http\Controllers\Company\Rental;

use App\Models\CompanyUser;
use App\Models\Rental\CompanyCustomer;
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
        $data = [
          'company_id' => $company_id,
          'customers' => $customers,
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

}
