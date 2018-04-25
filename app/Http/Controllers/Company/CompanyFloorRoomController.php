<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Admin\CreateCompanyFloorRoomRequest;
use App\Http\Requests\Admin\UpdateCompanyFloorRoomRequest;
use App\Repositories\Admin\CompanyFloorRoomRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use App\Models\Company;
use App\Models\CompanyBuilding;
use App\Models\CompanyFloorRoom;

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
        $company_id = Auth::user()->companyUser()->first()->company_id;
        $company = Company::find($company_id);
        $companyBuildings = CompanyBuilding::pluck('name', 'id');
        $companyFloorRooms = CompanyFloorRoom::where('company_id', $company_id)->get();

        return view('company.company_floor_rooms.index', ['companyFloorRooms' => $companyFloorRooms,
            'company' => $company, 'companyBuildings' => $companyBuildings]);
    }

    /**
     * Show the form for creating a new CompanyFloorRoom.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.company_floor_rooms.create');
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

        return redirect(route('company.companyFloorRooms.index'));
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
        $company_id = Auth::user()->companyUser()->first()->company_id;
        $company = Company::find($company_id);
        $companyBuildings = CompanyBuilding::pluck('name', 'id');
        $companyFloorRoom = $this->companyFloorRoomRepository->findWithoutFail($id);

        if (empty($companyFloorRoom)) {
            Flash::error('Company Floor Room not found');

            return redirect(route('company.companyFloorRooms.index'));
        }

        return view('company.company_floor_rooms.show', ['companyFloorRoom' => $companyFloorRoom,
            'company' => $company, 'companyBuildings' => $companyBuildings]);
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
        $company_id = Auth::user()->companyUser()->first()->company_id;
        $company = Company::find($company_id);
        $companyBuildings = CompanyBuilding::pluck('name', 'id');
        $companyFloorRoom = $this->companyFloorRoomRepository->findWithoutFail($id);

        if (empty($companyFloorRoom)) {
            Flash::error('Company Floor Room not found');

            return redirect(route('company.companyFloorRooms.index'));
        }

        return view('company.company_floor_rooms.edit', ['companyFloorRoom' => $companyFloorRoom,
            'company' => $company, 'companyBuildings' => $companyBuildings]);
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

            return redirect(route('company.companyFloorRooms.index'));
        }

        $this->companyFloorRoomRepository->update($request->all(), $id);
        $request->session()->flash('msg.success', 'Company Floor Room updated successfully.');

        return redirect(route('company.companyFloorRooms.index'));
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

            return redirect(route('company.companyFloorRooms.index'));
        }

        $this->companyFloorRoomRepository->delete($id);

        Flash::success('Company Floor Room deleted successfully.');

        return redirect(route('company.companyFloorRooms.index'));
    }
}
