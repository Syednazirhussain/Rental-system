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

use Auth;
use App\Models\CompanyBuilding;
use App\Models\Equipments;

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
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $buildings = CompanyBuilding::where('company_id',$company_id)->get();
        $equipments = Equipments::all();

        $data = [
            'buildings' => $buildings,
            'equipments' => $equipments
        ];

        return view('company.room_equipments.create',$data);
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

        if($roomEquipments)
        {
            session()->flash('msg.success','Room Equipments saved successfully.');
        }
        else
        {
            session()->flash('msg.error','Room Equipments are not saved');
        }

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

        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $buildings = CompanyBuilding::where('company_id',$company_id)->get();
        $equipments = Equipments::all();

        if (empty($roomEquipments)) 
        {
            session()->flash('msg.error','Room Equipments not found');
            return redirect(route('company.roomEquipments.index'));
        }

        $data = [
            'buildings' => $buildings,
            'equipments' => $equipments,
            'roomEquipments' => $roomEquipments
        ];

        return view('company.room_equipments.edit',$data);
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

        if (empty($roomEquipments)) 
        {
            session()->flash('msg.error','Room Equipments not found');
            return redirect(route('company.roomEquipments.index'));
        }

        $roomEquipments = $this->roomEquipmentsRepository->update($request->all(), $id);

        if($roomEquipments)
        {
            session()->flash('msg.success','Room Equipments updated successfully.');
        }
        else
        {
            session()->flash('msg.error','Room Equipments are not updated');
        }

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
