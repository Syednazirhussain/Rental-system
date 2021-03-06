<?php

namespace App\Http\Controllers\Company;


use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use App\Models\RoomContracts;
use App\Models\Room;
use App\Models\CompanyUser;
use App\Models\User;
use App\Models\City;
use App\Models\Country;
use App\Models\State;

class DashboardController extends AppBaseController
{

    /**
     * Display a listing of the Dashboard.
     *
     * @param Request $request
     * @return Response
     */
    public function index()
    {
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $contract_count = RoomContracts::where('company_id', $company_id)->count();
        $room_count = Room::where('company_id', $company_id)->count();
        $user_count = CompanyUser::where('company_id', $company_id)->count();
        $upcoming_contracts = RoomContracts::where('company_id', $company_id)->where('start_date', '>=', date('Y-m-d'))->get();
        $expiring_contracts = RoomContracts::where('company_id', $company_id)->where('end_date', '<=', date('Y-m-d', strtotime('+30 days')))->where('end_date', '>=', date('Y-m-d'))->get();

        return view('company.dashboard.index', ['contract_count' => $contract_count, 'room_count' => $room_count,
            'upcoming_contracts' => $upcoming_contracts, 'expiring_contracts' => $expiring_contracts, 'user_count' => $user_count]);
    }

    public function profile() {
        $user = User::find(Auth::guard('company')->user()->id);
        $countries = Country::pluck('name', 'id');
        $cities = City::pluck('name', 'id');
        $states = State::pluck('name', 'id');

        return view('company.dashboard.profile', ['user' => $user, 'countries' => $countries, 'cities' => $cities, 'states' => $states]);
    }

}
