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
use Response;
use Faker\Factory as Faker;


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
    public function update(UpdateCompanyUserRequest $request)
    {

        $data = $request->all();

       /* echo "<pre>";
        print_r($data);
        echo "</pre>";

        exit;*/

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


                if (strpos($admin['user_id'], 'new-') !== false) {

                    $arr[$index]['id'] = $companyUser->id;
                    $arr[$index]['user_id'] = $adminUser->id;
                    $arr[$index]['email'] = $adminUser->email;
                }

            }
        
        }

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
