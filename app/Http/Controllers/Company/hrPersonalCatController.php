<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreatehrPersonalCatRequest;
use App\Http\Requests\Company\UpdatehrPersonalCatRequest;
use App\Repositories\Company\hrPersonalCatRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;

class hrPersonalCatController extends AppBaseController
{
    /** @var  hrPersonalCatRepository */
    private $hrPersonalCatRepository;

    public function __construct(hrPersonalCatRepository $hrPersonalCatRepo)
    {
        $this->hrPersonalCatRepository = $hrPersonalCatRepo;
    }

    /**
     * Display a listing of the hrPersonalCat.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->hrPersonalCatRepository->pushCriteria(new RequestCriteria($request));
        $hrPersonalCats = $this->hrPersonalCatRepository->all();

        return view('company.hr_personal_cats.index')
            ->with('hrPersonalCats', $hrPersonalCats);
    }

    /**
     * Show the form for creating a new hrPersonalCat.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.hr_personal_cats.create');
    }

    /**
     * Store a newly created hrPersonalCat in storage.
     *
     * @param CreatehrPersonalCatRequest $request
     *
     * @return Response
     */
    public function store(CreatehrPersonalCatRequest $request)
    {
        $input = $request->all();

        $input['company_id'] =   Auth::guard('company')->user()->companyUser()->first()->company_id;  
        // dd($input['company_id']);
        $hrPersonalCat = $this->hrPersonalCatRepository->create($input);
        Flash::success('Hr Personal Cat saved successfully.');

        return redirect(route('company.hrPersonalCats.index'));
    }

    /**
     * Display the specified hrPersonalCat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $hrPersonalCat = $this->hrPersonalCatRepository->findWithoutFail($id);

        if (empty($hrPersonalCat)) {
            Flash::error('Hr Personal Cat not found');

            return redirect(route('company.hrPersonalCats.index'));
        }

        return view('company.hr_personal_cats.show')->with('hrPersonalCat', $hrPersonalCat);
    }

    /**
     * Show the form for editing the specified hrPersonalCat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hrPersonalCat = $this->hrPersonalCatRepository->findWithoutFail($id);

        if (empty($hrPersonalCat)) {
            Flash::error('Hr Personal Cat not found');

            return redirect(route('company.hrPersonalCats.index'));
        }

        return view('company.hr_personal_cats.edit')->with('hrPersonalCat', $hrPersonalCat);
    }

    /**
     * Update the specified hrPersonalCat in storage.
     *
     * @param  int              $id
     * @param UpdatehrPersonalCatRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatehrPersonalCatRequest $request)
    {
        $hrPersonalCat = $this->hrPersonalCatRepository->findWithoutFail($id);

        if (empty($hrPersonalCat)) {
            Flash::error('Hr Personal Cat not found');

            return redirect(route('company.hrPersonalCats.index'));
        }

        $hrPersonalCat = $this->hrPersonalCatRepository->update($request->all(), $id);

        Flash::success('Hr Personal Cat updated successfully.');

        return redirect(route('company.hrPersonalCats.index'));
    }

    /**
     * Remove the specified hrPersonalCat from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $hrPersonalCat = $this->hrPersonalCatRepository->findWithoutFail($id);

        if (empty($hrPersonalCat)) {
            Flash::error('Hr Personal Cat not found');

            return redirect(route('company.hrPersonalCats.index'));
        }

        $this->hrPersonalCatRepository->delete($id);

        Flash::success('Hr Personal Cat deleted successfully.');

        return redirect(route('company.hrPersonalCats.index'));
    }
}
