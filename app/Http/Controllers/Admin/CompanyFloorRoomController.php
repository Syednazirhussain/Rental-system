<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateCompanyFloorRoomRequest;
use App\Http\Requests\Admin\UpdateCompanyFloorRoomRequest;
use App\Repositories\Admin\CompanyFloorRoomRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CompanyFloorRoomController extends AppBaseController
{
    /** @var  CompanyFloorRoomRepository */
    private $companyFloorRoomRepository;

    public function __construct(CompanyFloorRoomRepository $companyFloorRoomRepo)
    {
        $this->companyFloorRoomRepository = $companyFloorRoomRepo;
    }

    /**
     * Display a listing of the CompanyFloorRoom.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyFloorRoomRepository->pushCriteria(new RequestCriteria($request));
        $companyFloorRooms = $this->companyFloorRoomRepository->all();

        return view('admin.company_floor_rooms.index')
            ->with('companyFloorRooms', $companyFloorRooms);
    }

    /**
     * Show the form for creating a new CompanyFloorRoom.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.company_floor_rooms.create');
    }

    /**
     * Store a newly created CompanyFloorRoom in storage.
     *
     * @param CreateCompanyFloorRoomRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyFloorRoomRequest $request)
    {
        $input = $request->all();

        $companyFloorRoom = $this->companyFloorRoomRepository->create($input);

        Flash::success('Company Floor Room saved successfully.');

        return redirect(route('admin.companyFloorRooms.index'));
    }

    /**
     * Display the specified CompanyFloorRoom.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companyFloorRoom = $this->companyFloorRoomRepository->findWithoutFail($id);

        if (empty($companyFloorRoom)) {
            Flash::error('Company Floor Room not found');

            return redirect(route('admin.companyFloorRooms.index'));
        }

        return view('admin.company_floor_rooms.show')->with('companyFloorRoom', $companyFloorRoom);
    }

    /**
     * Show the form for editing the specified CompanyFloorRoom.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companyFloorRoom = $this->companyFloorRoomRepository->findWithoutFail($id);

        if (empty($companyFloorRoom)) {
            Flash::error('Company Floor Room not found');

            return redirect(route('admin.companyFloorRooms.index'));
        }

        return view('admin.company_floor_rooms.edit')->with('companyFloorRoom', $companyFloorRoom);
    }

    /**
     * Update the specified CompanyFloorRoom in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyFloorRoomRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyFloorRoomRequest $request)
    {
        $companyFloorRoom = $this->companyFloorRoomRepository->findWithoutFail($id);

        if (empty($companyFloorRoom)) {
            Flash::error('Company Floor Room not found');

            return redirect(route('admin.companyFloorRooms.index'));
        }

        $companyFloorRoom = $this->companyFloorRoomRepository->update($request->all(), $id);

        Flash::success('Company Floor Room updated successfully.');

        return redirect(route('admin.companyFloorRooms.index'));
    }

    /**
     * Remove the specified CompanyFloorRoom from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companyFloorRoom = $this->companyFloorRoomRepository->findWithoutFail($id);

        if (empty($companyFloorRoom)) {
            Flash::error('Company Floor Room not found');

            return redirect(route('admin.companyFloorRooms.index'));
        }

        $this->companyFloorRoomRepository->delete($id);

        Flash::success('Company Floor Room deleted successfully.');

        return redirect(route('admin.companyFloorRooms.index'));
    }
}
