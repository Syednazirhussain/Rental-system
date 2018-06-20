<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreatehrEmploymentFormRequest;
use App\Http\Requests\Company\UpdatehrEmploymentFormRequest;
use App\Repositories\Company\hrEmploymentFormRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use App\Models\Company\hrEmploymentForm;

class hrEmploymentFormController extends AppBaseController
{
    /** @var  hrEmploymentFormRepository */
    private $hrEmploymentFormRepository;

    public function __construct(hrEmploymentFormRepository $hrEmploymentFormRepo)
    {
        $this->hrEmploymentFormRepository = $hrEmploymentFormRepo;
    }

    /**
     * Display a listing of the hrEmploymentForm.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->hrEmploymentFormRepository->pushCriteria(new RequestCriteria($request));
        $companyId         =   Auth::guard('company')->user()->companyUser()->first()->company_id;
        
        $hrEmploymentForms    = hrEmploymentForm::where('company_id',$companyId)->get();


        return view('company.hr_employment_forms.index')
            ->with('hrEmploymentForms', $hrEmploymentForms);
    }

    /**
     * Show the form for creating a new hrEmploymentForm.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.hr_employment_forms.create');
    }

    /**
     * Store a newly created hrEmploymentForm in storage.
     *
     * @param CreatehrEmploymentFormRequest $request
     *
     * @return Response
     */
    public function store(CreatehrEmploymentFormRequest $request)
    {
        $input = $request->all();
        $input['company_id'] =   Auth::guard('company')->user()->companyUser()->first()->company_id;

        $hrEmploymentForm = $this->hrEmploymentFormRepository->create($input);

        Flash::success('Hr Employment Form saved successfully.');

        return redirect(route('company.hrEmploymentForms.index'));
    }

    /**
     * Display the specified hrEmploymentForm.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $hrEmploymentForm = $this->hrEmploymentFormRepository->findWithoutFail($id);

        if (empty($hrEmploymentForm)) {
            Flash::error('Hr Employment Form not found');

            return redirect(route('company.hrEmploymentForms.index'));
        }

        return view('company.hr_employment_forms.show')->with('hrEmploymentForm', $hrEmploymentForm);
    }

    /**
     * Show the form for editing the specified hrEmploymentForm.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hrEmploymentForm = $this->hrEmploymentFormRepository->findWithoutFail($id);

        if (empty($hrEmploymentForm)) {
            Flash::error('Hr Employment Form not found');

            return redirect(route('company.hrEmploymentForms.index'));
        }

        return view('company.hr_employment_forms.edit')->with('hrEmploymentForm', $hrEmploymentForm);
    }

    /**
     * Update the specified hrEmploymentForm in storage.
     *
     * @param  int              $id
     * @param UpdatehrEmploymentFormRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatehrEmploymentFormRequest $request)
    {
        $hrEmploymentForm = $this->hrEmploymentFormRepository->findWithoutFail($id);

        if (empty($hrEmploymentForm)) {
            Flash::error('Hr Employment Form not found');

            return redirect(route('company.hrEmploymentForms.index'));
        }

        $hrEmploymentForm = $this->hrEmploymentFormRepository->update($request->all(), $id);

        Flash::success('Hr Employment Form updated successfully.');

        return redirect(route('company.hrEmploymentForms.index'));
    }

    /**
     * Remove the specified hrEmploymentForm from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $hrEmploymentForm = $this->hrEmploymentFormRepository->findWithoutFail($id);

        if (empty($hrEmploymentForm)) {
            Flash::error('Hr Employment Form not found');

            return redirect(route('company.hrEmploymentForms.index'));
        }

        $this->hrEmploymentFormRepository->delete($id);

        Flash::success('Hr Employment Form deleted successfully.');

        return redirect(route('company.hrEmploymentForms.index'));
    }
}
