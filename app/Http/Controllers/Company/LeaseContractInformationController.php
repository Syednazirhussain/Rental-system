<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreateLeaseContractInformationRequest;
use App\Http\Requests\Company\UpdateLeaseContractInformationRequest;
use App\Repositories\Company\LeaseContractInformationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LeaseContractInformationController extends AppBaseController
{
    /** @var  LeaseContractInformationRepository */
    private $leaseContractInformationRepository;

    public function __construct(LeaseContractInformationRepository $leaseContractInformationRepo)
    {
        $this->leaseContractInformationRepository = $leaseContractInformationRepo;
    }

    /**
     * Display a listing of the LeaseContractInformation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->leaseContractInformationRepository->pushCriteria(new RequestCriteria($request));
        $leaseContractInformations = $this->leaseContractInformationRepository->all();

        return view('company.lease_contract_informations.index')
            ->with('leaseContractInformations', $leaseContractInformations);
    }

    /**
     * Show the form for creating a new LeaseContractInformation.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.lease_contract_informations.create');
    }

    /**
     * Store a newly created LeaseContractInformation in storage.
     *
     * @param CreateLeaseContractInformationRequest $request
     *
     * @return Response
     */
    public function store(CreateLeaseContractInformationRequest $request)
    {
        $input = $request->all();

        $leaseContractInformation = $this->leaseContractInformationRepository->create($input);

        Flash::success('Lease Contract Information saved successfully.');

        return redirect(route('company.leaseContractInformations.index'));
    }

    /**
     * Display the specified LeaseContractInformation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $leaseContractInformation = $this->leaseContractInformationRepository->findWithoutFail($id);

        if (empty($leaseContractInformation)) {
            Flash::error('Lease Contract Information not found');

            return redirect(route('company.leaseContractInformations.index'));
        }

        return view('company.lease_contract_informations.show')->with('leaseContractInformation', $leaseContractInformation);
    }

    /**
     * Show the form for editing the specified LeaseContractInformation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $leaseContractInformation = $this->leaseContractInformationRepository->findWithoutFail($id);

        if (empty($leaseContractInformation)) {
            Flash::error('Lease Contract Information not found');

            return redirect(route('company.leaseContractInformations.index'));
        }

        return view('company.lease_contract_informations.edit')->with('leaseContractInformation', $leaseContractInformation);
    }

    /**
     * Update the specified LeaseContractInformation in storage.
     *
     * @param  int              $id
     * @param UpdateLeaseContractInformationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLeaseContractInformationRequest $request)
    {
        $leaseContractInformation = $this->leaseContractInformationRepository->findWithoutFail($id);

        if (empty($leaseContractInformation)) {
            Flash::error('Lease Contract Information not found');

            return redirect(route('company.leaseContractInformations.index'));
        }

        $leaseContractInformation = $this->leaseContractInformationRepository->update($request->all(), $id);

        Flash::success('Lease Contract Information updated successfully.');

        return redirect(route('company.leaseContractInformations.index'));
    }

    /**
     * Remove the specified LeaseContractInformation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $leaseContractInformation = $this->leaseContractInformationRepository->findWithoutFail($id);

        if (empty($leaseContractInformation)) {
            Flash::error('Lease Contract Information not found');

            return redirect(route('company.leaseContractInformations.index'));
        }

        $this->leaseContractInformationRepository->delete($id);

        Flash::success('Lease Contract Information deleted successfully.');

        return redirect(route('company.leaseContractInformations.index'));
    }
}
