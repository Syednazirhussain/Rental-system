<?php

namespace App\Http\Controllers\Company\Conference;

use App\Repositories\CountryRepository;
use App\Repositories\StateRepository;
use App\Repositories\CityRepository;
use App\Repositories\Admin\UserRepository;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;


class RoomController extends AppBaseController
{


        /** @var  CompanyRepository */
    private $countryRepository;
    private $stateRepository;
    private $cityRepository;
    private $userRepository;


    public function __construct(
                                CountryRepository $countryRepo, 
                                StateRepository $stateRepo,
                                CityRepository $cityRepo,
                                UserRepository $userRepo
                                )
    {
        $this->stateRepository = $stateRepo;
        $this->countryRepository = $countryRepo;
        $this->cityRepository = $cityRepo;
        $this->userRepository = $userRepo;
    }

    
    public function addBooking(Request $request)
    {
        return view('company.room.addBooking');
    }
    
    public function addRoom(Request $request)
    {
        return view('company.room.addRoom');
    }
       
    public function addRoomLayout(Request $request)
    {
        return view('company.room.addRoomLayout');
    }
    
    public function addEquipments(Request $request)
    {
        return view('company.room.addEquipments');
    }
    
    public function addEquipmentsCriteria(Request $request)
    {
        return view('company.room.addEquipmentsCriteria');
    }
       
    public function addFoodnDrinks(Request $request)
    {
        return view('company.room.addFoodnDrinks');
    }
       
    public function addPackage(Request $request)
    {
        return view('company.room.addPackage');
    }
    
    public function addCustomer(Request $request)
    {

        $countries = $this->countryRepository->all();
        $states = $this->stateRepository->all();
        $cities = $this->cityRepository->all();

        $data = [
                'countries' => $countries,
                'states' => $states,
                'cities' => $cities,
            ];


        return view('company.room.addCustomer', $data);
    }
    


}