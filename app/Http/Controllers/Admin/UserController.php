<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Repositories\Admin\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use App\Models\UserRole;
use App\Models\User;
use App\Models\UserStatus;


class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->userRepository->pushCriteria(new RequestCriteria($request));
        $users = $this->userRepository->all();
        $user_roles = UserRole::pluck('name', 'code');
        $user_status = UserStatus::pluck('name', 'id');

        return view('admin.users.index', ['users' => $users, 'user_roles' => $user_roles, 'user_status' => $user_status]);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        $user_role = UserRole::all();
        return view('admin.users.create', ['user_role' => $user_role]);
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $password =  bcrypt($request->password);
        $input['password'] = $password;
        $input['user_status_id'] = "1";

        User::create($input);

        Flash::success('User saved successfully.');

        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findWithoutFail($id);
        $user_roles = UserRole::pluck('name', 'code');
        $user_status = UserStatus::pluck('name', 'id');

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }

        return view('admin.users.show', ['user' => $user, 'user_roles' => $user_roles, 'user_status' => $user_status]);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->findWithoutFail($id);
        $user_role = UserRole::all();
        $all_roles = UserRole::pluck('name', 'code');

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }

        return view('admin.users.edit', ['user' => $user, 'user_role' => $user_role, 'all_roles' => $all_roles]);
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $input = request()->except(['_token', '_method']);
        $password =  bcrypt($request->password);
        $input['password'] = $password;

        User::where('id', $id)->update($input);

        Flash::success('User updated successfully.');

        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('admin.users.index'));
    }


    // view login
    public function viewLogin()
    {
        return view('admin.auth.login');
    }


    // authenticate user
    public function authenticate(Request $request)
    {
        if (Auth::attempt(array('email'=>$request->input('email'), 'password'=>$request->input('password'),'user_role_code'=>'admin'))) {

            return redirect()->route('admin.dashboard');
                    

        } else {

            return redirect()->route('admin.login')
            ->with('errorLogin', 'Ooops! Invalid Email or Password')
            ->withInput();
        }
    }


    // logging out user from admin panel
    public function logout(Request $request) {

        if (Auth::check()) {
            
            Auth::logout();
            $request->session()->flush();
            return redirect()->route('admin.login');
        } 
    }
}
