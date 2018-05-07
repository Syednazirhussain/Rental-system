<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateUserRoleRequest;
use App\Http\Requests\Admin\UpdateUserRoleRequest;
use App\Repositories\UserRoleRepository;
use App\Repositories\PermissionRepository;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserRoleController extends AppBaseController
{
    /** @var  UserRoleRepository */
    private $userRoleRepository;
    private $permissionRepository;

    public function __construct(
        UserRoleRepository $userRoleRepo,
        PermissionRepository $PermissionRepository
    )
    {
        $this->userRoleRepository = $userRoleRepo;
        $this->permissionRepository = $PermissionRepository;
    }

    /**
     * Display a listing of the UserRole.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->userRoleRepository->pushCriteria(new RequestCriteria($request));
        $userRoles = $this->userRoleRepository->all();

        return view('admin.user_roles.index')->with('userRoles', $userRoles);
    }

    /**
     * Show the form for creating a new UserRole.
     *
     * @return Response
     */
    public function create()
    {
        $permissions = $this->permissionRepository->all();

        $data = [
            'permissions' => $permissions
        ];

        return view('admin.user_roles.create',$data);
    }


    public function checkCode(Request $request)
    {
        $input = $request->all();
        if( count($input) > 0)
        {
            $roleCode = $this->userRoleRepository->verfiyRoleCodeExist($input['code']);
            if( count($roleCode) > 0)
            {
                $success = 0;
                $response = 401;
            }
            else
            {
                $success = 1;
                $response = 200;
            }
        }
        else
        {
            $success = 0;
            $response = 404;
        }
        return response()->json(['success' => $success,'code' => $response]);
    }

    /**
     * Store a newly created UserRole in storage.
     *
     * @param CreateUserRoleRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRoleRequest $request)
    {
        $input = $request->all();

        $permissionArr =  explode(',', $input['permissions']);

        $role = Role::create([
            'name' => $input['name'],
            'code' => $input['code']
        ]);

        $role->givePermissionTo($permissionArr);

        // $userRole = $this->userRoleRepository->create($input);

        $request->session()->flash('msg.success', 'User Role saved successfully.');

        return redirect(route('admin.userRoles.index'));
    }

    /**
     * Display the specified UserRole.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userRole = $this->userRoleRepository->findWithoutFail($id);

        if (empty($userRole)) {
            session()->flash('msg.error', 'User Role not found');

            return redirect(route('admin.userRoles.index'));
        }

        return view('admin.user_roles.show')->with('userRole', $userRole);
    }

    /**
     * Show the form for editing the specified UserRole.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userRole = $this->userRoleRepository->findWithoutFail($id);

        $permissions = $this->permissionRepository->all();

        if (empty($userRole)) {
            session()->flash('msg.error', 'User Role not found');

            return redirect(route('admin.userRoles.index'));
        }

        $data = [
            'permissions' => $permissions,
            'userRole'    => $userRole  
        ];

        return view('admin.user_roles.edit');
    }

    /**
     * Update the specified UserRole in storage.
     *
     * @param  int              $id
     * @param UpdateUserRoleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRoleRequest $request)
    {
        $userRole = $this->userRoleRepository->findWithoutFail($id);

        if (empty($userRole)) {
            session()->flash('msg.error', 'User Role not found');

            return redirect(route('admin.userRoles.index'));
        }

        $userRole = $this->userRoleRepository->update($request->all(), $id);

        $request->session()->flash('msg.success', 'User Role updated successfully.');


        return redirect(route('admin.userRoles.index'));
    }

    /**
     * Remove the specified UserRole from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userRole = $this->userRoleRepository->findWithoutFail($id);

        if (empty($userRole)) {
            session()->flash('msg.error', 'User Role not found');

            return redirect(route('admin.userRoles.index'));
        }

        $this->userRoleRepository->delete($id);

        session()->flash('msg.success', 'User Role deleted successfully.');


        return redirect(route('admin.userRoles.index'));
    }
}
