<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreatehrVacationCategoryRequest;
use App\Http\Requests\Company\UpdatehrVacationCategoryRequest;
use App\Repositories\Company\hrVacationCategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use App\Models\Company\hrVacationCategory;

class hrVacationCategoryController extends AppBaseController
{
    /** @var  hrVacationCategoryRepository */
    private $hrVacationCategoryRepository;

    public function __construct(hrVacationCategoryRepository $hrVacationCategoryRepo)
    {
        $this->hrVacationCategoryRepository = $hrVacationCategoryRepo;
    }

    /**
     * Display a listing of the hrVacationCategory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->hrVacationCategoryRepository->pushCriteria(new RequestCriteria($request));
        $companyId         =   Auth::guard('company')->user()->companyUser()->first()->company_id;
        
        $hrVacationCategories    = hrVacationCategory::where('company_id',$companyId)->get();


        return view('company.hr_vacation_categories.index')
            ->with('hrVacationCategories', $hrVacationCategories);
    }

    /**
     * Show the form for creating a new hrVacationCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.hr_vacation_categories.create');
    }

    /**
     * Store a newly created hrVacationCategory in storage.
     *
     * @param CreatehrVacationCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreatehrVacationCategoryRequest $request)
    {
        $input = $request->all();
        $input['company_id'] =   Auth::guard('company')->user()->companyUser()->first()->company_id;

        $hrVacationCategory = $this->hrVacationCategoryRepository->create($input);

        Flash::success('Hr Vacation Category saved successfully.');

        return redirect(route('company.hrVacationCategories.index'));
    }

    /**
     * Display the specified hrVacationCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $hrVacationCategory = $this->hrVacationCategoryRepository->findWithoutFail($id);

        if (empty($hrVacationCategory)) {
            Flash::error('Hr Vacation Category not found');

            return redirect(route('company.hrVacationCategories.index'));
        }

        return view('company.hr_vacation_categories.show')->with('hrVacationCategory', $hrVacationCategory);
    }

    /**
     * Show the form for editing the specified hrVacationCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hrVacationCategory = $this->hrVacationCategoryRepository->findWithoutFail($id);

        if (empty($hrVacationCategory)) {
            Flash::error('Hr Vacation Category not found');

            return redirect(route('company.hrVacationCategories.index'));
        }

        return view('company.hr_vacation_categories.edit')->with('hrVacationCategory', $hrVacationCategory);
    }

    /**
     * Update the specified hrVacationCategory in storage.
     *
     * @param  int              $id
     * @param UpdatehrVacationCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatehrVacationCategoryRequest $request)
    {
        $hrVacationCategory = $this->hrVacationCategoryRepository->findWithoutFail($id);

        if (empty($hrVacationCategory)) {
            Flash::error('Hr Vacation Category not found');

            return redirect(route('company.hrVacationCategories.index'));
        }

        $hrVacationCategory = $this->hrVacationCategoryRepository->update($request->all(), $id);

        Flash::success('Hr Vacation Category updated successfully.');

        return redirect(route('company.hrVacationCategories.index'));
    }

    /**
     * Remove the specified hrVacationCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $hrVacationCategory = $this->hrVacationCategoryRepository->findWithoutFail($id);

        if (empty($hrVacationCategory)) {
            Flash::error('Hr Vacation Category not found');

            return redirect(route('company.hrVacationCategories.index'));
        }

        $this->hrVacationCategoryRepository->delete($id);

        Flash::success('Hr Vacation Category deleted successfully.');

        return redirect(route('company.hrVacationCategories.index'));
    }
}
