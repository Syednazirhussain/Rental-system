<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreateConferenceBookingNotesRequest;
use App\Http\Requests\Company\UpdateConferenceBookingNotesRequest;
use App\Repositories\Company\ConferenceBookingNotesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ConferenceBookingNotesController extends AppBaseController
{
    /** @var  ConferenceBookingNotesRepository */
    private $conferenceBookingNotesRepository;

    public function __construct(ConferenceBookingNotesRepository $conferenceBookingNotesRepo)
    {
        $this->conferenceBookingNotesRepository = $conferenceBookingNotesRepo;
    }

    /**
     * Display a listing of the ConferenceBookingNotes.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->conferenceBookingNotesRepository->pushCriteria(new RequestCriteria($request));
        $conferenceBookingNotes = $this->conferenceBookingNotesRepository->all();

        return view('company.conference_booking_notes.index')
            ->with('conferenceBookingNotes', $conferenceBookingNotes);
    }

    /**
     * Show the form for creating a new ConferenceBookingNotes.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.conference_booking_notes.create');
    }

    /**
     * Store a newly created ConferenceBookingNotes in storage.
     *
     * @param CreateConferenceBookingNotesRequest $request
     *
     * @return Response
     */
    public function store(CreateConferenceBookingNotesRequest $request)
    {
        $input = $request->all();

        $conferenceBookingNotes = $this->conferenceBookingNotesRepository->create($input);

        Flash::success('Conference Booking Notes saved successfully.');

        return redirect(route('company.conferenceBookingNotes.index'));
    }

    /**
     * Display the specified ConferenceBookingNotes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $conferenceBookingNotes = $this->conferenceBookingNotesRepository->findWithoutFail($id);

        if (empty($conferenceBookingNotes)) {
            Flash::error('Conference Booking Notes not found');

            return redirect(route('company.conferenceBookingNotes.index'));
        }

        return view('company.conference_booking_notes.show')->with('conferenceBookingNotes', $conferenceBookingNotes);
    }

    /**
     * Show the form for editing the specified ConferenceBookingNotes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $conferenceBookingNotes = $this->conferenceBookingNotesRepository->findWithoutFail($id);

        if (empty($conferenceBookingNotes)) {
            Flash::error('Conference Booking Notes not found');

            return redirect(route('company.conferenceBookingNotes.index'));
        }

        return view('company.conference_booking_notes.edit')->with('conferenceBookingNotes', $conferenceBookingNotes);
    }

    /**
     * Update the specified ConferenceBookingNotes in storage.
     *
     * @param  int              $id
     * @param UpdateConferenceBookingNotesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConferenceBookingNotesRequest $request)
    {
        $conferenceBookingNotes = $this->conferenceBookingNotesRepository->findWithoutFail($id);

        if (empty($conferenceBookingNotes)) {
            Flash::error('Conference Booking Notes not found');

            return redirect(route('company.conferenceBookingNotes.index'));
        }

        $conferenceBookingNotes = $this->conferenceBookingNotesRepository->update($request->all(), $id);

        Flash::success('Conference Booking Notes updated successfully.');

        return redirect(route('company.conferenceBookingNotes.index'));
    }

    /**
     * Remove the specified ConferenceBookingNotes from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $conferenceBookingNotes = $this->conferenceBookingNotesRepository->findWithoutFail($id);

        if (empty($conferenceBookingNotes)) {
            Flash::error('Conference Booking Notes not found');

            return redirect(route('company.conferenceBookingNotes.index'));
        }

        $this->conferenceBookingNotesRepository->delete($id);

        Flash::success('Conference Booking Notes deleted successfully.');

        return redirect(route('company.conferenceBookingNotes.index'));
    }
}
