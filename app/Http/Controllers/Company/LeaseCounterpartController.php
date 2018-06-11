<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreateLeaseCounterpartRequest;
use App\Http\Requests\Company\UpdateLeaseCounterpartRequest;
use App\Repositories\Company\LeaseCounterpartRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LeaseCounterpartController extends AppBaseController
{
    /** @var  LeaseCounterpartRepository */
    private $leaseCounterpartRepository;

    public function __construct(LeaseCounterpartRepository $leaseCounterpartRepo)
    {
        $this->leaseCounterpartRepository = $leaseCounterpartRepo;
    }

    /**
     * Display a listing of the LeaseCounterpart.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->leaseCounterpartRepository->pushCriteria(new RequestCriteria($request));
        $leaseCounterparts = $this->leaseCounterpartRepository->all();

        return view('company.lease_counterparts.index')
            ->with('leaseCounterparts', $leaseCounterparts);
    }

    /**
     * Show the form for creating a new LeaseCounterpart.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.lease_counterparts.create');
    }

    /**
     * Store a newly created LeaseCounterpart in storage.
     *
     * @param CreateLeaseCounterpartRequest $request
     *
     * @return Response
     */
    public function store(CreateLeaseCounterpartRequest $request)
    {
        $input = $request->all();

        $leaseCounterpart = $this->leaseCounterpartRepository->create($input);

        Flash::success('Lease Counterpart saved successfully.');

        return redirect(route('company.leaseCounterparts.index'));
    }

    /**
     * Display the specified LeaseCounterpart.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $leaseCounterpart = $this->leaseCounterpartRepository->findWithoutFail($id);

        if (empty($leaseCounterpart)) {
            Flash::error('Lease Counterpart not found');

            return redirect(route('company.leaseCounterparts.index'));
        }

        return view('company.lease_counterparts.show')->with('leaseCounterpart', $leaseCounterpart);
    }

    /**
     * Show the form for editing the specified LeaseCounterpart.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $leaseCounterpart = $this->leaseCounterpartRepository->findWithoutFail($id);

        if (empty($leaseCounterpart)) {
            Flash::error('Lease Counterpart not found');

            return redirect(route('company.leaseCounterparts.index'));
        }

        return view('company.lease_counterparts.edit')->with('leaseCounterpart', $leaseCounterpart);
    }

    /**
     * Update the specified LeaseCounterpart in storage.
     *
     * @param  int              $id
     * @param UpdateLeaseCounterpartRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLeaseCounterpartRequest $request)
    {
        $leaseCounterpart = $this->leaseCounterpartRepository->findWithoutFail($id);

        if (empty($leaseCounterpart)) {
            Flash::error('Lease Counterpart not found');

            return redirect(route('company.leaseCounterparts.index'));
        }

        $leaseCounterpart = $this->leaseCounterpartRepository->update($request->all(), $id);

        Flash::success('Lease Counterpart updated successfully.');

        return redirect(route('company.leaseCounterparts.index'));
    }

    /**
     * Remove the specified LeaseCounterpart from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $leaseCounterpart = $this->leaseCounterpartRepository->findWithoutFail($id);

        if (empty($leaseCounterpart)) {
            Flash::error('Lease Counterpart not found');

            return redirect(route('company.leaseCounterparts.index'));
        }

        $this->leaseCounterpartRepository->delete($id);

        Flash::success('Lease Counterpart deleted successfully.');

        return redirect(route('company.leaseCounterparts.index'));
    }
}
