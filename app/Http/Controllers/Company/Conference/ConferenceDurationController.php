<?php

namespace App\Http\Controllers\Company/conference;

use App\Http\Requests\Company/conference\CreateConferenceDurationRequest;
use App\Http\Requests\Company/conference\UpdateConferenceDurationRequest;
use App\Repositories\Company/conference\ConferenceDurationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ConferenceDurationController extends AppBaseController
{
    /** @var  ConferenceDurationRepository */
    private $conferenceDurationRepository;

    public function __construct(ConferenceDurationRepository $conferenceDurationRepo)
    {
        $this->conferenceDurationRepository = $conferenceDurationRepo;
    }

    /**
     * Display a listing of the ConferenceDuration.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->conferenceDurationRepository->pushCriteria(new RequestCriteria($request));
        $conferenceDurations = $this->conferenceDurationRepository->all();

        return view('company.Conference.conference_durations.index')
            ->with('conferenceDurations', $conferenceDurations);
    }

    /**
     * Show the form for creating a new ConferenceDuration.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.Conference.conference_durations.create');
    }

    /**
     * Store a newly created ConferenceDuration in storage.
     *
     * @param CreateConferenceDurationRequest $request
     *
     * @return Response
     */
    public function store(CreateConferenceDurationRequest $request)
    {
        $input = $request->all();

        $conferenceDuration = $this->conferenceDurationRepository->create($input);

        Flash::success('Conference Duration saved successfully.');

        return redirect(route('company/Conference.conferenceDurations.index'));
    }

    /**
     * Display the specified ConferenceDuration.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $conferenceDuration = $this->conferenceDurationRepository->findWithoutFail($id);

        if (empty($conferenceDuration)) {
            Flash::error('Conference Duration not found');

            return redirect(route('company/Conference.conferenceDurations.index'));
        }

        return view('company.Conference.conference_durations.show')->with('conferenceDuration', $conferenceDuration);
    }

    /**
     * Show the form for editing the specified ConferenceDuration.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $conferenceDuration = $this->conferenceDurationRepository->findWithoutFail($id);

        if (empty($conferenceDuration)) {
            Flash::error('Conference Duration not found');

            return redirect(route('company/Conference.conferenceDurations.index'));
        }

        return view('company.Conference.conference_durations.edit')->with('conferenceDuration', $conferenceDuration);
    }

    /**
     * Update the specified ConferenceDuration in storage.
     *
     * @param  int              $id
     * @param UpdateConferenceDurationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConferenceDurationRequest $request)
    {
        $conferenceDuration = $this->conferenceDurationRepository->findWithoutFail($id);

        if (empty($conferenceDuration)) {
            Flash::error('Conference Duration not found');

            return redirect(route('company/Conference.conferenceDurations.index'));
        }

        $conferenceDuration = $this->conferenceDurationRepository->update($request->all(), $id);

        Flash::success('Conference Duration updated successfully.');

        return redirect(route('company/Conference.conferenceDurations.index'));
    }

    /**
     * Remove the specified ConferenceDuration from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $conferenceDuration = $this->conferenceDurationRepository->findWithoutFail($id);

        if (empty($conferenceDuration)) {
            Flash::error('Conference Duration not found');

            return redirect(route('company/Conference.conferenceDurations.index'));
        }

        $this->conferenceDurationRepository->delete($id);

        Flash::success('Conference Duration deleted successfully.');

        return redirect(route('company/Conference.conferenceDurations.index'));
    }
}
