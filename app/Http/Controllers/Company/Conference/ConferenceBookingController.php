<?php

namespace App\Http\Controllers\Company\Conference;

use App\Http\Requests\Company\Conference\CreateConferenceBookingRequest;
use App\Http\Requests\Company\Conference\UpdateConferenceBookingRequest;
use App\Repositories\ConferenceBookingRepository;
use App\Repositories\ConferenceBookingItemRepository;
use App\Repositories\RoomLayoutRepository;
use App\Repositories\ConferenceDurationRepository;
use App\Repositories\EquipmentsRepository;
use App\Repositories\PaymentMethodRepository;
use App\Repositories\FoodRepository;
use App\Repositories\PackagesRepository;
use App\Repositories\GeneralSettingRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\CountryRepository;
use App\Repositories\StateRepository;
use App\Repositories\CityRepository;
use App\Repositories\BookingAgencyRepository;
use App\Repositories\ConferenceBookingDraftRepository;
use App\Repositories\ConferenceBookingSignageRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
use Auth;
use Session;
use App\Models\CompanyCustomer;
use App\Models\Rental\CompanyArticle;

use App\Models\User;
use App\Models\Company\ConferenceBookingNotes;



class ConferenceBookingController extends AppBaseController
{
    /** @var  ConferenceBookingRepository */
    private $conferenceBookingRepository;
    private $conferenceBookingItemRepository;
    private $conferenceBookingDraftRepository;
    private $conferenceBookingSignageRepository;
    private $roomLayoutRepository;
    private $conferenceDurationRepository;
    private $equipmentRepository;
    private $paymentMethodRepository;
    private $foodRepository;
    private $packagesRepository;
    private $generalSettingRepository;
    private $countryRepository;
    private $stateRepository;
    private $cityRepository;
    private $bookingAgencyRepository;

    public function __construct(ConferenceBookingRepository $conferenceBookingRepo,
                                ConferenceBookingItemRepository $conferenceBookingItemRepo,
                                ConferenceBookingDraftRepository $conferenceBookingDraftRepo,
                                ConferenceBookingSignageRepository $conferenceBookingSignageRepo,
                                RoomLayoutRepository $roomLayoutRepo,
                                EquipmentsRepository $equipmentRepo,
                                PaymentMethodRepository $paymentMethodRepo,
                                FoodRepository $foodRepo,
                                ConferenceDurationRepository $conferenceDurationRepo,
                                PackagesRepository $packagesRepo,
                                CountryRepository $countryRepo, 
                                StateRepository $stateRepo,
                                CityRepository $cityRepo,                                
                                BookingAgencyRepository $bookingRepo,                                
                                GeneralSettingRepository $generalSettingRepo
                                )
    {
        $this->conferenceBookingRepository      = $conferenceBookingRepo;
        $this->conferenceBookingItemRepository  = $conferenceBookingItemRepo;
        $this->conferenceBookingDraftRepository = $conferenceBookingDraftRepo;
        $this->conferenceBookingSignageRepository = $conferenceBookingSignageRepo;
        $this->roomLayoutRepository             = $roomLayoutRepo;
        $this->conferenceDurationRepository     = $conferenceDurationRepo;
        $this->equipmentRepository              = $equipmentRepo;
        $this->paymentMethodRepository          = $paymentMethodRepo;
        $this->foodRepository                   = $foodRepo;
        $this->packagesRepository               = $packagesRepo;
        $this->generalSettingRepository         = $generalSettingRepo;
        $this->stateRepository                  = $stateRepo;
        $this->countryRepository                = $countryRepo;
        $this->cityRepository                   = $cityRepo;        
        $this->bookingAgencyRepository          = $bookingRepo;        
    }

