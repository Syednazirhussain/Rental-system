<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreateLeasePartnerRequest;
use App\Http\Requests\Company\UpdateLeasePartnerRequest;
use App\Repositories\Company\LeasePartnerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LeasePartnerController extends AppBaseController
{
    /** @var  LeasePartnerRepository */
    private $leasePartnerRepository;

    public function __construct(LeasePartnerRepository $leasePartnerRepo)
    {
        $this->leasePartnerRepository = $leasePartnerRepo;
    }

    /**
     * Display a listing of the LeasePartner.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->leasePartnerRepository->pushCriteria(new RequestCriteria($request));
        $leasePartners = $this->leasePartnerRepository->all();

        return view('company.lease_partners.index')
            ->with('leasePartners', $leasePartners);
    }

    /**
     * Show the form for creating a new LeasePartner.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.lease_partners.create');
    }

    /**
     * Store a newly created LeasePartner in storage.
     *
     * @param CreateLeasePartnerRequest $request
     *
     * @return Response
     */
    public function store(CreateLeasePartnerRequest $request)
    {
        $input = $request->all();

        print_r($input);
        exit;

        $leasePartner = $this->leasePartnerRepository->create($input);

        Flash::success('Lease Partner saved successfully.');

        return redirect(route('company.leasePartners.index'));
    }

    /**
     * Display the specified LeasePartner.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $leasePartner = $this->leasePartnerRepository->findWithoutFail($id);

        if (empty($leasePartner)) {
            Flash::error('Lease Partner not found');

            return redirect(route('company.leasePartners.index'));
        }

        return view('company.lease_partners.show')->with('leasePartner', $leasePartner);
    }

    /**
     * Show the form for editing the specified LeasePartner.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $leasePartner = $this->leasePartnerRepository->findWithoutFail($id);

        if (empty($leasePartner)) {
            Flash::error('Lease Partner not found');

            return redirect(route('company.leasePartners.index'));
        }

        return view('company.lease_partners.edit')->with('leasePartner', $leasePartner);
    }

    /**
     * Update the specified LeasePartner in storage.
     *
     * @param  int              $id
     * @param UpdateLeasePartnerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLeasePartnerRequest $request)
    {
        $leasePartner = $this->leasePartnerRepository->findWithoutFail($id);

        if (empty($leasePartner)) {
            Flash::error('Lease Partner not found');

            return redirect(route('company.leasePartners.index'));
        }

        $leasePartner = $this->leasePartnerRepository->update($request->all(), $id);

        Flash::success('Lease Partner updated successfully.');

        return redirect(route('company.leasePartners.index'));
    }

    /**
     * Remove the specified LeasePartner from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $leasePartner = $this->leasePartnerRepository->findWithoutFail($id);

        if (empty($leasePartner)) {
            Flash::error('Lease Partner not found');

            return redirect(route('company.leasePartners.index'));
        }

        $this->leasePartnerRepository->delete($id);

        Flash::success('Lease Partner deleted successfully.');

        return redirect(route('company.leasePartners.index'));
    }
}
