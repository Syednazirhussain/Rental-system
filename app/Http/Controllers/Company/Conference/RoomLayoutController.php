<?php

namespace App\Http\Controllers\Company\Conference;

use App\Http\Requests\Company\Conference\CreateRoomLayoutRequest;
use App\Http\Requests\Company\Conference\UpdateRoomLayoutRequest;
use App\Repositories\RoomLayoutRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Session;

class RoomLayoutController extends AppBaseController
{
    /** @var  RoomLayoutRepository */
    private $roomLayoutRepository;

    public function __construct(RoomLayoutRepository $roomLayoutRepo)
    {
        $this->roomLayoutRepository = $roomLayoutRepo;
    }

    /**
     * Display a listing of the RoomLayout.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roomLayoutRepository->pushCriteria(new RequestCriteria($request));
        $roomLayouts = $this->roomLayoutRepository->all();

        

        return view('company.Conference.room_layouts.index')
            ->with('roomLayouts', $roomLayouts);
    }

    /**
     * Show the form for creating a new RoomLayout.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.Conference.room_layouts.create');
    }

    /**
     * Store a newly created RoomLayout in storage.
     *
     * @param CreateRoomLayoutRequest $request
     *
     * @return Response
     */
    public function store(CreateRoomLayoutRequest $request)
    {
        $request->validate([
                'image' => 'max:1024',
            ]);
        $input = $request->all();

        if ($request->hasFile('image')) {

            $path = $request->file('image')->store('public/room_layouts_images');

            // dd($path);

            $path = explode("/", $path);

            $input['image'] = $path[2];

        }

        $roomLayout = $this->roomLayoutRepository->create($input);

        Session::flash("successMessage", "The Room Layout has been added successfully.");

        return redirect(route('company.conference.roomLayouts.index'));
    }

    /**
     * Display the specified RoomLayout.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $roomLayout = $this->roomLayoutRepository->findWithoutFail($id);

        if (empty($roomLayout)) {
            Flash::error('Room Layout not found');

            return redirect(route('company.conference.roomLayouts.index'));
        }

        return view('company.Conference.room_layouts.show')->with('roomLayout', $roomLayout);
    }

    /**
     * Show the form for editing the specified RoomLayout.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roomLayout = $this->roomLayoutRepository->findWithoutFail($id);

        if (empty($roomLayout)) {
            Flash::error('Room Layout not found');

            return redirect(route('company.conference.roomLayouts.index'));
        }

        return view('company.Conference.room_layouts.edit')->with('roomLayout', $roomLayout);
    }

    /**
     * Update the specified RoomLayout in storage.
     *
     * @param  int              $id
     * @param UpdateRoomLayoutRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoomLayoutRequest $request)
    {
        $roomLayout = $this->roomLayoutRepository->findWithoutFail($id);
        $input  =   $request->all();
        if (empty($roomLayout)) {
            Flash::error('Room Layout not found');

            return redirect(route('company.conference.roomLayouts.index'));
        }

        /*if ($request->hasFile('image')) {

            $path = $request->file('image')->store('public/room_layouts_images');

            // dd($path);

            $path = explode("/", $path);

            $input['image'] = $path[2];

        }*/
        // dd($request);
        /*echo "<pre>";
        print_r($request->all());

        exit();*/
        if ($request->hasFile('image') && !empty($request->hasFile('image'))) {

                $path = $request->file('image')->store('public/room_layouts_images');
                $path = explode("/", $path);
                $x = count($path)-1;
                $input['image'] = $path[$x];

        }



        $roomLayout = $this->roomLayoutRepository->update($input, $id);

        Session::flash("successMessage", "The Room Layout has been updated successfully.");

        return redirect(route('company.conference.roomLayouts.index'));
    }

    /**
     * Remove the specified RoomLayout from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $roomLayout = $this->roomLayoutRepository->findWithoutFail($id);

        if (empty($roomLayout)) {
            Flash::error('Room Layout not found');

            return redirect(route('company.conference.roomLayouts.index'));
        }

        $this->roomLayoutRepository->delete($id);

        Session::flash("deleteMessage", "The Room Layout has been deleted successfully.");

        return redirect(route('company.conference.roomLayouts.index'));
    }
}
