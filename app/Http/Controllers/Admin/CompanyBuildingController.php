<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateCompanyBuildingRequest;
use App\Http\Requests\Admin\UpdateCompanyBuildingRequest;
use App\Repositories\CompanyBuildingRepository;
use App\Repositories\CompanyFloorRoomRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CompanyBuildingController extends AppBaseController
{
    /** @var  CompanyBuildingRepository */
    private $companyBuildingRepository;
    private $companyFloorRoomRepository;



    public function __construct(CompanyBuildingRepository $companyBuildingRepo, CompanyFloorRoomRepository $companyFloorRoomRepo)
    {
        $this->companyBuildingRepository = $companyBuildingRepo;
        $this->companyFloorRoomRepository = $companyFloorRoomRepo;
    }

    /**
     * Display a listing of the CompanyBuilding.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyBuildingRepository->pushCriteria(new RequestCriteria($request));
        $companyBuildings = $this->companyBuildingRepository->all();

        return view('admin.company_buildings.index')
            ->with('companyBuildings', $companyBuildings);
    }

    /**
     * Show the form for creating a new CompanyBuilding.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.company_buildings.create');
    }

    /**
     * Store a newly created CompanyBuilding in storage.
     *
     * @param CreateCompanyBuildingRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyBuildingRequest $request)
    {
        $data = $request->all();

        /*echo "<pre>";
        print_r($data);
        echo "</pre>";

        exit;*/

        foreach($data['building_data'] as $arr) {
            
            $input = [];
            $floor = [];

            $input['name'] = $arr['name'];
            $input['address'] = $arr['address'];
            $input['zipcode'] = $arr['zipcode'];
            $input['num_floors'] = $arr['num_floors'];
            $input['company_id'] = $data['company_id'];

            $companyBuilding = $this->companyBuildingRepository->create($input);

            $floors = [];

            $i = 0;
            foreach ($arr['floor'] as $fl) {

                $floors[$i]['building_id'] = $companyBuilding->id;
                $floors[$i]['company_id'] = $data['company_id'];
                $floors[$i]['floor'] = $fl['floor_number'];
                $floors[$i]['num_rooms'] = $fl['floor_rooms'];

                $i++;
            }

            $c = $this->companyFloorRoomRepository->insert($floors);

            // print_r($companyFloorRoom);
            // $companyFloorRoom = $companyFloorRoom->insert($floors);

        }

        /*echo "<pre>";
        print_r($input);
        echo "</pre>";

        exit;*/

        return response()->json(['success'=>1, 'msg'=>'Company buildings have been added successfully']);
    }

    /**
     * Display the specified CompanyBuilding.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companyBuilding = $this->companyBuildingRepository->findWithoutFail($id);

        if (empty($companyBuilding)) {
            Flash::error('Company Building not found');

            return redirect(route('admin.companyBuildings.index'));
        }

        return view('admin.company_buildings.show')->with('companyBuilding', $companyBuilding);
    }

    /**
     * Show the form for editing the specified CompanyBuilding.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companyBuilding = $this->companyBuildingRepository->findWithoutFail($id);

        if (empty($companyBuilding)) {
            Flash::error('Company Building not found');

            return redirect(route('admin.companyBuildings.index'));
        }

        return view('admin.company_buildings.edit')->with('companyBuilding', $companyBuilding);
    }

    /**
     * Update the specified CompanyBuilding in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyBuildingRequest $request
     *
     * @return Response
     */
    public function update(UpdateCompanyBuildingRequest $request)
    {

        $data = $request->all();

        /*echo "<pre>";
        print_r($data['building_data']);
        echo "</pre>";

        exit;*/

        $input = [];
        $dateTime = date('Y-m-d h:i:s');
        $arr = [];
        $flArr = [];

        $i = 0;
        $index = 0;

        foreach ($data['building_data'] as $building) {

            $input['name'] = $building['name'];
            $input['address'] = $building['address'];
            $input['zipcode'] = $building['zipcode'];
            $input['num_floors'] = $building['num_floors'];
            $input['company_id'] = $data['company_id'];

            if (strpos($building['id'], 'new-') === false) {
                $id = $building['id'];
            } else {
                $index = preg_replace('/[^0-9]/', '', $building['id']);
                $id = "";
            }
            
            $where = ['id' => $id];

            $companyBuilding = $this->companyBuildingRepository->updateOrCreate($where, $input);

            $floors = [];

            if (isset($building['floor'])) {

                foreach ($building['floor'] as $fl) {

                    $floors['building_id'] = $companyBuilding->id;
                    $floors['company_id'] = $data['company_id'];
                    $floors['floor'] = $fl['floor_number'];
                    $floors['num_rooms'] = $fl['floor_rooms'];
                

                    if (strpos($fl['id'], 'new-') === false) {
                        $floorId = $fl['id'];
                    } else {
                        $floorIndex = preg_replace('/[^0-9]/', '', $fl['id']);
                        $floorId = "";
                    }

                    $where = ['id' => $floorId];

                    $buildingFloor = $this->companyFloorRoomRepository->updateOrCreate($where, $floors);

                    if (strpos($fl['id'], 'new-') !== false) {

                        $arr[$index] = $buildingFloor->id;
                    }
                }
            }

            if (strpos($building['id'], 'new-') !== false) {

                $arr[$index] = $companyBuilding->id;
            }

        }
        

        return response()->json([
                                'success'=>1, 
                                'msg'=>'Company buildings have been updated successfully',
                                'createdFields'=>$arr,
                            ]);
    }

    /**
     * Remove the specified CompanyBuilding from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroyBuilding(Request $request)
    {

        $id = $request->only('building_id');

        $id = $id['building_id'];
        
        $companyBuilding = $this->companyBuildingRepository->findWithoutFail($id);

        if (empty($companyBuilding)) {

            $success = 0;
            $msg = "Company building not found";
        }

        $this->companyBuildingRepository->delete($id);

        $success = 1;
        $msg = "Company building deleted successfully";

        return response()->json([
                                'success'=>$success, 
                                'msg'=>$msg,
                            ]);
    }
}
