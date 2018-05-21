<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreatePermissionRequest;
use App\Http\Requests\Admin\UpdatePermissionRequest;
use App\Repositories\PermissionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use Spatie\Permission\Models\Permission;

class PermissionController extends AppBaseController
{
    /** @var  PermissionRepository */
    private $permissionRepository;

    public function __construct(PermissionRepository $permissionRepo)
    {
        $this->permissionRepository = $permissionRepo;
    }

    /**
     * Display a listing of the Permission.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->permissionRepository->pushCriteria(new RequestCriteria($request));
        $permissions = $this->permissionRepository->all();

        return view('admin.permissions.index')->with('permissions', $permissions);
    }

    /**
     * Show the form for creating a new Permission.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created Permission in storage.
     *
     * @param CreatePermissionRequest $request
     *
     * @return Response
     */
    public function store(CreatePermissionRequest $request)
    {


        $this->validate($request,[
            'name' => 'required|string'
        ]);

        $input = $request->all();



        $permission = Permission::create(['name' => $input['name'] ]);
        // $permission = $this->permissionRepository->create($input);

        // Flash::success('Permission saved successfully.');
        session()->flash('msg.success','Permission saved successfully.');

        return redirect(route('admin.permissions.index'));
    }

    /**
     * Display the specified Permission.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $permission = $this->permissionRepository->findWithoutFail($id);

        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('admin.permissions.index'));
        }

        return view('admin.permissions.show')->with('permission', $permission);
    }

    /**
     * Show the form for editing the specified Permission.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $permission = $this->permissionRepository->findWithoutFail($id);

        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('admin.permissions.index'));
        }

        return view('admin.permissions.edit')->with('permission', $permission);
    }

    /**
     * Update the specified Permission in storage.
     *
     * @param  int              $id
     * @param UpdatePermissionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePermissionRequest $request)
    {
        $permission = $this->permissionRepository->findWithoutFail($id);

        if (empty($permission)) {

            session()->flash('msg.error','Permission not found');

            return redirect(route('admin.permissions.index'));
        }


        $permission->name = $request->name;

        $permission->save();

        // $permission = $this->permissionRepository->update($request->all(), $id);

        session()->flash('msg.success','Permission updated successfully.');

        return redirect(route('admin.permissions.index'));
    }

    /**
     * Remove the specified Permission from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $permission = $this->permissionRepository->findWithoutFail($id);

        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('admin.permissions.index'));
        }

        $this->permissionRepository->delete($id);

        // Flash::success('Permission deleted successfully.');

        session()->flash('msg.success','Permission deleted successfully.');

        return redirect(route('admin.permissions.index'));
    }
}
