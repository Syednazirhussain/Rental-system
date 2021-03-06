<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreateRoomNotesRequest;
use App\Http\Requests\Company\UpdateRoomNotesRequest;
use App\Repositories\Company\RoomNotesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use Auth;
use App\Models\User;
use App\Models\CompanyBuilding;


class RoomNotesController extends AppBaseController
{
    /** @var  RoomNotesRepository */
    private $roomNotesRepository;

    public function __construct(RoomNotesRepository $roomNotesRepo)
    {
        $this->roomNotesRepository = $roomNotesRepo;
    }

    /**
     * Display a listing of the RoomNotes.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roomNotesRepository->pushCriteria(new RequestCriteria($request));
        $roomNotes = $this->roomNotesRepository->all();

        return view('company.room_notes.index')
            ->with('roomNotes', $roomNotes);
    }

    /**
     * Show the form for creating a new RoomNotes.
     *
     * @return Response
     */
    public function create()
    {
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $buildings = CompanyBuilding::where('company_id',$company_id)->get();
        $users = User::where('user_role_code','company_admin')->get();

        $data = [
            'buildings' => $buildings,
            'users' => $users
        ];

        return view('company.room_notes.create',$data);
    }

    /**
     * Store a newly created RoomNotes in storage.
     *
     * @param CreateRoomNotesRequest $request
     *
     * @return Response
     */
    public function store(CreateRoomNotesRequest $request)
    {
        $input = $request->all();

        $roomNotes = $this->roomNotesRepository->create($input);

        if($roomNotes)
        {
            session()->flash('msg.success','Room Notes saved successfully.');
        }
        else
        {
            session()->flash('msg.success','Room Notes are not saved successfully.');
        }

        return redirect(route('company.roomNotes.index'));
    }

    /**
     * Display the specified RoomNotes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $roomNotes = $this->roomNotesRepository->findWithoutFail($id);

        if (empty($roomNotes)) {
            Flash::error('Room Notes not found');

            return redirect(route('company.roomNotes.index'));
        }

        return view('company.room_notes.show')->with('roomNotes', $roomNotes);
    }

    /**
     * Show the form for editing the specified RoomNotes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roomNotes = $this->roomNotesRepository->findWithoutFail($id);
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $buildings = CompanyBuilding::where('company_id',$company_id)->get();
        $users = User::where('user_role_code','company_admin')->get();

        if (empty($roomNotes)) 
        {
            session()->flash('msg.error','Room Notes not found');
            return redirect(route('company.roomNotes.index'));
        }

        $data = [
            'buildings' => $buildings,
            'users' => $users,
            'roomNotes' => $roomNotes 
        ];

        return view('company.room_notes.edit',$data);
    }

    /**
     * Update the specified RoomNotes in storage.
     *
     * @param  int              $id
     * @param UpdateRoomNotesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoomNotesRequest $request)
    {
        $roomNotes = $this->roomNotesRepository->findWithoutFail($id);

        if (empty($roomNotes)) 
        {
            session()->flash('msg.error','Room Notes not found');
            return redirect(route('company.roomNotes.index'));
        }

        $roomNotes = $this->roomNotesRepository->update($request->all(), $id);

        if($roomNotes)
        {
            session()->flash('msg.success','Room Notes saved successfully.');
        }
        else
        {
            session()->flash('msg.success','Room Notes are not saved successfully.');
        }

        return redirect(route('company.roomNotes.index'));
    }

    /**
     * Remove the specified RoomNotes from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $roomNotes = $this->roomNotesRepository->findWithoutFail($id);

        if (empty($roomNotes)) {
            Flash::error('Room Notes not found');

            return redirect(route('company.roomNotes.index'));
        }

        $this->roomNotesRepository->delete($id);

        Flash::success('Room Notes deleted successfully.');

        return redirect(route('company.roomNotes.index'));
    }
}