    /**
     * Display a listing of the ConferenceBooking.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->conferenceBookingRepository->pushCriteria(new RequestCriteria($request));
        $conferenceBookings = $this->conferenceBookingRepository->all();
        $paymentMethods = $this->paymentMethodRepository->all();
        $conferenceDurations = $this->conferenceDurationRepository->all();
        $roomLayouts = $this->roomLayoutRepository->all();
        $equipments = $this->equipmentRepository->all();
        $foodItems = $this->foodRepository->all();

        $data = [
                'conferenceBookings' => $conferenceBookings,
                'conferenceDurations' => $conferenceDurations,
                'paymentMethods' => $paymentMethods,
                'roomLayouts' => $roomLayouts,
                'equipments' => $equipments,
                'foodItems' => $foodItems,
            ];

        return view('company.Conference.conference_bookings.index', $data);
    }

    public function getBookingNotes(Request $request)
    {
        $input = $request->all();

        if( isset($input['conferenceBookingId']) && isset($input['code']))
        {
            $conferenceBookingNotes =  ConferenceBookingNotes::where('conference_booking_id',$input['conferenceBookingId'])->where('code',$input['code'])->orderBy('id', 'DESC')->get();
            $users = User::all();

            if (!empty($conferenceBookingNotes) && count($conferenceBookingNotes) > 0) 
            {
                $data = [
                    'users' => $users,
                    'conferenceBookingNotes' => $conferenceBookingNotes
                ];

                return response()->json($data);
            }
            else
            {
                return response()->json(['status' => 0 ,'msg' => 'Not enough Notes']);
            }
        }
        else
        {
            return response()->json(['status' => 0 ,'msg' => 'There is some problem while getting HR Notes']);
        }
    }

    public function createBookingNotes(Request $request)
    {
        $input = $request->all();

        $user_id = Auth::guard('company')->user()->id;

        if( isset($input['note']) && isset($input['code']) &&isset($input['conferenceBookingId']) )
        {
            $conferenceBookingNotes = new ConferenceBookingNotes;
            $conferenceBookingNotes->note = $input['note'];
            $conferenceBookingNotes->code = $input['code'];
            $conferenceBookingNotes->conference_booking_id = $input['conferenceBookingId'];
            $conferenceBookingNotes->user_id = $user_id;
            $conferenceBookingNotes->save();
            if($conferenceBookingNotes)
            {
                return response()->json($conferenceBookingNotes);   
            }
            else
            {
                return response()->json(['status' => 0 ,'msg' => 'Conference Booking Notes Note are not create']);
            }
        }
        else
        {
            return response()->json(['status' => 0,'msg' => 'There is some problem while creating HR Note']);
        }
    }

    public function editBookingNotes($id)
    {
        $conferenceBookingNotes =  ConferenceBookingNotes::find($id);
        if (!empty($conferenceBookingNotes)) 
        {
            return response()->json($conferenceBookingNotes);
        }
        else
        {
            return response()->json(['status' => 0,'msg' => 'Conference Booking Note does not exist']);
        }
    }

    public function updateBookingNotes($id,Request $request)
    {
        $input = $request->all();

        if ( isset($input['note']) && isset($input['conferenceBookingId']) ) 
        {
            $conferenceBookingNotes = ConferenceBookingNotes::find($id);
            $conferenceBookingNotes->conference_booking_id = $input['conferenceBookingId'];
            $conferenceBookingNotes->note = $input['note'];
            $conferenceBookingNotes->save();
            if($conferenceBookingNotes)
            {
                return response()->json($conferenceBookingNotes);
            }
            else
            {
                return response()->json(['status' => 0,'msg' => 'Conference Booking Notes are not update']);
            }
        }
        else
        {
            return response()->json(['status' => 0,'msg' => 'There is some problem while updating HR Note']);
        }
    }

    public function deleteBookingNotes($id)
    {
        if ($id) 
        {
            $conferenceBookingNotes = ConferenceBookingNotes::find($id);
            $conferenceBookingNotes->delete();

            if($conferenceBookingNotes->deleted_at == null)
            {
                return response()->json(['status' => 0,'msg' => 'Conference Booking Notes are not delete']);
            }
        }
        else
        {
            return response()->json(['status' => 0,'msg' => 'There is some problem while deleting HR Note']);   
        }
    }

    /**
     * Show the form for creating a new ConferenceBooking.
     *
     * @return Response
     */
    public function create($id = null)
    {


        $countries              = $this->countryRepository->all();
        $states                 = $this->stateRepository->all();
        $cities                 = $this->cityRepository->all();

        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $getCompanyCustomer = CompanyCustomer::where('company_id', $company_id)->get();

        $equipments = CompanyArticle::where('category', 'equipment')->get();
        $foodItems  = CompanyArticle::where('category', 'food')->get();
        $packages   = CompanyArticle::where('category', 'food_package')->get();

        // dd($equipments);

        $conferenceBookings     = $this->conferenceBookingRepository->all();
        $paymentMethods         = $this->paymentMethodRepository->all();
        $conferenceDurations    = $this->conferenceDurationRepository->all();
        $roomLayouts            = $this->roomLayoutRepository->all();
        // $equipments             = $this->equipmentRepository->all();
        // $foodItems              = $this->foodRepository->all();
        // $packages               = $this->packagesRepository->all();
        $generalSetting         = $this->generalSettingRepository->getBookingTaxValue();
        $bookingAgencies        = $this->bookingAgencyRepository->getCompanyBookingAgencies($company_id);

        $rooms                  = DB::table('rooms')->where('company_id', $company_id)->orderBy('name', 'asc')->get();

        // dd($generalSetting->meta_value);

        $data = [
                    'getCompanyCustomer'    => $getCompanyCustomer,
                    'countries'             => $countries,
                    'states'                => $states,
                    'cities'                => $cities,
                    'conferenceBookings'    => $conferenceBookings,
                    'conferenceDurations'   => $conferenceDurations,
                    'paymentMethods'        => $paymentMethods,
                    'roomLayouts'           => $roomLayouts,
                    'equipments'            => $equipments,
                    'foodItems'             => $foodItems,
                    'rooms'                 => $rooms,
                    'packages'              => $packages,
                    'generalSetting'        => $generalSetting,
                    'roomCalenderId'        => $id,
                    'bookingAgencies'       => $bookingAgencies,
                    'bookingItems'          => "",
                ];

        return view('company.Conference.conference_bookings.create', $data);

    }

