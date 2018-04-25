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

use Illuminate\Support\Facades\Storage;

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

        $user = User::where('email', $request->email)->first();
        if($user !== null) {
            $request->session()->flash('msg.error', 'User Email already exists.');
            return redirect(route('admin.users.index'));
        }

        User::create($input);
        $request->session()->flash('msg.success', 'User saved successfully.');
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
        $request->session()->flash('msg.success', 'User updated successfully.');
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
        if (Auth::attempt(array('email'=>$request->input('email'), 'password'=>$request->input('password'),'user_role_code'=>'admin')))
        {
            return redirect()->route('admin.dashboard');
        } 
        else 
        {
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

    // view account settings
    public function accountSettingsView()
    {   

        return view('admin.users.account_settings');
    }




    // store account settings
    public function accountSettingsStore(Request $request)
    {   

        $id                 = Auth::user()->id;
        $name               = $request->name;
        $email              = $request->email;
        $password           = $request->password;


        $updateArr = [
                        'name' => $name,
                        'email' => $email,
                    ];


        if ($request->hasFile('profile_pic')) {

            $path = $request->file('profile_pic')->store('public/company_logos');

            

            $path = explode("/", $path);



            $updateArr['profile_pic'] = $path[2];

        }



        if ($password != "" ) {
            
            $new_password = bcrypt($password);
            $updateArr['password'] = $new_password;
        } 


        $user = $this->userRepository->adminAccountSettings($updateArr, $id);
        $request->session()->flash('msg.success', 'Account Settings updated successfully.');
        return redirect()->route('admin.accountSettings.view');
    
    }





    // remove profile pic account settings
    public function accountSettingsRemoveProfilePic(Request $request)
    {   

        if ($request->ajax()) {

            $profilePicName = $request->profilePicName;
            $sep = DIRECTORY_SEPARATOR;

            Storage::delete('public'.$sep.'company_logos'.$sep.$profilePicName);

            $this->userRepository->adminAccountSettingsRemoveProfilePic($profilePicName);

            $result['success'] = 1;

        } else {

            $result['success'] = 0;

        }


        return response()->json($result);


    }
}
