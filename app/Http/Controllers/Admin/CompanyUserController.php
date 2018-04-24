<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateCompanyUserRequest;
use App\Http\Requests\Admin\UpdateCompanyUserRequest;
use App\Repositories\CompanyUserRepository;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Faker\Factory as Faker;
use Session;

use App\Mail\AdminAccountConfirmation;
use Mail;

class CompanyUserController extends AppBaseController
{
    /** @var  CompanyUserRepository */
    private $companyUserRepository;
    private $userRepository;


    public function __construct(CompanyUserRepository $companyUserRepo, UserRepository $userRepo)
    {
        $this->companyUserRepository = $companyUserRepo;
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the CompanyUser.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyUserRepository->pushCriteria(new RequestCriteria($request));
        $companyUsers = $this->companyUserRepository->all();

        return view('admin.company_users.index')
            ->with('companyUsers', $companyUsers);
    }

    /**
     * Show the form for creating a new CompanyUser.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.company_users.create');
    }

    /**
     * Store a newly created CompanyUser in storage.
     *
     * @param CreateCompanyUserRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyUserRequest $request)
    {

        $data = $request->all();

        $email = [];
        $password = [];
        $name = [];

        for($i = 0 ; $i<count($data['admin']) ; $i++)
        {
            $name[$i]     = $data['admin'][$i]['name'];
            $email[$i]    = $data['admin'][$i]['email'];
            $password[$i] = $data['admin'][$i]['password'];
        }

        // For Testing admin user emails
        // $this->sendEmailAndPasswordToCompanyUsersAccount($name,$email,$password);
        // exit;die();

        $input = [];
        $userIds = [];


        $i = 0;

        foreach($data['admin'] as $admin) {
            
            $faker = Faker::create();

           // $input[$i]['company_id'] = $data['company_id'];
            $input['name'] = $admin['name'];
            $input['email'] = $admin['email'];
            $input['password'] = bcrypt($admin['password']);
            $input['user_role_code'] = 'company_admin';
            $input['user_status_id'] = 1;
            $input['uuid'] = $faker->uuid;;


            $user = $this->userRepository->create($input);

            $companyUser[$i]['user_id'] = $user->id;
            $companyUser[$i]['company_id'] = $data['company_id'];
            $i++;
        }

        $companyUser = $this->companyUserRepository->insert($companyUser);

        if($companyUser)
        {
            $this->sendEmailAndPasswordToCompanyUsersAccount($name,$email,$password);
        }

        app('App\Http\Controllers\Admin\CompanyInvoiceController')->createInvoiceByCompanyId($data['company_id']);
        
        // Admin\CompanyInvoiceController@createInvoiceByCompanyId

        return response()->json(['success'=>1, 'msg'=>'Company admins have been created successfully']);
        
    }

    /**
     * Display the specified CompanyUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companyUser = $this->companyUserRepository->findWithoutFail($id);

        if (empty($companyUser)) {
            Flash::error('Company User not found');

            return redirect(route('admin.companyUsers.index'));
        }

        return view('admin.company_users.show')->with('companyUser', $companyUser);
    }

    /**
     * Show the form for editing the specified CompanyUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companyUser = $this->companyUserRepository->findWithoutFail($id);

        if (empty($companyUser)) {
            Flash::error('Company User not found');

            return redirect(route('admin.companyUsers.index'));
        }

        return view('admin.company_users.edit')->with('companyUser', $companyUser);
    }

    /**
     * Update the specified CompanyUser in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyUserRequest $request
     *
     * @return Response
     */

    private function sendEmailAndPasswordToCompanyUsersAccount($username = [],$email = [] , $password = [])
    {
        for($i = 0 ; $i<count($email) ; $i++)
        {
            $data = [
                'username'  => $username[$i],
                'email'     => $email[$i],
                'password'  => $password[$i],
                'url'       => route('temp.company.authenticate')
            ];

            Mail::to($email[$i])->send(new AdminAccountConfirmation($data));
        }

    }



    public function update(UpdateCompanyUserRequest $request)
    {

        $data = $request->all();

        // IF Anyone want email confirmation functionality on edit
        // $email = [];
        // $password = [];
        // $name = [];

        // for($i = 0 ; $i<count($data['admin']) ; $i++)
        // {
        //     $name[$i]     = $data['admin'][$i]['name'];
        //     $email[$i]    = $data['admin'][$i]['email'];
        //     $password[$i] = $data['admin'][$i]['password'];
        // }
        
        // For Testing admin user emails
        // $this->sendEmailAndPasswordToCompanyUsersAccount($name,$email,$password);
        // exit;die();

        $input = [];
        $companyInput = [];
        $arr = [];

        if (isset($data['admin'])) {
            
            $i = 0;
            $index = 0;

            foreach ($data['admin'] as $admin) {

                $faker = Faker::create();


                $input['name'] = $admin['name'];
                $input['email'] = $admin['email'];

                if (!empty(trim($admin['password']))) {
                    $input['password'] = bcrypt($admin['password']);
                }

                

                if (strpos($admin['user_id'], 'new-') === false) {
                    $id = $admin['user_id'];
                    $adminId = $admin['id'];

                    unset($input['uuid']);
                    unset($input['user_role_code']);
                    unset($input['user_status_id']);

                } else {
                    $index = preg_replace('/[^0-9]/', '', $admin['user_id']);
                    
                    $input['uuid'] = $faker->uuid;;
                    $input['user_role_code'] = 'company_admin';
                    $input['user_status_id'] = 1;

                    $id = "";
                    $adminId = "";

                    /*echo "<pre>";
                    print_r($input);
                    echo "</pre>";
                    exit;*/
                }
                
                $where = ['id' => $id];
                $whereAdmin = ['id' => $adminId];

                $adminUser = $this->userRepository->updateOrCreate($where, $input);

                $companyInput['user_id'] = $adminUser->id;
                $companyInput['company_id'] = $data['company_id'];

                $companyUser = $this->companyUserRepository->updateOrCreate($whereAdmin, $companyInput);

                // IF Anyone want email confirmation functionality on edit

                // If true then created otherwise maybe updated
                // $wasCreated = $companyUser->wasRecentlyCreated; 

                // if($wasCreated)
                // {
                //     $this->sendEmailAndPasswordToCompanyUsersAccount($name,$email,$password);
                // }


                if (strpos($admin['user_id'], 'new-') !== false) {

                    $arr[$index]['id'] = $companyUser->id;
                    $arr[$index]['user_id'] = $adminUser->id;
                    $arr[$index]['email'] = $adminUser->email;
                }

            }
        
        }


        session()->flash('msg.success', 'Company details have been updated successfully');


        return response()->json([
                                'success'=>1, 
                                'msg'=>'Company admins have been updated successfully',
                                'createdFields'=>$arr,
                                ]);

    }

    /**
     * Remove the specified CompanyUser from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy(Request $request)
    {


        $id = $request->only('admin_id');

        $id = $id['admin_id'];

        // echo $id;
        // exit;
        
        $companyUser = $this->companyUserRepository->findWithoutFail($id);

        if (empty($companyUser)) {

            $success = 0;
            $msg = "Company admin not found";
        }


        $this->userRepository->delete($companyUser->user_id);

        $this->companyUserRepository->delete($id);

        $success = 1;
        $msg = "Company admin deleted successfully";

        return response()->json([
                                'success'=>$success, 
                                'msg'=>$msg,
                                ]);
    }
}
