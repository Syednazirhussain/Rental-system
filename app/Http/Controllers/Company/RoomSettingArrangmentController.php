<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreateRoomSettingArrangmentRequest;
use App\Http\Requests\Company\UpdateRoomSettingArrangmentRequest;
use App\Repositories\Company\RoomSettingArrangmentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RoomSettingArrangmentController extends AppBaseController
{
    /** @var  RoomSettingArrangmentRepository */
    private $roomSettingArrangmentRepository;

    public function __construct(RoomSettingArrangmentRepository $roomSettingArrangmentRepo)
    {
        $this->roomSettingArrangmentRepository = $roomSettingArrangmentRepo;
    }

    /**
     * Display a listing of the RoomSettingArrangment.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roomSettingArrangmentRepository->pushCriteria(new RequestCriteria($request));
        $roomSettingArrangments = $this->roomSettingArrangmentRepository->all();

        return view('company.room_setting_arrangments.index')
            ->with('roomSettingArrangments', $roomSettingArrangments);
    }

    /**
     * Show the form for creating a new RoomSettingArrangment.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.room_setting_arrangments.create');
    }

    /**
     * Store a newly created RoomSettingArrangment in storage.
     *
     * @param CreateRoomSettingArrangmentRequest $request
     *
     * @return Response
     */
    public function store(CreateRoomSettingArrangmentRequest $request)
    {
        $input = $request->all();

        $roomSettingArrangment = $this->roomSettingArrangmentRepository->create($input);

        Flash::success('Room Setting Arrangment saved successfully.');

        return redirect(route('company.roomSettingArrangments.index'));
    }

    /**
     * Display the specified RoomSettingArrangment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $roomSettingArrangment = $this->roomSettingArrangmentRepository->findWithoutFail($id);

        if (empty($roomSettingArrangment)) {
            Flash::error('Room Setting Arrangment not found');

            return redirect(route('company.roomSettingArrangments.index'));
        }

        return view('company.room_setting_arrangments.show')->with('roomSettingArrangment', $roomSettingArrangment);
    }

    /**
     * Show the form for editing the specified RoomSettingArrangment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roomSettingArrangment = $this->roomSettingArrangmentRepository->findWithoutFail($id);

        if (empty($roomSettingArrangment)) {
            Flash::error('Room Setting Arrangment not found');

            return redirect(route('company.roomSettingArrangments.index'));
        }

        return view('company.room_setting_arrangments.edit')->with('roomSettingArrangment', $roomSettingArrangment);
    }

    /**
     * Update the specified RoomSettingArrangment in storage.
     *
     * @param  int              $id
     * @param UpdateRoomSettingArrangmentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoomSettingArrangmentRequest $request)
    {
        $roomSettingArrangment = $this->roomSettingArrangmentRepository->findWithoutFail($id);

        if (empty($roomSettingArrangment)) {
            Flash::error('Room Setting Arrangment not found');

            return redirect(route('company.roomSettingArrangments.index'));
        }

        $roomSettingArrangment = $this->roomSettingArrangmentRepository->update($request->all(), $id);

        Flash::success('Room Setting Arrangment updated successfully.');

        return redirect(route('company.roomSettingArrangments.index'));
    }

    /**
     * Remove the specified RoomSettingArrangment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $roomSettingArrangment = $this->roomSettingArrangmentRepository->findWithoutFail($id);

        if (empty($roomSettingArrangment)) {
            Flash::error('Room Setting Arrangment not found');

            return redirect(route('company.roomSettingArrangments.index'));
        }

        $this->roomSettingArrangmentRepository->delete($id);

        Flash::success('Room Setting Arrangment deleted successfully.');

        return redirect(route('company.roomSettingArrangments.index'));
    }
}
