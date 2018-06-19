<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreateLeaseAttachmentRequest;
use App\Http\Requests\Company\UpdateLeaseAttachmentRequest;
use App\Repositories\Company\LeaseAttachmentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LeaseAttachmentController extends AppBaseController
{
    /** @var  LeaseAttachmentRepository */
    private $leaseAttachmentRepository;

    public function __construct(LeaseAttachmentRepository $leaseAttachmentRepo)
    {
        $this->leaseAttachmentRepository = $leaseAttachmentRepo;
    }

    /**
     * Display a listing of the LeaseAttachment.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->leaseAttachmentRepository->pushCriteria(new RequestCriteria($request));
        $leaseAttachments = $this->leaseAttachmentRepository->all();

        return view('company.lease_attachments.index')
            ->with('leaseAttachments', $leaseAttachments);
    }

    /**
     * Show the form for creating a new LeaseAttachment.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.lease_attachments.create');
    }

    /**
     * Store a newly created LeaseAttachment in storage.
     *
     * @param CreateLeaseAttachmentRequest $request
     *
     * @return Response
     */
    public function store(CreateLeaseAttachmentRequest $request)
    {
        $input = $request->all();

        $leaseAttachment = $this->leaseAttachmentRepository->create($input);

        Flash::success('Lease Attachment saved successfully.');

        return redirect(route('company.leaseAttachments.index'));
    }

    /**
     * Display the specified LeaseAttachment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $leaseAttachment = $this->leaseAttachmentRepository->findWithoutFail($id);

        if (empty($leaseAttachment)) {
            Flash::error('Lease Attachment not found');

            return redirect(route('company.leaseAttachments.index'));
        }

        return view('company.lease_attachments.show')->with('leaseAttachment', $leaseAttachment);
    }

    /**
     * Show the form for editing the specified LeaseAttachment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $leaseAttachment = $this->leaseAttachmentRepository->findWithoutFail($id);

        if (empty($leaseAttachment)) {
            Flash::error('Lease Attachment not found');

            return redirect(route('company.leaseAttachments.index'));
        }

        return view('company.lease_attachments.edit')->with('leaseAttachment', $leaseAttachment);
    }

    /**
     * Update the specified LeaseAttachment in storage.
     *
     * @param  int              $id
     * @param UpdateLeaseAttachmentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLeaseAttachmentRequest $request)
    {
        $leaseAttachment = $this->leaseAttachmentRepository->findWithoutFail($id);

        if (empty($leaseAttachment)) {
            Flash::error('Lease Attachment not found');

            return redirect(route('company.leaseAttachments.index'));
        }

        $leaseAttachment = $this->leaseAttachmentRepository->update($request->all(), $id);

        Flash::success('Lease Attachment updated successfully.');

        return redirect(route('company.leaseAttachments.index'));
    }

    /**
     * Remove the specified LeaseAttachment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $leaseAttachment = $this->leaseAttachmentRepository->findWithoutFail($id);

        if (empty($leaseAttachment)) {
            Flash::error('Lease Attachment not found');

            return redirect(route('company.leaseAttachments.index'));
        }

        $this->leaseAttachmentRepository->delete($id);

        Flash::success('Lease Attachment deleted successfully.');

        return redirect(route('company.leaseAttachments.index'));
    }
}
