<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreateSupportPrioritiesRequest;
use App\Http\Requests\Company\UpdateSupportPrioritiesRequest;
use App\Repositories\SupportPrioritiesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\CompanySupportPriorities;
use App\Models\CompanyUser;
use Auth;

class CompanySupportPrioritiesController extends AppBaseController
{
    /** @var  SupportPrioritiesRepository */
    private $supportPrioritiesRepository;

    public function __construct(SupportPrioritiesRepository $supportPrioritiesRepo)
    {
        $this->supportPrioritiesRepository = $supportPrioritiesRepo;
    }

    /**
     * Display a listing of the SupportPriorities.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->supportPrioritiesRepository->pushCriteria(new RequestCriteria($request));

        $user_id = Auth::guard('company')->user()->id;

        $companyUser = CompanyUser::where('user_id',$user_id)->first();

        $company_id = $companyUser->company_id;

        $supportPriorities = CompanySupportPriorities::where('company_id',$company_id)->get();

        return view('company.company_support_priorities.index')->with('supportPriorities', $supportPriorities);
    }

    /**
     * Show the form for creating a new SupportPriorities.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.company_support_priorities.create');
    }

    /**
     * Store a newly created SupportPriorities in storage.
     *
     * @param CreateSupportPrioritiesRequest $request
     *
     * @return Response
     */
    public function store(CreateSupportPrioritiesRequest $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);

        $input = $request->all();

        $user_id = Auth::guard('company')->user()->id;

        $companyUser = CompanyUser::where('user_id',$user_id)->first();

        $input['company_id'] = $companyUser->company_id;

        $supportPriorities = $this->supportPrioritiesRepository->create($input);

        session()->flash('msg.success','Support Priorities saved successfully.');

        return redirect(route('company.supportPriorities.index'));
    }

    /**
     * Display the specified SupportPriorities.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $supportPriorities = $this->supportPrioritiesRepository->findWithoutFail($id);

        if (empty($supportPriorities)) {

            session()->flash('msg.error','Support Priorities not found');

            return redirect(route('company.supportPriorities.index'));
        }

        return view('company.company_support_priorities.show')->with('supportPriorities', $supportPriorities);
    }

    /**
     * Show the form for editing the specified SupportPriorities.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $supportPriorities = $this->supportPrioritiesRepository->findWithoutFail($id);

        if (empty($supportPriorities)) {

            session()->flash('msg.error','Support Priorities not found');

            return redirect(route('company.supportPriorities.index'));
        }

        return view('company.company_support_priorities.edit')->with('supportPriorities', $supportPriorities);
    }

    /**
     * Update the specified SupportPriorities in storage.
     *
     * @param  int              $id
     * @param UpdateSupportPrioritiesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSupportPrioritiesRequest $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);

        $supportPriorities = $this->supportPrioritiesRepository->findWithoutFail($id);

        if (empty($supportPriorities)) {

            session()->flash('msg.error','Support Priorities not found');

            return redirect(route('company.supportPriorities.index'));
        }

        $supportPriorities = $this->supportPrioritiesRepository->update($request->all(), $id);

        session()->flash('msg.success','Support Priorities updated successfully.');

        return redirect(route('company.supportPriorities.index'));
    }

    /**
     * Remove the specified SupportPriorities from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $supportPriorities = $this->supportPrioritiesRepository->findWithoutFail($id);

        if (empty($supportPriorities)) {
            Flash::error('Support Priorities not found');

            return redirect(route('company.supportPriorities.index'));
        }

        $this->supportPrioritiesRepository->delete($id);

        session()->flash('msg.success','Support Priorities deleted successfully.');

        return redirect(route('company.supportPriorities.index'));
    }
}
