<?php

namespace App\Http\Controllers\Company\Rental;

use App\Models\Rental\ArticleFinancial;
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

class FinancialController extends AppBaseController
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
          'tab' => 'financial',
        ];

        return view('company.rental.financial.index', $data);
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
            'tab' => 'financial',
        ];

        return view('company.rental.financial.create', $data);
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

        $financial = ArticleFinancial::create($input);

        return response()->json(['success'=> 1, 'msg'=>'Article Financial has been created successfully', 'financial'=>$financial]);
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

        $financial = ArticleFinancial::find($id);
        if(empty($financial)) {
            $success = 0;
            $msg = "Article Financial Invoice not found";
        }else {
            echo "<pre>";
            print_r($input);
            echo "</pre>";
            $financial = ArticleFinancial::whereId($id)->update($input);
            $success = 1;
            $msg = "Article Financial has been updated successfully";
        }

        return response()->json(['success'=>$success, 'msg'=>$msg, 'financial'=>$financial]);
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
