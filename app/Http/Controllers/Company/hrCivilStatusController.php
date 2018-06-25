<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreatehrCivilStatusRequest;
use App\Http\Requests\Company\UpdatehrCivilStatusRequest;
use App\Repositories\Company\hrCivilStatusRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use App\Models\Company\hrCivilStatus;
use Session;

class hrCivilStatusController extends AppBaseController
{
    /** @var  hrCivilStatusRepository */
    private $hrCivilStatusRepository;

    public function __construct(hrCivilStatusRepository $hrCivilStatusRepo)
    {
        $this->hrCivilStatusRepository = $hrCivilStatusRepo;
    }

    /**
     * Display a listing of the hrCivilStatus.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->hrCivilStatusRepository->pushCriteria(new RequestCriteria($request));
        $companyId         =   Auth::guard('company')->user()->companyUser()->first()->company_id;


        $hrCivilStatuses    = hrCivilStatus::where('company_id',$companyId)->get();
        return view('company.hr_civil_statuses.index')
            ->with('hrCivilStatuses', $hrCivilStatuses);
    }

    /**
     * Show the form for creating a new hrCivilStatus.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.hr_civil_statuses.create');
    }

    /**
     * Store a newly created hrCivilStatus in storage.
     *
     * @param CreatehrCivilStatusRequest $request
     *
     * @return Response
     */
    public function store(CreatehrCivilStatusRequest $request)
    {
        $input = $request->all();

        $input['company_id'] =   Auth::guard('company')->user()->companyUser()->first()->company_id;  
        $hrCivilStatus = $this->hrCivilStatusRepository->create($input);

        /*Flash::success('Hr Civil Status saved successfully.');*/
        Session::flash("successMessage", "Hr Civil Status updated successfully");

        return redirect(route('company.hrCivilStatuses.index'));
    }

    /**
     * Display the specified hrCivilStatus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $hrCivilStatus = $this->hrCivilStatusRepository->findWithoutFail($id);

        if (empty($hrCivilStatus)) {
            Flash::error('Hr Civil Status not found');

            return redirect(route('company.hrCivilStatuses.index'));
        }

        return view('company.hr_civil_statuses.show')->with('hrCivilStatus', $hrCivilStatus);
    }

    /**
     * Show the form for editing the specified hrCivilStatus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hrCivilStatus = $this->hrCivilStatusRepository->findWithoutFail($id);

        if (empty($hrCivilStatus)) {
            Flash::error('Hr Civil Status not found');

            return redirect(route('company.hrCivilStatuses.index'));
        }

        return view('company.hr_civil_statuses.edit')->with('hrCivilStatus', $hrCivilStatus);
    }

    /**
     * Update the specified hrCivilStatus in storage.
     *
     * @param  int              $id
     * @param UpdatehrCivilStatusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatehrCivilStatusRequest $request)
    {
        $hrCivilStatus = $this->hrCivilStatusRepository->findWithoutFail($id);

        if (empty($hrCivilStatus)) {
            Flash::error('Hr Civil Status not found');

            return redirect(route('company.hrCivilStatuses.index'));
        }

        $hrCivilStatus = $this->hrCivilStatusRepository->update($request->all(), $id);

        /*Flash::success('Hr Civil Status updated successfully.');*/
        Session::flash("successMessage", "Hr Civil Status updated successfully");

        return redirect(route('company.hrCivilStatuses.index'));
    }

    /**
     * Remove the specified hrCivilStatus from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $hrCivilStatus = $this->hrCivilStatusRepository->findWithoutFail($id);

        if (empty($hrCivilStatus)) {
            Flash::error('Hr Civil Status not found');

            return redirect(route('company.hrCivilStatuses.index'));
        }

        $this->hrCivilStatusRepository->delete($id);

        /*Flash::success('Hr Civil Status deleted successfully.');*/
        Session::flash("deleteMessage", "Hr Civil Status deleted successfully");

        return redirect(route('company.hrCivilStatuses.index'));
    }
}
