<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreateRoomEquipmentsRequest;
use App\Http\Requests\Company\UpdateRoomEquipmentsRequest;
use App\Repositories\Company\RoomEquipmentsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RoomEquipmentsController extends AppBaseController
{
    /** @var  RoomEquipmentsRepository */
    private $roomEquipmentsRepository;

    public function __construct(RoomEquipmentsRepository $roomEquipmentsRepo)
    {
        $this->roomEquipmentsRepository = $roomEquipmentsRepo;
    }

    /**
     * Display a listing of the RoomEquipments.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roomEquipmentsRepository->pushCriteria(new RequestCriteria($request));
        $roomEquipments = $this->roomEquipmentsRepository->all();

        return view('company.room_equipments.index')
            ->with('roomEquipments', $roomEquipments);
    }

    /**
     * Show the form for creating a new RoomEquipments.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.room_equipments.create');
    }

    /**
     * Store a newly created RoomEquipments in storage.
     *
     * @param CreateRoomEquipmentsRequest $request
     *
     * @return Response
     */
    public function store(CreateRoomEquipmentsRequest $request)
    {
        $input = $request->all();

        $roomEquipments = $this->roomEquipmentsRepository->create($input);

        Flash::success('Room Equipments saved successfully.');

        return redirect(route('company.roomEquipments.index'));
    }

    /**
     * Display the specified RoomEquipments.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $roomEquipments = $this->roomEquipmentsRepository->findWithoutFail($id);

        if (empty($roomEquipments)) {
            Flash::error('Room Equipments not found');

            return redirect(route('company.roomEquipments.index'));
        }

        return view('company.room_equipments.show')->with('roomEquipments', $roomEquipments);
    }

    /**
     * Show the form for editing the specified RoomEquipments.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roomEquipments = $this->roomEquipmentsRepository->findWithoutFail($id);

        if (empty($roomEquipments)) {
            Flash::error('Room Equipments not found');

            return redirect(route('company.roomEquipments.index'));
        }

        return view('company.room_equipments.edit')->with('roomEquipments', $roomEquipments);
    }

    /**
     * Update the specified RoomEquipments in storage.
     *
     * @param  int              $id
     * @param UpdateRoomEquipmentsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoomEquipmentsRequest $request)
    {
        $roomEquipments = $this->roomEquipmentsRepository->findWithoutFail($id);

        if (empty($roomEquipments)) {
            Flash::error('Room Equipments not found');

            return redirect(route('company.roomEquipments.index'));
        }

        $roomEquipments = $this->roomEquipmentsRepository->update($request->all(), $id);

        Flash::success('Room Equipments updated successfully.');

        return redirect(route('company.roomEquipments.index'));
    }

    /**
     * Remove the specified RoomEquipments from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $roomEquipments = $this->roomEquipmentsRepository->findWithoutFail($id);

        if (empty($roomEquipments)) {
            Flash::error('Room Equipments not found');

            return redirect(route('company.roomEquipments.index'));
        }

        $this->roomEquipmentsRepository->delete($id);

        Flash::success('Room Equipments deleted successfully.');

        return redirect(route('company.roomEquipments.index'));
    }
}
