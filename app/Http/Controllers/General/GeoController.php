<?php

namespace App\Http\Controllers\General;

use App\Repositories\CountryRepository;
use App\Repositories\StateRepository;
use App\Repositories\CityRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class GeoController extends AppBaseController
{
    /** @var  UserRoleRepository */
    private $countryRepository;
    private $stateRepository;
    private $cityRepository;

    public function __construct(CountryRepository $countryRepo, 
                                StateRepository $stateRepo, 
                                CityRepository $cityRepo)
    {
        $this->countryRepository = $countryRepo;
        $this->stateRepository = $stateRepo;
        $this->cityRepository = $cityRepo;
    }

    /**
     * Fetching lists of Cities related to posted State of Country 
     *
     * @param Request $request
     * @return Json Response
     */
    public function getCities(Request $request)
    {
        $state_id = $request->state_id;

        $cities = $this->cityRepository->findCities($state_id);

        return response()->json(['success'=> 1, 'cities'=>$cities]);
        
    }

    
}
