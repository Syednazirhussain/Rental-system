<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreateHRCoursesRequest;
use App\Http\Requests\Company\UpdateHRCoursesRequest;
use App\Repositories\Company\HRCoursesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class HRCoursesController extends AppBaseController
{
    /** @var  HRCoursesRepository */
    private $hRCoursesRepository;

    public function __construct(HRCoursesRepository $hRCoursesRepo)
    {
        $this->hRCoursesRepository = $hRCoursesRepo;
    }

    /**
     * Display a listing of the HRCourses.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->hRCoursesRepository->pushCriteria(new RequestCriteria($request));
        $hRCourses = $this->hRCoursesRepository->all();

        return view('company.h_r_courses.index')
            ->with('hRCourses', $hRCourses);
    }

    /**
     * Show the form for creating a new HRCourses.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.h_r_courses.create');
    }

    /**
     * Store a newly created HRCourses in storage.
     *
     * @param CreateHRCoursesRequest $request
     *
     * @return Response
     */
    public function store(CreateHRCoursesRequest $request)
    {
        $input = $request->all();

        $hRCourses = $this->hRCoursesRepository->create($input);

        if ($hRCourses) 
        {
            session()->flash('msg.success','HR Courses saved successfully.');
        }

        return redirect(route('company.hRCourses.index'));
    }

    /**
     * Display the specified HRCourses.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $hRCourses = $this->hRCoursesRepository->findWithoutFail($id);

        if (empty($hRCourses)) {
            Flash::error('H R Courses not found');

            return redirect(route('company.hRCourses.index'));
        }

        return view('company.h_r_courses.show')->with('hRCourses', $hRCourses);
    }

    /**
     * Show the form for editing the specified HRCourses.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hRCourses = $this->hRCoursesRepository->findWithoutFail($id);

        if (empty($hRCourses)) {
            Flash::error('H R Courses not found');

            return redirect(route('company.hRCourses.index'));
        }

        return view('company.h_r_courses.edit')->with('hRCourses', $hRCourses);
    }

    /**
     * Update the specified HRCourses in storage.
     *
     * @param  int              $id
     * @param UpdateHRCoursesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHRCoursesRequest $request)
    {
        $hRCourses = $this->hRCoursesRepository->findWithoutFail($id);

        if (empty($hRCourses)) {
            Flash::error('H R Courses not found');

            return redirect(route('company.hRCourses.index'));
        }

        $hRCourses = $this->hRCoursesRepository->update($request->all(), $id);

        if($hRCourses)
        {
            session()->flash('msg.success','HR Courses updated successfully.');
        }

        return redirect(route('company.hRCourses.index'));
    }

    /**
     * Remove the specified HRCourses from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $hRCourses = $this->hRCoursesRepository->findWithoutFail($id);

        if (empty($hRCourses)) {
            Flash::error('H R Courses not found');

            return redirect(route('company.hRCourses.index'));
        }

        $this->hRCoursesRepository->delete($id);

        session()->flash('msg.success','HR Courses deleted successfully.');

        return redirect(route('company.hRCourses.index'));
    }
}
