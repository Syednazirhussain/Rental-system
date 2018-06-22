<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreatehrSalaryTypeRequest;
use App\Http\Requests\Company\UpdatehrSalaryTypeRequest;
use App\Repositories\Company\hrSalaryTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use App\Models\Company\hrSalaryType;

class hrSalaryTypeController extends AppBaseController
{
    /** @var  hrSalaryTypeRepository */
    private $hrSalaryTypeRepository;

    public function __construct(hrSalaryTypeRepository $hrSalaryTypeRepo)
    {
        $this->hrSalaryTypeRepository = $hrSalaryTypeRepo;
    }

    /**
     * Display a listing of the hrSalaryType.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->hrSalaryTypeRepository->pushCriteria(new RequestCriteria($request));
        $companyId         =   Auth::guard('company')->user()->companyUser()->first()->company_id;
        
        $hrSalaryTypes    = hrSalaryType::where('company_id',$companyId)->get();


        return view('company.hr_salary_types.index')
            ->with('hrSalaryTypes', $hrSalaryTypes);
    }

    /**
     * Show the form for creating a new hrSalaryType.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.hr_salary_types.create');
    }

    /**
     * Store a newly created hrSalaryType in storage.
     *
     * @param CreatehrSalaryTypeRequest $request
     *
     * @return Response
     */
    public function store(CreatehrSalaryTypeRequest $request)
    {
        $input = $request->all();
        $input['company_id'] =   Auth::guard('company')->user()->companyUser()->first()->company_id;

        $hrSalaryType = $this->hrSalaryTypeRepository->create($input);

        Flash::success('Hr Salary Type saved successfully.');

        return redirect(route('company.hrSalaryTypes.index'));
    }

    /**
     * Display the specified hrSalaryType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $hrSalaryType = $this->hrSalaryTypeRepository->findWithoutFail($id);

        if (empty($hrSalaryType)) {
            Flash::error('Hr Salary Type not found');

            return redirect(route('company.hrSalaryTypes.index'));
        }

        return view('company.hr_salary_types.show')->with('hrSalaryType', $hrSalaryType);
    }

    /**
     * Show the form for editing the specified hrSalaryType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hrSalaryType = $this->hrSalaryTypeRepository->findWithoutFail($id);

        if (empty($hrSalaryType)) {
            Flash::error('Hr Salary Type not found');

            return redirect(route('company.hrSalaryTypes.index'));
        }

        return view('company.hr_salary_types.edit')->with('hrSalaryType', $hrSalaryType);
    }

    /**
     * Update the specified hrSalaryType in storage.
     *
     * @param  int              $id
     * @param UpdatehrSalaryTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatehrSalaryTypeRequest $request)
    {
        $hrSalaryType = $this->hrSalaryTypeRepository->findWithoutFail($id);

        if (empty($hrSalaryType)) {
            Flash::error('Hr Salary Type not found');

            return redirect(route('company.hrSalaryTypes.index'));
        }

        $hrSalaryType = $this->hrSalaryTypeRepository->update($request->all(), $id);

        Flash::success('Hr Salary Type updated successfully.');

        return redirect(route('company.hrSalaryTypes.index'));
    }

    /**
     * Remove the specified hrSalaryType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $hrSalaryType = $this->hrSalaryTypeRepository->findWithoutFail($id);

        if (empty($hrSalaryType)) {
            Flash::error('Hr Salary Type not found');

            return redirect(route('company.hrSalaryTypes.index'));
        }

        $this->hrSalaryTypeRepository->delete($id);

        Flash::success('Hr Salary Type deleted successfully.');

        return redirect(route('company.hrSalaryTypes.index'));
    }
}
