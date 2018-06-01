<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreateRoomImagesRequest;
use App\Http\Requests\Company\UpdateRoomImagesRequest;
use App\Repositories\Company\RoomImagesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use Auth;
use App\Models\CompanyBuilding;
use App\Models\Room;
use App\Models\Company\RoomSettingArrangment;

class RoomImagesController extends AppBaseController
{
    /** @var  RoomImagesRepository */
    private $roomImagesRepository;

    public function __construct(RoomImagesRepository $roomImagesRepo)
    {
        $this->roomImagesRepository = $roomImagesRepo;
    }

    /**
     * Display a listing of the RoomImages.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roomImagesRepository->pushCriteria(new RequestCriteria($request));
        $roomImages = $this->roomImagesRepository->all();

        return view('company.room_images.index')->with('roomImages', $roomImages);
    }


    public function getRoomSittingArrangmentByRoomId($room_id)
    {
        $rooms =   RoomSettingArrangment::where('room_id',$room_id)
                        ->pluck("name","id");
        return response()->json($rooms);
    }

    /**
     * Show the form for creating a new RoomImages.
     *
     * @return Response
     */
    public function create()
    {

        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        
        $buildings = CompanyBuilding::where('company_id',$company_id)->get();

        $data = [
            'buildings' => $buildings
        ];

        return view('company.room_images.create',$data);
    }

    /**
     * Store a newly created RoomImages in storage.
     *
     * @param CreateRoomImagesRequest $request
     *
     * @return Response
     */
    public function store(CreateRoomImagesRequest $request)
    {
        $input = $request->all();

        dd($input);

        $roomImages = $this->roomImagesRepository->create($input);

        if($roomImages)
        {
            session()->flash('msg.success','Room image successfully created');
        }
        else
        {
            session()->flash('msg.success','Room image not created');
        }

        return redirect(route('company.roomImages.index'));
    }

    /**
     * Display the specified RoomImages.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $roomImages = $this->roomImagesRepository->findWithoutFail($id);

        if (empty($roomImages)) {
            Flash::error('Room Images not found');

            return redirect(route('company.roomImages.index'));
        }

        return view('company.room_images.show')->with('roomImages', $roomImages);
    }

    /**
     * Show the form for editing the specified RoomImages.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roomImages = $this->roomImagesRepository->findWithoutFail($id);

        if (empty($roomImages)) {
            Flash::error('Room Images not found');

            return redirect(route('company.roomImages.index'));
        }

        return view('company.room_images.edit')->with('roomImages', $roomImages);
    }

    /**
     * Update the specified RoomImages in storage.
     *
     * @param  int              $id
     * @param UpdateRoomImagesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoomImagesRequest $request)
    {
        $roomImages = $this->roomImagesRepository->findWithoutFail($id);

        if (empty($roomImages)) {
            Flash::error('Room Images not found');

            return redirect(route('company.roomImages.index'));
        }

        $roomImages = $this->roomImagesRepository->update($request->all(), $id);

        Flash::success('Room Images updated successfully.');

        return redirect(route('company.roomImages.index'));
    }

    /**
     * Remove the specified RoomImages from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $roomImages = $this->roomImagesRepository->findWithoutFail($id);

        if (empty($roomImages)) {
            Flash::error('Room Images not found');

            return redirect(route('company.roomImages.index'));
        }

        $this->roomImagesRepository->delete($id);

        Flash::success('Room Images deleted successfully.');

        return redirect(route('company.roomImages.index'));
    }
}
