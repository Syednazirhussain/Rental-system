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
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
use Session;


class ConferenceBookingController extends AppBaseController
{
    /** @var  ConferenceBookingRepository */
    private $conferenceBookingRepository;
    private $conferenceBookingItemRepository;
    private $roomLayoutRepository;
    private $conferenceDurationRepository;
    private $equipmentRepository;
    private $paymentMethodRepository;
    private $foodRepository;
    private $packagesRepository;

    public function __construct(ConferenceBookingRepository $conferenceBookingRepo,
                                ConferenceBookingItemRepository $conferenceBookingItemRepo,
                                RoomLayoutRepository $roomLayoutRepo,
                                EquipmentsRepository $equipmentRepo,
                                PaymentMethodRepository $paymentMethodRepo,
                                FoodRepository $foodRepo,
                                ConferenceDurationRepository $conferenceDurationRepo,
                                PackagesRepository $packagesRepo
                                )
    {
        $this->conferenceBookingRepository      = $conferenceBookingRepo;
        $this->conferenceBookingItemRepository  = $conferenceBookingItemRepo;
        $this->roomLayoutRepository             = $roomLayoutRepo;
        $this->conferenceDurationRepository     = $conferenceDurationRepo;
        $this->equipmentRepository              = $equipmentRepo;
        $this->paymentMethodRepository          = $paymentMethodRepo;
        $this->foodRepository                   = $foodRepo;
        $this->packagesRepository               = $packagesRepo;
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
    public function create()
    {
        $conferenceBookings     = $this->conferenceBookingRepository->all();
        $paymentMethods         = $this->paymentMethodRepository->all();
        $conferenceDurations    = $this->conferenceDurationRepository->all();
        $roomLayouts            = $this->roomLayoutRepository->all();
        $equipments             = $this->equipmentRepository->all();
        $foodItems              = $this->foodRepository->all();
        $packages               = $this->packagesRepository->all();
        $rooms                  = DB::table('rooms')->orderBy('name', 'asc')->get();

        // dd($rooms);

        $data = [
                'conferenceBookings'    => $conferenceBookings,
                'conferenceDurations'   => $conferenceDurations,
                'paymentMethods'        => $paymentMethods,
                'roomLayouts'           => $roomLayouts,
                'equipments'            => $equipments,
                'foodItems'             => $foodItems,
                'rooms'                 => $rooms,
                'packages'              => $packages,
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

        // ==========================================================================

        $input['customer_id'] = '1';

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
    public function edit($id)
    {

        $conferenceBooking      = $this->conferenceBookingRepository->findWithoutFail($id);
        $paymentMethods         = $this->paymentMethodRepository->all();
        $conferenceDurations    = $this->conferenceDurationRepository->all();
        $roomLayouts            = $this->roomLayoutRepository->all();
        $equipments             = $this->equipmentRepository->all();
        $foodItems              = $this->foodRepository->all();
        $packages               = $this->packagesRepository->all();
        $rooms                  = DB::table('rooms')->orderBy('name', 'asc')->get();

        $bookingItems           = $this->conferenceBookingItemRepository->getBookingItems($conferenceBooking->id);


        if (empty($conferenceBooking)) {
            Flash::error('Conference Booking not found');

            return redirect(route('company.conference.conferenceBookings.index'));
        }

        foreach ($bookingItems as $key => $value) {
        
            // echo $value['entity_type'] . "..." . $value['entity_id'];
            echo "<pre>";
            print_r($value->entity_type);
            echo "</pre>";

        }

        // dd($bookingItems);

        exit();

        $data = [
                'conferenceDurations'   => $conferenceDurations,
                'paymentMethods'        => $paymentMethods,
                'roomLayouts'           => $roomLayouts,
                'equipments'            => $equipments,
                'foodItems'             => $foodItems,
                'rooms'                 => $rooms,
                'packages'              => $packages,
                'conferenceBooking'     => $conferenceBooking,
                'bookingItems'          => $bookingItems,
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

        dd($request->all());

        $conferenceBooking = $this->conferenceBookingRepository->findWithoutFail($id);

        if (empty($conferenceBooking)) {
            Flash::error('Conference Booking not found');

            return redirect(route('company.conference.conferenceBookings.index'));
        }

        $conferenceBooking = $this->conferenceBookingRepository->update($request->all(), $id);

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
}
