<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreatehrCompanyCollectiveRequest;
use App\Http\Requests\Company\UpdatehrCompanyCollectiveRequest;
use App\Repositories\Company\hrCompanyCollectiveRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;

class hrCompanyCollectiveController extends AppBaseController
{
    /** @var  hrCompanyCollectiveRepository */
    private $hrCompanyCollectiveRepository;

    public function __construct(hrCompanyCollectiveRepository $hrCompanyCollectiveRepo)
    {
        $this->hrCompanyCollectiveRepository = $hrCompanyCollectiveRepo;
    }

    /**
     * Display a listing of the hrCompanyCollective.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->hrCompanyCollectiveRepository->pushCriteria(new RequestCriteria($request));
        $hrCompanyCollectives = $this->hrCompanyCollectiveRepository->all();

        return view('company.hr_company_collectives.index')
            ->with('hrCompanyCollectives', $hrCompanyCollectives);
    }

    /**
     * Show the form for creating a new hrCompanyCollective.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.hr_company_collectives.create');
    }

    /**
     * Store a newly created hrCompanyCollective in storage.
     *
     * @param CreatehrCompanyCollectiveRequest $request
     *
     * @return Response
     */
    public function store(CreatehrCompanyCollectiveRequest $request)
    {
        $input = $request->all();
        $input['company_id'] =   Auth::guard('company')->user()->companyUser()->first()->company_id;

        $hrCompanyCollective = $this->hrCompanyCollectiveRepository->create($input);

        Flash::success('Hr Company Collective saved successfully.');

        return redirect(route('company.hrCompanyCollectives.index'));
    }

    /**
     * Display the specified hrCompanyCollective.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $hrCompanyCollective = $this->hrCompanyCollectiveRepository->findWithoutFail($id);

        if (empty($hrCompanyCollective)) {
            Flash::error('Hr Company Collective not found');

            return redirect(route('company.hrCompanyCollectives.index'));
        }

        return view('company.hr_company_collectives.show')->with('hrCompanyCollective', $hrCompanyCollective);
    }

    /**
     * Show the form for editing the specified hrCompanyCollective.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hrCompanyCollective = $this->hrCompanyCollectiveRepository->findWithoutFail($id);

        if (empty($hrCompanyCollective)) {
            Flash::error('Hr Company Collective not found');

            return redirect(route('company.hrCompanyCollectives.index'));
        }

        return view('company.hr_company_collectives.edit')->with('hrCompanyCollective', $hrCompanyCollective);
    }

    /**
     * Update the specified hrCompanyCollective in storage.
     *
     * @param  int              $id
     * @param UpdatehrCompanyCollectiveRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatehrCompanyCollectiveRequest $request)
    {
        $hrCompanyCollective = $this->hrCompanyCollectiveRepository->findWithoutFail($id);

        if (empty($hrCompanyCollective)) {
            Flash::error('Hr Company Collective not found');

            return redirect(route('company.hrCompanyCollectives.index'));
        }

        $hrCompanyCollective = $this->hrCompanyCollectiveRepository->update($request->all(), $id);

        Flash::success('Hr Company Collective updated successfully.');

        return redirect(route('company.hrCompanyCollectives.index'));
    }

    /**
     * Remove the specified hrCompanyCollective from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $hrCompanyCollective = $this->hrCompanyCollectiveRepository->findWithoutFail($id);

        if (empty($hrCompanyCollective)) {
            Flash::error('Hr Company Collective not found');

            return redirect(route('company.hrCompanyCollectives.index'));
        }

        $this->hrCompanyCollectiveRepository->delete($id);

        Flash::success('Hr Company Collective deleted successfully.');

        return redirect(route('company.hrCompanyCollectives.index'));
    }
}
