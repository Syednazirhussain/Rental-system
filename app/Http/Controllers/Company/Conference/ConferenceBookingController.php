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
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
use Auth;
use Session;
use App\Models\CompanyCustomer;

class ConferenceBookingController extends AppBaseController
{
    /** @var  ConferenceBookingRepository */
    private $conferenceBookingRepository;
    private $conferenceBookingItemRepository;
    private $conferenceBookingDraftRepository;
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





        $conferenceBookings     = $this->conferenceBookingRepository->all();
        $paymentMethods         = $this->paymentMethodRepository->all();
        $conferenceDurations    = $this->conferenceDurationRepository->all();
        $roomLayouts            = $this->roomLayoutRepository->all();
        $equipments             = $this->equipmentRepository->all();
        $foodItems              = $this->foodRepository->all();
        $packages               = $this->packagesRepository->all();
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

        dd($input);

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


        if (!empty($input['packages'])) {

            $packagesUnit       = $input['packageUnits'];
            $packagesItemsID    = $input['packages'];

            $packagesData = array_intersect_key($packagesUnit, array_flip($packagesItemsID));

            foreach ($packagesData as $key=>$val) {

                $package = $this->packagesRepository->findWithoutFail($key);

                $packageInput['booking_id']    = $conferenceBooking->id;
                $packageInput['entity_id']     = $key;
                $packageInput['entity_type']   = "package";
                $packageInput['entity_name']   = $package->title;
                $packageInput['entity_price']  = $package->price;
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

                $food = $this->foodRepository->findWithoutFail($key);

                $foodInput['booking_id']    = $conferenceBooking->id;
                $foodInput['entity_id']     = $key;
                $foodInput['entity_type']   = "food";
                $foodInput['entity_name']   = $food->title;
                $foodInput['entity_price']  = $food->price_per_attendee;
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

                $equipment = $this->equipmentRepository->findWithoutFail($key);

                $equipmentInput['booking_id']    = $conferenceBooking->id;
                $equipmentInput['entity_id']     = $key;
                $equipmentInput['entity_type']   = "equipments";
                $equipmentInput['entity_name']   = $equipment->title;
                $equipmentInput['entity_price']  = $equipment->price;
                $equipmentInput['entity_qty']    = $val['qty'];

                $this->conferenceBookingItemRepository->create($equipmentInput);
            }
        }


        // ==========================================================================

        $input['booking_id'] = $conferenceBooking->id;
        $this->conferenceBookingDraftRepository->create($input);

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
        $equipments             = $this->equipmentRepository->all();
        $foodItems              = $this->foodRepository->all();
        $packages               = $this->packagesRepository->all();

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


        if (empty($conferenceBooking)) {
            Flash::error('Conference Booking not found');

            return redirect(route('company.conference.conferenceBookings.index'));
        }



        $data = [
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

                $package = $this->packagesRepository->findWithoutFail($key);

                $packageInput['booking_id']    = $conferenceBooking->id;
                $packageInput['entity_id']     = $key;
                $packageInput['entity_type']   = "package";
                $packageInput['entity_name']   = $package->title;
                $packageInput['entity_price']  = $package->price;
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

                $food = $this->foodRepository->findWithoutFail($key);

                $foodInput['booking_id']    = $conferenceBooking->id;
                $foodInput['entity_id']     = $key;
                $foodInput['entity_type']   = "food";
                $foodInput['entity_name']   = $food->title;
                $foodInput['entity_price']  = $food->price_per_attendee;
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

                $equipment = $this->equipmentRepository->findWithoutFail($key);

                $equipmentInput['booking_id']    = $conferenceBooking->id;
                $equipmentInput['entity_id']     = $key;
                $equipmentInput['entity_type']   = "equipments";
                $equipmentInput['entity_name']   = $equipment->title;
                $equipmentInput['entity_price']  = $equipment->price;
                $equipmentInput['entity_qty']    = $val['qty'];

                $this->conferenceBookingItemRepository->create($equipmentInput);
            }
        }


        // ==========================================================================

        $input['booking_id'] = $conferenceBooking->id;
        $this->conferenceBookingDraftRepository->update($input, $input['booking_draft_id']);

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
