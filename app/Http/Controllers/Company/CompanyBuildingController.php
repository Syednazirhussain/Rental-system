<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Admin\CreateCompanyBuildingRequest;
use App\Http\Requests\Admin\UpdateCompanyBuildingRequest;
use App\Models\CompanyBuilding;
use App\Repositories\CompanyBuildingRepository;
use App\Repositories\CompanyFloorRoomRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Auth;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Company;

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
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $company = Company::find($company_id);
        $companyBuildings = CompanyBuilding::where('company_id', $company_id)->get();

        return view('company.company_buildings.index', ['companyBuildings' => $companyBuildings, 'company' => $company]);
    }

    /**
     * Show the form for creating a new CompanyBuilding.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.company_buildings.create');
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

            return redirect(route('company.companyBuildings.index'));
        }

        return view('company.company_buildings.show')->with('companyBuilding', $companyBuilding);
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

            return redirect(route('company.companyBuildings.index'));
        }

        return view('company.company_buildings.edit')->with('companyBuilding', $companyBuilding);
    }

    /**
     * Update the specified CompanyBuilding in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyBuildingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyBuildingRequest $request)
    {
        $companyBuilding = $this->companyBuildingRepository->findWithoutFail($id);

        if (empty($companyBuilding)) {
            $request->session()->flash('msg.error', 'Company Building not found');
            return redirect(route('company.companyBuildings.index'));
        }
        $this->companyBuildingRepository->update($request->all('name','address','zipcode'), $id);
        $request->session()->flash('msg.success', 'Company Building updated successfully.');

        return redirect(route('company.companyBuildings.index'));
    }

    /**
     * Remove the specified CompanyBuilding from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companyBuilding = $this->companyBuildingRepository->findWithoutFail($id);

        if (empty($companyBuilding)) {
            Flash::error('Company Building not found');

            return redirect(route('company.companyBuildings.index'));
        }

        $this->companyBuildingRepository->delete($id);

        Flash::success('Company Building deleted successfully.');

        return redirect(route('company.companyBuildings.index'));
    }
}
