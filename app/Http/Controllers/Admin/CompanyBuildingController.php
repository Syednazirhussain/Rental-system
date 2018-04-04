<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateCompanyBuildingRequest;
use App\Http\Requests\Admin\UpdateCompanyBuildingRequest;
use App\Repositories\Admin\CompanyBuildingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CompanyBuildingController extends AppBaseController
{
    /** @var  CompanyBuildingRepository */
    private $companyBuildingRepository;

    public function __construct(CompanyBuildingRepository $companyBuildingRepo)
    {
        $this->companyBuildingRepository = $companyBuildingRepo;
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
        $input = $request->all();

        $companyBuilding = $this->companyBuildingRepository->create($input);

        Flash::success('Company Building saved successfully.');

        return redirect(route('admin.companyBuildings.index'));
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
    public function update($id, UpdateCompanyBuildingRequest $request)
    {
        $companyBuilding = $this->companyBuildingRepository->findWithoutFail($id);

        if (empty($companyBuilding)) {
            Flash::error('Company Building not found');

            return redirect(route('admin.companyBuildings.index'));
        }

        $companyBuilding = $this->companyBuildingRepository->update($request->all(), $id);

        Flash::success('Company Building updated successfully.');

        return redirect(route('admin.companyBuildings.index'));
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

            return redirect(route('admin.companyBuildings.index'));
        }

        $this->companyBuildingRepository->delete($id);

        Flash::success('Company Building deleted successfully.');

        return redirect(route('admin.companyBuildings.index'));
    }
}
