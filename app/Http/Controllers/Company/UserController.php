<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Repositories\Admin\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Mail;
use Auth;
use App\Models\UserRole;
use App\Models\User;
use App\Models\UserStatus;
use App\Models\CompanyUser;
use App\Models\Company;


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
        $company_id = Auth::user()->companyUser()->first()->company_id;
        $users = Company::find($company_id)->companyUsers()->join('users', 'user_id', '=', 'users.id')->get();

        $user_roles = UserRole::pluck('name', 'code');
        $user_status = UserStatus::pluck('name', 'id');

        return view('company.users.index', ['users' => $users, 'user_roles' => $user_roles, 'user_status' => $user_status]);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        $user_role = UserRole::all();
        return view('company.users.create', ['user_role' => $user_role]);
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
        if ($input['user_role_code'] == 'admin' || $input['user_role_code'] == 'customer_admin')
            $input['user_role_code'] = "company_customer";

        $user = User::where('email', $request->email)->first();
        if($user !== null) {
            $request->session()->flash('msg.error', 'User Email already exists.');
            return redirect(route('company.users.index'));
        }

        $company_admin = Auth::user();
        $created_user = User::create($input);

        if($created_user) {
            Mail::send('emails.mailUserRegister', ['email' => $request->email, 'password' => $request->password],
                function($message) use ($company_admin, $request) {
                    $message->from ($company_admin->email);
                    $message->to($request->email);
                    $message->subject("Your account created at Highnox");
                });
        }
        $company_user['user_id'] = $created_user->id;
        $company_user['company_id'] = Auth::user()->companyUser()->first()->company_id;
        // Create companyUser after creating the user.
        CompanyUser::create($company_user);

        $request->session()->flash('msg.success', 'User saved successfully.');
        return redirect(route('company.users.index'));
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

            return redirect(route('company.users.index'));
        }

        return view('company.users.show', ['user' => $user, 'user_roles' => $user_roles, 'user_status' => $user_status]);
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

            return redirect(route('company.users.index'));
        }

        return view('company.users.edit', ['user' => $user, 'user_role' => $user_role, 'all_roles' => $all_roles]);
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
        //Check role
        if ($input['user_role_code'] == 'admin' || $input['user_role_code'] == 'customer_admin')
            $input['user_role_code'] = "company_customer";

        User::where('id', $id)->update($input);
        $request->session()->flash('msg.success', 'User updated successfully.');
        return redirect(route('company.users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('company.users.index'));
        }

        $user->companyUser()->first()->delete();
        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');
        $request->session()->flash('msg.success', 'User deleted successfully.');

        return redirect(route('company.users.index'));
    }


    // view login
    public function viewLogin()
    {
        return view('company.auth.login');
    }


    // authenticate user
    public function authenticate(Request $request)
    {
        if (Auth::attempt(array('email'=>$request->input('email'), 'password'=>$request->input('password'),'user_role_code'=>'company_admin'))) {

            return redirect()->route('company.dashboard');
                    

        } else {

            return redirect()->route('company.login')
            ->with('errorLogin', 'Ooops! Invalid Email or Password')
            ->withInput();
        }
    }


    // logging out user from company admin panel
    public function logout(Request $request) {

        if (Auth::check()) {
            
            Auth::logout();
            $request->session()->flush();
            return redirect()->route('company.login');
        } 
    }
}