    /**
     * Store a newly created ConferenceBooking in storage.
     *
     * @param CreateConferenceBookingRequest $request
     *
     * @return Response
     */
    public function store(CreateConferenceBookingRequest $request)
    {
        $input = $request->all();


        // dd($input);


        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;

        $updateCustomer = [
                                'address' => $request->customer_address,
                                'postal_code' => $request->customer_post_code,
                                'telephone' => $request->customer_telephone,
                                'mobile' => $request->customer_mobile,
                                'fax' => $request->customer_fax,
                                'organization_num' => $request->customer_org_num,
                                'invoice_send_as' => $request->invoice_send,
                                'reference' => $request->reference,
                                'contact_person' => $request->contact_person,
                                'payment_condition' => $request->payment_conditions,
                                'interest_fees' => $request->interest_fees,
                                'peyment_reminder' => $request->payment_reminder,
                          ];

        CompanyCustomer::where('company_id', $company_id)->where('user_id', $request->customer_id)->update($updateCustomer);

        $updatedCustomerInfo = CompanyCustomer::where('company_id', $company_id)->where('user_id', $request->customer_id)->first();

        // ==========================================================================

        $input['company_customer_id'] = $updatedCustomerInfo->id;

        $booking_date   = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $input['booking_date'])));
        $start_datetime = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $input['start_datetime'])));
        $end_datetime   = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $input['end_datetime'])));
     
        $input['booking_date']      = $booking_date;
        $input['start_datetime']    = $start_datetime;
        $input['end_datetime']      = $end_datetime;

        // dd($input['start_datetime']);

        if (empty($input['packages'])) {
            $input['package_price'] = 0.00;
        } 

        if (empty($input['foods'])) {
            $input['food_price'] = 0.00;
        } 

        if (empty($input['equipments'])) {
            $input['equipment_price'] = 0.00;
        } 


        $conferenceBooking = $this->conferenceBookingRepository->create($input);


        // ==========================================================================

        // $equipments = CompanyArticle::where('category', 'equipment')->get();
        // $foodItems  = CompanyArticle::where('category', 'food')->get();
        // $packages   = CompanyArticle::where('category', 'food_package')->get();

        if (!empty($input['packages'])) {

            $packagesUnit       = $input['packageUnits'];
            $packagesItemsID    = $input['packages'];

            $packagesData = array_intersect_key($packagesUnit, array_flip($packagesItemsID));

            foreach ($packagesData as $key=>$val) {

                // $package = $this->packagesRepository->findWithoutFail($key);
                $package   = CompanyArticle::where('id', $key)->where('category', 'food_package')->first();

                $packageInput['booking_id']    = $conferenceBooking->id;
                $packageInput['entity_id']     = $key;
                $packageInput['entity_type']   = "package";
                $packageInput['entity_name']   = $package->article_name_english;
                $packageInput['entity_price']  = $package->in_price;
                $packageInput['entity_qty']    = $val['qty'];

                $this->conferenceBookingItemRepository->create($packageInput);
            }
        }


        // ==========================================================================


        if (!empty($input['foods'])) {

            $foodUnits      = $input['foodUnits'];
            $foodItemsID    = $input['foods'];

            $foodsData = array_intersect_key($foodUnits, array_flip($foodItemsID));

            foreach ($foodsData as $key=>$val) {

                // $food = $this->foodRepository->findWithoutFail($key);
                $food  = CompanyArticle::where('id', $key)->where('category', 'food')->first();

                $foodInput['booking_id']    = $conferenceBooking->id;
                $foodInput['entity_id']     = $key;
                $foodInput['entity_type']   = "food";
                $foodInput['entity_name']   = $food->article_name_english;
                $foodInput['entity_price']  = $food->in_price;
                $foodInput['entity_qty']    = $val['qty'];

                $this->conferenceBookingItemRepository->create($foodInput);
            }
        }


        // ==========================================================================


        if (!empty($input['equipments'])) {

            $equipmentsUnits      = $input['equipmentsUnits'];
            $equipmentsItemsID    = $input['equipments'];

            $equipmentsData = array_intersect_key($equipmentsUnits, array_flip($equipmentsItemsID));

            foreach ($equipmentsData as $key=>$val) {

                // $equipment = $this->equipmentRepository->findWithoutFail($key);
                $equipment = CompanyArticle::where('id', $key)->where('category', 'equipment')->first();

                $equipmentInput['booking_id']    = $conferenceBooking->id;
                $equipmentInput['entity_id']     = $key;
                $equipmentInput['entity_type']   = "equipments";
                $equipmentInput['entity_name']   = $equipment->article_name_english;
                $equipmentInput['entity_price']  = $equipment->in_price;
                $equipmentInput['entity_qty']    = $val['qty'];

                $this->conferenceBookingItemRepository->create($equipmentInput);
            }
        }


        // ==========================================================================

        $input['booking_id'] = $conferenceBooking->id;
        $this->conferenceBookingDraftRepository->create($input);

        // ==========================================================================


        if ($input['is_signage'] == 'on') { $input['is_signage'] = 1; }


        $createSignage = [
                                'booking_id' => $input['booking_id'],
                                'is_signage' => $input['is_signage'],
                                'first_name' => $input['signage_first_name'],
                                'first_screen_name' => $input['signage_first_screen_name'],
                                'second_name' => $input['signage_second_name'],
                                'second_screen_name' => $input['signage_second_screen_name'],
                        ];


        if ($request->hasFile('signage_first_logo')) {

            $path = $request->file('signage_first_logo')->store('public/booking_signage');
            $path = explode("/", $path);
            $createSignage['first_logo'] = $path[2];
        }


        if ($request->hasFile('signage_second_logo')) {

            $path = $request->file('signage_second_logo')->store('public/booking_signage');
            $path = explode("/", $path);
            $createSignage['second_logo'] = $path[2];
        }


        $this->conferenceBookingSignageRepository->create($createSignage);

        // ==========================================================================


        Session::flash("successMessage", "The Conference Bookingk has been added successfully.");
        return redirect(route('company.conference.conferenceBookings.index'));


    }

    /**
     * Display the specified ConferenceBooking.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $conferenceBooking = $this->conferenceBookingRepository->findWithoutFail($id);

        if (empty($conferenceBooking)) {
            Flash::error('Conference Booking not found');

            return redirect(route('company.conference.conferenceBookings.index'));
        }

        return view('company.Conference.conference_bookings.show')->with('conferenceBooking', $conferenceBooking);
    }

    /**
     * Show the form for editing the specified ConferenceBooking.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {


        $countries              = $this->countryRepository->all();
        $states                 = $this->stateRepository->all();
        $cities                 = $this->cityRepository->all();

        $conferenceBooking      = $this->conferenceBookingRepository->findWithoutFail($id);
        $paymentMethods         = $this->paymentMethodRepository->all();
        $conferenceDurations    = $this->conferenceDurationRepository->all();
        $roomLayouts            = $this->roomLayoutRepository->all();
        /*$equipments             = $this->equipmentRepository->all();
        $foodItems              = $this->foodRepository->all();
        $packages               = $this->packagesRepository->all();*/

        $equipments = CompanyArticle::where('category', 'equipment')->get();
        $foodItems  = CompanyArticle::where('category', 'food')->get();
        $packages   = CompanyArticle::where('category', 'food_package')->get();

        $generalSetting         = $this->generalSettingRepository->getBookingTaxValue();

        $getBookingPackagesItems        = $this->conferenceBookingItemRepository->getBookingPackagesItems($conferenceBooking->id);
        $getBookingEquipmentsItems      = $this->conferenceBookingItemRepository->getBookingEquipmentsItems($conferenceBooking->id);
        $getBookingFoodsItems           = $this->conferenceBookingItemRepository->getBookingFoodsItems($conferenceBooking->id);

        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $rooms                  = DB::table('rooms')->where('company_id', $company_id)->orderBy('name', 'asc')->get();
        $getCompanyCustomer = CompanyCustomer::where('company_id', $company_id)->get();
        $companyCustomerInfo = CompanyCustomer::where('id', $conferenceBooking->company_customer_id)->first();

        $bookingAgencies        = $this->bookingAgencyRepository->getCompanyBookingAgencies($company_id);


        $getBookingDraft = $this->conferenceBookingDraftRepository->getBookingDraftData($id);

        $getBookingSignage = $this->conferenceBookingSignageRepository->getBookingSignageData($id);

        if (empty($conferenceBooking)) {
            Flash::error('Conference Booking not found');

            return redirect(route('company.conference.conferenceBookings.index'));
        }



        $data = [
                    'getBookingSignage'       => $getBookingSignage,
                    'getBookingDraft'       => $getBookingDraft,
                    'companyCustomerInfo'   => $companyCustomerInfo,
                    'countries'             => $countries,
                    'states'                => $states,
                    'cities'                => $cities,
                    'getCompanyCustomer'    => $getCompanyCustomer,
                    'conferenceDurations'   => $conferenceDurations,
                    'paymentMethods'        => $paymentMethods,
                    'roomLayouts'           => $roomLayouts,
                    'equipments'            => $equipments,
                    'foodItems'             => $foodItems,
                    'rooms'                 => $rooms,
                    'packages'              => $packages,
                    'conferenceBooking'     => $conferenceBooking,
                    'getBookingPackagesItems'   => $getBookingPackagesItems,
                    'getBookingEquipmentsItems' => $getBookingEquipmentsItems,
                    'getBookingFoodsItems'      => $getBookingFoodsItems,
                    'generalSetting'        => $generalSetting,
                    'bookingAgencies'        => $bookingAgencies,
                    'roomCalenderId'        => "",
                ];


        return view('company.Conference.conference_bookings.edit', $data);
    }

    /**
     * Update the specified ConferenceBooking in storage.
     *
     * @param  int              $id
     * @param UpdateConferenceBookingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConferenceBookingRequest $request)
    {


        $input = $request->all();

        // dd($input);


        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;

        $updateCustomer = [
                                'address' => $request->customer_address,
                                'postal_code' => $request->customer_post_code,
                                'telephone' => $request->customer_telephone,
                                'mobile' => $request->customer_mobile,
                                'fax' => $request->customer_fax,
                                'organization_num' => $request->customer_org_num,
                                'invoice_send_as' => $request->invoice_send,
                                'reference' => $request->reference,
                                'contact_person' => $request->contact_person,
                                'payment_condition' => $request->payment_conditions,
                                'interest_fees' => $request->interest_fees,
                                'country_id' => $request->customer_country,
                                'state_id' => $request->customer_state,
                                'city_id' => $request->customer_city,
                                'peyment_reminder' => $request->payment_reminder,
                          ];


        CompanyCustomer::where('company_id', $company_id)->where('user_id', $request->customer_id)->update($updateCustomer);

        $updatedCustomerInfo = CompanyCustomer::where('company_id', $company_id)->where('user_id', $request->customer_id)->first();





        // ==========================================================================




        $input['company_customer_id'] = $updatedCustomerInfo->id;

        $booking_date   = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $input['booking_date'])));
        $start_datetime = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $input['start_datetime'])));
        $end_datetime   = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $input['end_datetime'])));

        $input['booking_date']      = $booking_date;
        $input['start_datetime']    = $start_datetime;
        $input['end_datetime']      = $end_datetime;

        if (empty($input['packages'])) {
            $input['package_price'] = 0.00;
        } 

        if (empty($input['foods'])) {
            $input['food_price'] = 0.00;
        } 

        if (empty($input['equipments'])) {
            $input['equipment_price'] = 0.00;
        } 

        $conferenceBooking = $this->conferenceBookingRepository->update($input, $id);








        // ==========================================================================


        if (!empty($input['packages'])) {

            $this->conferenceBookingItemRepository->deleteBookingPackages($input['packageBookingItemId']);

            $packagesUnit       = $input['packageUnits'];
            $packagesItemsID    = $input['packages'];

            $packagesData = array_intersect_key($packagesUnit, array_flip($packagesItemsID));

            foreach ($packagesData as $key=>$val) {

                // $package = $this->packagesRepository->findWithoutFail($key);
                $package   = CompanyArticle::where('id', $key)->where('category', 'food_package')->first();

                $packageInput['booking_id']    = $conferenceBooking->id;
                $packageInput['entity_id']     = $key;
                $packageInput['entity_type']   = "package";
                $packageInput['entity_name']   = $package->article_name_english;
                $packageInput['entity_price']  = $package->in_price;
                $packageInput['entity_qty']    = $val['qty'];

                $this->conferenceBookingItemRepository->create($packageInput);
            }

        }

        
        // ==========================================================================


        if (!empty($input['foods'])) {

            $this->conferenceBookingItemRepository->deleteBookingFood($input['foodBookingItemId']);

            $foodUnits      = $input['foodUnits'];
            $foodItemsID    = $input['foods'];

            $foodsData = array_intersect_key($foodUnits, array_flip($foodItemsID));

            foreach ($foodsData as $key=>$val) {

                // $food = $this->foodRepository->findWithoutFail($key);
                $food  = CompanyArticle::where('id', $key)->where('category', 'food')->first();

                $foodInput['booking_id']    = $conferenceBooking->id;
                $foodInput['entity_id']     = $key;
                $foodInput['entity_type']   = "food";
                $foodInput['entity_name']   = $food->article_name_english;
                $foodInput['entity_price']  = $food->in_price;
                $foodInput['entity_qty']    = $val['qty'];

                $this->conferenceBookingItemRepository->create($foodInput);
            }
        }


        // ==========================================================================


        if (!empty($input['equipments'])) {

            $this->conferenceBookingItemRepository->deleteBookingEqupment($input['equipmentsBookingItemId']);

            $equipmentsUnits      = $input['equipmentsUnits'];
            $equipmentsItemsID    = $input['equipments'];

            $equipmentsData = array_intersect_key($equipmentsUnits, array_flip($equipmentsItemsID));

            foreach ($equipmentsData as $key=>$val) {

                // $equipment = $this->equipmentRepository->findWithoutFail($key);
                $equipment = CompanyArticle::where('id', $key)->where('category', 'equipment')->first();

                $equipmentInput['booking_id']    = $conferenceBooking->id;
                $equipmentInput['entity_id']     = $key;
                $equipmentInput['entity_type']   = "equipments";
                $equipmentInput['entity_name']   = $equipment->article_name_english;
                $equipmentInput['entity_price']  = $equipment->in_price;
                $equipmentInput['entity_qty']    = $val['qty'];

                $this->conferenceBookingItemRepository->create($equipmentInput);
            }
        }


        // ==========================================================================

        $input['booking_id'] = $conferenceBooking->id;
        $this->conferenceBookingDraftRepository->update($input, $input['booking_draft_id']);


        // ==========================================================================


        if ($input['is_signage'] == 'on') { $input['is_signage'] = 1; }


        $createSignage = [
                                'booking_id' => $input['booking_id'],
                                'is_signage' => $input['is_signage'],
                                'first_name' => $input['signage_first_name'],
                                'first_screen_name' => $input['signage_first_screen_name'],
                                'second_name' => $input['signage_second_name'],
                                'second_screen_name' => $input['signage_second_screen_name'],
                        ];


        if ($request->hasFile('signage_first_logo')) {

            $path = $request->file('signage_first_logo')->store('public/booking_signage');
            $path = explode("/", $path);
            $createSignage['first_logo'] = $path[2];
        }


        if ($request->hasFile('signage_second_logo')) {

            $path = $request->file('signage_second_logo')->store('public/booking_signage');
            $path = explode("/", $path);
            $createSignage['second_logo'] = $path[2];
        }


        $this->conferenceBookingSignageRepository->update($createSignage, $input['booking_signage_id']);

        // ==========================================================================


        $conferenceBooking = $this->conferenceBookingRepository->findWithoutFail($id);

        if (empty($conferenceBooking)) {
            Flash::error('Conference Booking not found');

            return redirect(route('company.conference.conferenceBookings.index'));
        }

        Session::flash("successMessage", "The Conference Bookingk has been updated successfully.");

        return redirect(route('company.conference.conferenceBookings.index'));
    }

    /**
     * Remove the specified ConferenceBooking from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $conferenceBooking = $this->conferenceBookingRepository->findWithoutFail($id);

        if (empty($conferenceBooking)) {
            Flash::error('Conference Booking not found');

            return redirect(route('company.conference.conferenceBookings.index'));
        }

        $this->conferenceBookingRepository->delete($id);

        Session::flash("successMessage", "The Conference Bookingk has been deleted successfully.");

        return redirect(route('company.conference.conferenceBookings.index'));
    }







    public function viewCalender(Request $request) {

        $this->conferenceBookingRepository->pushCriteria(new RequestCriteria($request));

        $conferenceBookings     = $this->conferenceBookingRepository->all();
        $paymentMethods         = $this->paymentMethodRepository->all();
        $conferenceDurations    = $this->conferenceDurationRepository->all();
        $roomLayouts            = $this->roomLayoutRepository->all();
        $equipments             = $this->equipmentRepository->all();
        $foodItems              = $this->foodRepository->all();
        $company_id         =   Auth::guard('company')->user()->companyUser()->first()->company_id;
        $rooms                  = DB::table('rooms')->where('company_id', $company_id)->orderBy('name', 'asc')->get();

        $dataBooking = json_encode($conferenceBookings);
        $dataRooms = json_encode($rooms);

        $data = [
                    'conferenceBookings'    => $conferenceBookings,
                    'conferenceDurations'   => $conferenceDurations,
                    'paymentMethods'        => $paymentMethods,
                    'roomLayouts'           => $roomLayouts,
                    'equipments'            => $equipments,
                    'foodItems'             => $foodItems,
                    'dataBooking'           => $dataBooking,
                    'dataRooms'             => $dataRooms,
                ];

        return view('company.Conference.conference_calender.view', $data);
    
    }







}
