<?php

namespace App\Http\Controllers\Company\Rental;

use App\Models\Rental\ArticlePrice;
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

class PriceController extends AppBaseController
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
          'tab' => 'prices',
        ];

        return view('company.rental.prices.index', $data);
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
            'tab' => 'prices',
        ];

        return view('company.rental.prices.create', $data);
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

        $price = ArticlePrice::create($input);

        return response()->json(['success'=> 1, 'msg'=>'Article Price has been created successfully', 'price'=>$price]);
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

        $price = ArticlePrice::find($id);
        if(empty($price)) {
            $success = 0;
            $msg = "Article not found";
        }else {
            echo "<pre>";
            print_r($input);
            echo "</pre>";
            $price = ArticlePrice::whereId($id)->update($input);
            $success = 1;
            $msg = "Company Article has been updated successfully";
        }

        return response()->json(['success'=>$success, 'msg'=>$msg, 'price'=>$price]);
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
