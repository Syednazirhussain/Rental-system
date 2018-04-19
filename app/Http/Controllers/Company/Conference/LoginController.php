<?php

namespace App\Http\Controllers\Company\Conference;

use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;


class LoginController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display the company user login page.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('company.auth.login');
    }



    /**
     * Authenticating the company user.
     *
     * @param Request $request
     * @return Response
     */
    public function authenticate(Request $request)
    {
        if (Auth::guard('company')->attempt(array('email'=>$request->input('email'), 'password'=>$request->input('password'),'user_role_code'=>'company_admin'))) {

            return redirect()->route('temp.company.dashboard');
                    

        } else {

            return redirect()->route('temp.company.login')
            ->with('errorLogin', 'Ooops! Invalid Email or Password')
            ->withInput();
        }
    }


    // logging out user from admin panel
    public function logout(Request $request) {

        if (Auth::check()) {
            
            Auth::logout();
            $request->session()->flush();
            return redirect()->route('temp.company.login');
        } 
    }



    /**
     * Display company dashboard.
     *
     * @param Request $request
     * @return Response
     */
    public function dashboard()
    {
        return view('company.dashboard.index');
    }
}
