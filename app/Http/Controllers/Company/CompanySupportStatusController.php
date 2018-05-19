<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Admin\CreateSupportStatusRequest;
use App\Http\Requests\Admin\UpdateSupportStatusRequest;
use App\Repositories\SupportStatusRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CompanySupportStatusController extends AppBaseController
{
    /** @var  SupportStatusRepository */
    private $supportStatusRepository;

    public function __construct(SupportStatusRepository $supportStatusRepo)
    {
        $this->supportStatusRepository = $supportStatusRepo;
    }

    /**
     * Display a listing of the SupportStatus.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->supportStatusRepository->pushCriteria(new RequestCriteria($request));
        $supportStatuses = $this->supportStatusRepository->all();

        return view('company.company_support_statuses.index')->with('supportStatuses', $supportStatuses);
    }

    /**
     * Show the form for creating a new SupportStatus.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.company_support_statuses.create');
    }

    /**
     * Store a newly created SupportStatus in storage.
     *
     * @param CreateSupportStatusRequest $request
     *
     * @return Response
     */
    public function store(CreateSupportStatusRequest $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);

        $input = $request->all();

        $supportStatus = $this->supportStatusRepository->create($input);

        // Flash::success('Support Status saved successfully.');

        session()->flash('msg.success','Support Status saved successfully.');

        return redirect(route('company.supportStatuses.index'));
    }

    /**
     * Display the specified SupportStatus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $supportStatus = $this->supportStatusRepository->findWithoutFail($id);

        if (empty($supportStatus)) {
            Flash::error('Support Status not found');

            return redirect(route('company.supportStatuses.index'));
        }

        return view('company.company_support_statuses.show')->with('supportStatus', $supportStatus);
    }

    /**
     * Show the form for editing the specified SupportStatus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $supportStatus = $this->supportStatusRepository->findWithoutFail($id);

        if (empty($supportStatus)) {

            session()->flash('msg.error','Support Status not found');

            return redirect(route('company.supportStatuses.index'));
        }

        return view('company.company_support_statuses.edit')->with('supportStatus', $supportStatus);
    }

    /**
     * Update the specified SupportStatus in storage.
     *
     * @param  int              $id
     * @param UpdateSupportStatusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSupportStatusRequest $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        $supportStatus = $this->supportStatusRepository->findWithoutFail($id);

        if (empty($supportStatus)) {
            Flash::error('Support Status not found');

            return redirect(route('company.supportStatuses.index'));
        }

        $supportStatus = $this->supportStatusRepository->update($request->all(), $id);

        session()->flash('msg.success','Support Status updated successfully.');

        return redirect(route('company.supportStatuses.index'));
    }

    /**
     * Remove the specified SupportStatus from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $supportStatus = $this->supportStatusRepository->findWithoutFail($id);

        if (empty($supportStatus)) {
            Flash::error('Support Status not found');

            return redirect(route('company.supportStatuses.index'));
        }

        $this->supportStatusRepository->delete($id);

        session()->flash('msg.success','Support Status deleted successfully.');

        return redirect(route('company.supportStatuses.index'));
    }
}
