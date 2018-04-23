<?php

namespace App\Http\Controllers\Company/conference;

use App\Http\Requests\Company/conference\CreateConferenceBookingItemRequest;
use App\Http\Requests\Company/conference\UpdateConferenceBookingItemRequest;
use App\Repositories\Company/conference\ConferenceBookingItemRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ConferenceBookingItemController extends AppBaseController
{
    /** @var  ConferenceBookingItemRepository */
    private $conferenceBookingItemRepository;

    public function __construct(ConferenceBookingItemRepository $conferenceBookingItemRepo)
    {
        $this->conferenceBookingItemRepository = $conferenceBookingItemRepo;
    }

    /**
     * Display a listing of the ConferenceBookingItem.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->conferenceBookingItemRepository->pushCriteria(new RequestCriteria($request));
        $conferenceBookingItems = $this->conferenceBookingItemRepository->all();

        return view('company.Conference.conference_booking_items.index')
            ->with('conferenceBookingItems', $conferenceBookingItems);
    }

    /**
     * Show the form for creating a new ConferenceBookingItem.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.Conference.conference_booking_items.create');
    }

    /**
     * Store a newly created ConferenceBookingItem in storage.
     *
     * @param CreateConferenceBookingItemRequest $request
     *
     * @return Response
     */
    public function store(CreateConferenceBookingItemRequest $request)
    {
        $input = $request->all();

        $conferenceBookingItem = $this->conferenceBookingItemRepository->create($input);

        Flash::success('Conference Booking Item saved successfully.');

        return redirect(route('company/Conference.conferenceBookingItems.index'));
    }

    /**
     * Display the specified ConferenceBookingItem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $conferenceBookingItem = $this->conferenceBookingItemRepository->findWithoutFail($id);

        if (empty($conferenceBookingItem)) {
            Flash::error('Conference Booking Item not found');

            return redirect(route('company/Conference.conferenceBookingItems.index'));
        }

        return view('company.Conference.conference_booking_items.show')->with('conferenceBookingItem', $conferenceBookingItem);
    }

    /**
     * Show the form for editing the specified ConferenceBookingItem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $conferenceBookingItem = $this->conferenceBookingItemRepository->findWithoutFail($id);

        if (empty($conferenceBookingItem)) {
            Flash::error('Conference Booking Item not found');

            return redirect(route('company/Conference.conferenceBookingItems.index'));
        }

        return view('company.Conference.conference_booking_items.edit')->with('conferenceBookingItem', $conferenceBookingItem);
    }

    /**
     * Update the specified ConferenceBookingItem in storage.
     *
     * @param  int              $id
     * @param UpdateConferenceBookingItemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConferenceBookingItemRequest $request)
    {
        $conferenceBookingItem = $this->conferenceBookingItemRepository->findWithoutFail($id);

        if (empty($conferenceBookingItem)) {
            Flash::error('Conference Booking Item not found');

            return redirect(route('company/Conference.conferenceBookingItems.index'));
        }

        $conferenceBookingItem = $this->conferenceBookingItemRepository->update($request->all(), $id);

        Flash::success('Conference Booking Item updated successfully.');

        return redirect(route('company/Conference.conferenceBookingItems.index'));
    }

    /**
     * Remove the specified ConferenceBookingItem from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $conferenceBookingItem = $this->conferenceBookingItemRepository->findWithoutFail($id);

        if (empty($conferenceBookingItem)) {
            Flash::error('Conference Booking Item not found');

            return redirect(route('company/Conference.conferenceBookingItems.index'));
        }

        $this->conferenceBookingItemRepository->delete($id);

        Flash::success('Conference Booking Item deleted successfully.');

        return redirect(route('company/Conference.conferenceBookingItems.index'));
    }
}
