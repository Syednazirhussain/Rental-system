<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateModuleRequest;
use App\Http\Requests\Admin\UpdateModuleRequest;
use App\Repositories\ModuleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ModuleController extends AppBaseController
{
    /** @var  ModuleRepository */
    private $moduleRepository;

    public function __construct(ModuleRepository $moduleRepo)
    {
        $this->moduleRepository = $moduleRepo;
    }

    /**
     * Display a listing of the Module.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->moduleRepository->pushCriteria(new RequestCriteria($request));

        $modules = $this->moduleRepository->orderBy('name', 'asc')->get();

        return view('admin.modules.index')->with('modules', $modules);
    }

    /**
     * Show the form for creating a new Module.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.modules.create');
    }

    /**
     * Store a newly created Module in storage.
     *
     * @param CreateModuleRequest $request
     *
     * @return Response
     */
    public function store(CreateModuleRequest $request)
    {
        $input = $request->all();

        $module = $this->moduleRepository->create($input);

        $request->session()->flash('msg.success', 'Module saved successfully.');


        return redirect(route('admin.modules.index'));
    }

    /**
     * Display the specified Module.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $module = $this->moduleRepository->findWithoutFail($id);

        if (empty($module)) {
            session()->flash('msg.error', 'Module not found');

            return redirect(route('admin.modules.index'));
        }

        return view('admin.modules.show')->with('module', $module);
    }

    /**
     * Show the form for editing the specified Module.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $module = $this->moduleRepository->findWithoutFail($id);

        if (empty($module)) {
            session()->flash('msg.error', 'Module not found');

            return redirect(route('admin.modules.index'));
        }

        return view('admin.modules.edit')->with('module', $module);
    }

    /**
     * Update the specified Module in storage.
     *
     * @param  int              $id
     * @param UpdateModuleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModuleRequest $request)
    {
        $module = $this->moduleRepository->findWithoutFail($id);

        if (empty($module)) {
            session()->flash('msg.error', 'Module not found');

            return redirect(route('admin.modules.index'));
        }

        $module = $this->moduleRepository->update($request->all(), $id);

        $request->session()->flash('msg.success', 'Module updated successfully.');


        return redirect(route('admin.modules.index'));
    }

    /**
     * Remove the specified Module from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $module = $this->moduleRepository->findWithoutFail($id);

        if (empty($module)) {

            session()->flash('msg.error', 'Module not found');

            return redirect(route('admin.modules.index'));

        }

        $this->moduleRepository->delete($id);

        session()->flash('msg.success', 'Module deleted successfully.');

        return redirect(route('admin.modules.index'));
    }
}
