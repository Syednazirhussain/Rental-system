<?php

namespace App\Http\Controllers\Company\Rental;

use App\Models\CompanyUser;
use App\Models\Rental\CustomerContactPerson;
use App\Repositories\RoomContractRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;

class ContactController extends AppBaseController
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
        $data = [
          'tab' => 'contacts',
        ];

        return view('company.rental.contacts.index', $data);
    }

    /**
     * Show the form for creating a new Room.
     *
     * @return Response
     */
    public function create()
    {
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $data = [
            'tab' => 'contacts',
        ];

        return view('company.rental.contacts.create', $data);
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

        echo "<pre>";
        print_r($input);
        echo "</pre>";

        $contact = CustomerContactPerson::create($input);

        return response()->json(['success'=> 1, 'msg'=>'Customer Contact has been created successfully', 'contact'=>$contact]);

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
    public function update($id, Request $request)
    {
        $input = $request->except('_token', '_method');

        $contact = CustomerContactPerson::find($id);
        if(empty($contact)) {
            $success = 0;
            $msg = "Customer not found";
        }else {
            echo "<pre>";
            print_r($input);
            echo "</pre>";
            $contact = CustomerContactPerson::whereId($id)->update($input);
            $success = 1;
            $msg = "Company customer has been updated successfully";
        }

        return response()->json(['success'=>$success, 'msg'=>$msg, 'contact'=>$contact]);
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
