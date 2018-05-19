<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreateSupportCategoryRequest;
use App\Http\Requests\Company\UpdateSupportCategoryRequest;
use App\Repositories\SupportCategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CompanySupportCategoryController extends AppBaseController
{
    /** @var  SupportCategoryRepository */
    private $supportCategoryRepository;

    public function __construct(SupportCategoryRepository $supportCategoryRepo)
    {
        $this->supportCategoryRepository = $supportCategoryRepo;
    }

    /**
     * Display a listing of the SupportCategory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->supportCategoryRepository->pushCriteria(new RequestCriteria($request));
        $supportCategories = $this->supportCategoryRepository->all();

        return view('company.company_support_categories.index')
            ->with('supportCategories', $supportCategories);
    }

    /**
     * Show the form for creating a new SupportCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.company_support_categories.create');
    }

    /**
     * Store a newly created SupportCategory in storage.
     *
     * @param CreateSupportCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateSupportCategoryRequest $request)
    {

        $this->validate($request,[
            'name' => 'required'
        ]);

        $input = $request->all();

        $supportCategory = $this->supportCategoryRepository->create($input);

        // Flash::success('Support Category saved successfully.');

        session()->flash('msg.success','Support Category saved successfully.');

        return redirect(route('company.supportCategories.index'));
    }

    /**
     * Display the specified SupportCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $supportCategory = $this->supportCategoryRepository->findWithoutFail($id);

        if (empty($supportCategory)) {
            
            session()->flash('msg.error','Support Category not found');

            return redirect(route('company.supportCategories.index'));
        }

        return view('company.company_support_categories.show')->with('supportCategory', $supportCategory);
    }

    /**
     * Show the form for editing the specified SupportCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $supportCategory = $this->supportCategoryRepository->findWithoutFail($id);

        if (empty($supportCategory)) {

            session()->flash('msg.error','Support Category not found');

            return redirect(route('company.supportCategories.index'));
        }

        return view('company.company_support_categories.edit')->with('supportCategory', $supportCategory);
    }

    /**
     * Update the specified SupportCategory in storage.
     *
     * @param  int              $id
     * @param UpdateSupportCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSupportCategoryRequest $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);

        $supportCategory = $this->supportCategoryRepository->findWithoutFail($id);

        if (empty($supportCategory)) {

            session()->flash('msg.error','Support Category not found');

            return redirect(route('company.supportCategories.index'));
        }

        $supportCategory = $this->supportCategoryRepository->update($request->all(), $id);

        session()->flash('msg.success','Support Category updated successfully.');

        return redirect(route('company.supportCategories.index'));
    }

    /**
     * Remove the specified SupportCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $supportCategory = $this->supportCategoryRepository->findWithoutFail($id);

        if (empty($supportCategory)) {
            Flash::error('Support Category not found');

            return redirect(route('company.supportCategories.index'));
        }

        $this->supportCategoryRepository->delete($id);

        session()->flash('msg.success','Support Category deleted successfully.');

        return redirect(route('company.supportCategories.index'));
    }
}
