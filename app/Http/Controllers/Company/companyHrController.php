<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreatecompanyHrRequest;
use App\Http\Requests\Company\UpdatecompanyHrRequest;
use App\Repositories\Company\companyHrRepository;
use App\Repositories\CountryRepository;
use App\Repositories\StateRepository;
use App\Repositories\CityRepository;
use App\Repositories\Company\hrCivilStatusRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class companyHrController extends AppBaseController
{
    /** @var  companyHrRepository */
    private $companyHrRepository;
    private $countryRepository;
    private $stateRepository;
    private $cityRepository;
    private $hrCivilStatusRepository;

    public function __construct(companyHrRepository $companyHrRepo, 
                                CountryRepository $countryRepo, 
                                StateRepository $stateRepo,
                                CityRepository $cityRepo,
                                hrCivilStatusRepository $hrCivilRepo
                                )
    {
        $this->companyHrRepository = $companyHrRepo;
        $this->stateRepository = $stateRepo;
        $this->countryRepository = $countryRepo;
        $this->cityRepository = $cityRepo;
        $this->hrCivilStatusRepository = $hrCivilRepo;
    }

    /**
     * Display a listing of the companyHr.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyHrRepository->pushCriteria(new RequestCriteria($request));
        $companyHrs = $this->companyHrRepository->all();

        return view('company.company_hrs.index')
            ->with('companyHrs', $companyHrs);
    }

    /**
     * Show the form for creating a new companyHr.
     *
     * @return Response
     */
    public function create()
    {
        $countries = $this->countryRepository->all();
        $states = $this->stateRepository->all();
        $cities = $this->cityRepository->all();
        $hrCivil = $this->hrCivilStatusRepository->all();

        $data   =   [
                            'countries' => $countries,
                            'states' => $states,
                            'cities' => $cities,
                            'hrCivil' => $hrCivil,
                    ];
        return view('company.company_hrs.create', $data);
    }

    /**
     * Store a newly created companyHr in storage.
     *
     * @param CreatecompanyHrRequest $request
     *
     * @return Response
     */
    public function store(CreatecompanyHrRequest $request)
    {
        $input = $request->all();

        $companyHr = $this->companyHrRepository->create($input);

        Flash::success('Company Hr saved successfully.');

        return redirect(route('company.companyHrs.index'));
    }

    /**
     * Display the specified companyHr.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companyHr = $this->companyHrRepository->findWithoutFail($id);

        if (empty($companyHr)) {
            Flash::error('Company Hr not found');

            return redirect(route('company.companyHrs.index'));
        }

        return view('company.company_hrs.show')->with('companyHr', $companyHr);
    }

    /**
     * Show the form for editing the specified companyHr.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companyHr = $this->companyHrRepository->findWithoutFail($id);

        $countries = $this->countryRepository->all();
        $states = $this->stateRepository->all();
        $cities = $this->cityRepository->all();
        $hrCivil = $this->hrCivilStatusRepository->all();

         $data = [
                            'countries' => $countries,
                            'states' => $states,
                            'cities' => $cities,
                            'hrCivil' => $hrCivil,
                            'companyHr' => $companyHr,
            ];

        if (empty($companyHr)) {
            Flash::error('Company Hr not found');

            return redirect(route('company.companyHrs.index'));
        }

        return view('company.company_hrs.edit', $data);
    }

    /**
     * Update the specified companyHr in storage.
     *
     * @param  int              $id
     * @param UpdatecompanyHrRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecompanyHrRequest $request)
    {
        $companyHr = $this->companyHrRepository->findWithoutFail($id);

        if (empty($companyHr)) {
            Flash::error('Company Hr not found');

            return redirect(route('company.companyHrs.index'));
        }

        $companyHr = $this->companyHrRepository->update($request->all(), $id);

        Flash::success('Company Hr updated successfully.');

        return redirect(route('company.companyHrs.index'));
    }

    /**
     * Remove the specified companyHr from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companyHr = $this->companyHrRepository->findWithoutFail($id);

        if (empty($companyHr)) {
            Flash::error('Company Hr not found');

            return redirect(route('company.companyHrs.index'));
        }

        $this->companyHrRepository->delete($id);

        Flash::success('Company Hr deleted successfully.');

        return redirect(route('company.companyHrs.index'));
    }
}
