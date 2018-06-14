<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreatehrCompanyProjectRequest;
use App\Http\Requests\Company\UpdatehrCompanyProjectRequest;
use App\Repositories\Company\hrCompanyProjectRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class hrCompanyProjectController extends AppBaseController
{
    /** @var  hrCompanyProjectRepository */
    private $hrCompanyProjectRepository;

    public function __construct(hrCompanyProjectRepository $hrCompanyProjectRepo)
    {
        $this->hrCompanyProjectRepository = $hrCompanyProjectRepo;
    }

    /**
     * Display a listing of the hrCompanyProject.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->hrCompanyProjectRepository->pushCriteria(new RequestCriteria($request));
        $hrCompanyProjects = $this->hrCompanyProjectRepository->all();

        return view('company.hr_company_projects.index')
            ->with('hrCompanyProjects', $hrCompanyProjects);
    }

    /**
     * Show the form for creating a new hrCompanyProject.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.hr_company_projects.create');
    }

    /**
     * Store a newly created hrCompanyProject in storage.
     *
     * @param CreatehrCompanyProjectRequest $request
     *
     * @return Response
     */
    public function store(CreatehrCompanyProjectRequest $request)
    {
        $input = $request->all();

        $hrCompanyProject = $this->hrCompanyProjectRepository->create($input);

        Flash::success('Hr Company Project saved successfully.');

        return redirect(route('company.hrCompanyProjects.index'));
    }

    /**
     * Display the specified hrCompanyProject.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $hrCompanyProject = $this->hrCompanyProjectRepository->findWithoutFail($id);

        if (empty($hrCompanyProject)) {
            Flash::error('Hr Company Project not found');

            return redirect(route('company.hrCompanyProjects.index'));
        }

        return view('company.hr_company_projects.show')->with('hrCompanyProject', $hrCompanyProject);
    }

    /**
     * Show the form for editing the specified hrCompanyProject.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hrCompanyProject = $this->hrCompanyProjectRepository->findWithoutFail($id);

        if (empty($hrCompanyProject)) {
            Flash::error('Hr Company Project not found');

            return redirect(route('company.hrCompanyProjects.index'));
        }

        return view('company.hr_company_projects.edit')->with('hrCompanyProject', $hrCompanyProject);
    }

    /**
     * Update the specified hrCompanyProject in storage.
     *
     * @param  int              $id
     * @param UpdatehrCompanyProjectRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatehrCompanyProjectRequest $request)
    {
        $hrCompanyProject = $this->hrCompanyProjectRepository->findWithoutFail($id);

        if (empty($hrCompanyProject)) {
            Flash::error('Hr Company Project not found');

            return redirect(route('company.hrCompanyProjects.index'));
        }

        $hrCompanyProject = $this->hrCompanyProjectRepository->update($request->all(), $id);

        Flash::success('Hr Company Project updated successfully.');

        return redirect(route('company.hrCompanyProjects.index'));
    }

    /**
     * Remove the specified hrCompanyProject from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $hrCompanyProject = $this->hrCompanyProjectRepository->findWithoutFail($id);

        if (empty($hrCompanyProject)) {
            Flash::error('Hr Company Project not found');

            return redirect(route('company.hrCompanyProjects.index'));
        }

        $this->hrCompanyProjectRepository->delete($id);

        Flash::success('Hr Company Project deleted successfully.');

        return redirect(route('company.hrCompanyProjects.index'));
    }
}
