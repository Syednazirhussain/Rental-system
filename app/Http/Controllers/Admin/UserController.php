<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Repositories\UserRepository;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use App\Models\UserRole;
use App\Models\User;
use App\Models\UserStatus;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
        $user_country = Country::pluck('name', 'id');
        $user_state = State::pluck('name', 'id');
        $user_city = City::pluck('name', 'id');

        return view('admin.users.index',
            ['users' => $users,
                'user_roles' => $user_roles,
                'user_status' => $user_status,
                'user_country' => $user_country,
                'user_state' => $user_state,
                'user_city' => $user_city
            ]);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        $user_role = UserRole::all();

        $userStatus = UserStatus::all(); 

        $technicalSettings = [
            'module'    => 'Modules',
            'payment'   => 'Payments',
            'companies' => 'Companies',
            'invoices'  => 'Invoices',
            'newletter' => 'News Letters',
            'user'      => 'Users',
            'setting'   => 'Setting'
        ];

        $data = [
            'user_role'         => $user_role,
            'technicalSettings' => $technicalSettings,
            'userStatus'        => $userStatus
        ];


        return view('admin.users.create',$data);
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
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'user_role_code' => 'required',
            'user_status_id' => 'required'   
        ]);

        $input = $request->except(['user_permission']);
        $password =  bcrypt($request->password);
        $input['password'] = $password;
        $input['permissions'] = $request->permissions;



        // $user = User::where('email', $request->email)->first();
        // if($user !== null) {
        //     $request->session()->flash('msg.error', 'User Email already exists.');
        //     return redirect(route('admin.users.index'));
        // }

        User::create($input);
        $request->session()->flash('msg.success', 'User saved successfully.');
        return redirect(route('admin.users.index'));
    }


    public function updateUser(Request $request)
    {
        $input = $request->all();

        // echo "<pre>";
        // print_r($input);

        $user =  $this->userRepository->findWithoutFail($input['userId']);
        $permissionArr =  explode(',',$user->permissions);

        if($input['Action'] == 'Remove')
        {

            if (in_array($input['permissions'], $permissionArr)) 
            {
                unset($permissionArr[array_search($input['permissions'],$permissionArr)]);
            }

            $permissions =  implode(',',$permissionArr);

            $status = $this->userRepository->updateUserPermission($input['userId'],$permissions);

            if($status != 'updated')
            {
                session()->flash('msg.error','User permission cannot be modified');
            }
            else
            {
                return $status;
            }
        }
        else if($input['Action'] == 'Add')
        {

            array_push($permissionArr,$input['permissions']);

            $permissions =  implode(',',$permissionArr);

            $status = $this->userRepository->updateUserPermission($input['userId'],$permissions);

            if($status != 'updated')
            {
                session()->flash('msg.error','User permission cannot be modified');
            }
            else
            {
                return $status;
            }

        }
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
        $user_country = Country::pluck('name', 'id');
        $user_state = State::pluck('name', 'id');
        $user_city = City::pluck('name', 'id');


        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }

        return view('admin.users.show',
            ['user' => $user,
                'user_roles' => $user_roles,
                'user_status' => $user_status,
                'user_country' => $user_country,
                'user_state' => $user_state,
                'user_city' => $user_city
                ]);
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
        $userStatus = UserStatus::all();

        $all_roles = UserRole::pluck('name', 'code');

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }

        $technicalSettings = [
            'module'    => 'Modules',
            'payment'   => 'Payments',
            'companies' => 'Companies',
            'invoices'  => 'Invoices',
            'newletter' => 'News Letters',
            'user'      => 'Users',
            'setting'   => 'Setting'
        ];

        $permissions =  explode(',',$user->permissions);

        $data = [
            'user'              => $user,
            'user_role'         => $user_role,
            'all_roles'         => $all_roles,
            'technicalSettings' => $technicalSettings,
            'permissions'       => $permissions,
            'userStatus'        => $userStatus
        ];

        return view('admin.users.edit',$data);
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


        $input = request()->except(['_token', '_method','user_permission']);
        $user = $this->userRepository->findWithoutFail($id);

        if($input['updatePassword'] == null)
        {
             $input['password'] = $user->password;
        }        
        else
        {
            $password =  bcrypt($request->updatePassword);
            $input['password'] = $password;
        }
        unset($input['updatePassword']);


        User::where('id', $id)->update($input);
        $request->session()->flash('msg.success', 'User updated successfully.');
        return redirect(route('admin.users.index'));
    }


    public function verifyEmail(Request $request)
    {
        $input = $request->all();
        if( count($input) > 0)
        {
            $user = $this->userRepository->verifyEmailExist($input['email']);
            if( count($user) > 0)
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
        // dd($request->all());        
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
