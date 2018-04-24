<?php

namespace App\Http\Controllers\Company\Conference;

use App\Http\Requests\Company\Conference\CreateConferenceBookingRequest;
use App\Http\Requests\Company\Conference\UpdateConferenceBookingRequest;
use App\Repositories\ConferenceBookingRepository;
use App\Repositories\RoomLayoutRepository;
use App\Repositories\ConferenceDurationRepository;
use App\Repositories\EquipmentsRepository;
use App\Repositories\PaymentMethodRepository;
use App\Repositories\FoodRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;

class ConferenceBookingController extends AppBaseController
{
    /** @var  ConferenceBookingRepository */
    private $conferenceBookingRepository;
    private $roomLayoutRepository;
    private $conferenceDurationRepository;
    private $equipmentRepository;
    private $paymentMethodRepository;
    private $foodRepository;

    public function __construct(ConferenceBookingRepository $conferenceBookingRepo,
                                RoomLayoutRepository $roomLayoutRepo,
                                EquipmentsRepository $equipmentRepo,
                                PaymentMethodRepository $paymentMethodRepo,
                                FoodRepository $foodRepo,
                                ConferenceDurationRepository $conferenceDurationRepo
                                )
    {
        $this->conferenceBookingRepository = $conferenceBookingRepo;
        $this->roomLayoutRepository = $roomLayoutRepo;
        $this->conferenceDurationRepository = $conferenceDurationRepo;
        $this->equipmentRepository = $equipmentRepo;
        $this->paymentMethodRepository = $paymentMethodRepo;
        $this->foodRepository = $foodRepo;
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
        $conferenceBookings = $this->conferenceBookingRepository->all();
        $paymentMethods = $this->paymentMethodRepository->all();
        $conferenceDurations = $this->conferenceDurationRepository->all();
        $roomLayouts = $this->roomLayoutRepository->all();
        $equipments = $this->equipmentRepository->all();
        $foodItems = $this->foodRepository->all();
        $rooms = DB::table('rooms')->orderBy('name', 'asc')->get();

        // dd($rooms);

        $data = [
                'conferenceBookings' => $conferenceBookings,
                'conferenceDurations' => $conferenceDurations,
                'paymentMethods' => $paymentMethods,
                'roomLayouts' => $roomLayouts,
                'equipments' => $equipments,
                'foodItems' => $foodItems,
                'rooms' => $rooms,

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

        $conferenceBooking = $this->conferenceBookingRepository->create($input);

        Flash::success('Conference Booking saved successfully.');

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
        $conferenceBooking = $this->conferenceBookingRepository->findWithoutFail($id);

        if (empty($conferenceBooking)) {
            Flash::error('Conference Booking not found');

            return redirect(route('company.conference.conferenceBookings.index'));
        }

        return view('company.Conference.conference_bookings.edit')->with('conferenceBooking', $conferenceBooking);
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
        $conferenceBooking = $this->conferenceBookingRepository->findWithoutFail($id);

        if (empty($conferenceBooking)) {
            Flash::error('Conference Booking not found');

            return redirect(route('company.conference.conferenceBookings.index'));
        }

        $conferenceBooking = $this->conferenceBookingRepository->update($request->all(), $id);

        Flash::success('Conference Booking updated successfully.');

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

        Flash::success('Conference Booking deleted successfully.');

        return redirect(route('company.conference.conferenceBookings.index'));
    }
}
