<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateCompanyContactPersonRequest;
use App\Http\Requests\Admin\UpdateCompanyContactPersonRequest;
use App\Repositories\Admin\CompanyContactPersonRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CompanyContactPersonController extends AppBaseController
{
    /** @var  CompanyContactPersonRepository */
    private $companyContactPersonRepository;

    public function __construct(CompanyContactPersonRepository $companyContactPersonRepo)
    {
        $this->companyContactPersonRepository = $companyContactPersonRepo;
    }

    /**
     * Display a listing of the CompanyContactPerson.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyContactPersonRepository->pushCriteria(new RequestCriteria($request));
        $companyContactPeople = $this->companyContactPersonRepository->all();

        return view('admin.company_contact_people.index')
            ->with('companyContactPeople', $companyContactPeople);
    }

    /**
     * Show the form for creating a new CompanyContactPerson.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.company_contact_people.create');
    }

    /**
     * Store a newly created CompanyContactPerson in storage.
     *
     * @param CreateCompanyContactPersonRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyContactPersonRequest $request)
    {
        $data = $request->all();

        /*echo "<pre>";
        print_r($data);
        echo "</pre>";

        exit;*/

        $input = [];
        $dateTime = date('Y-m-d h:i:s');

         $i = 0;
        foreach ($data['person'] as $person) {
            $input[$i]['name'] = $person['name'];
            $input[$i]['email'] = $person['email'];
            $input[$i]['phone'] = $person['phone'];
            $input[$i]['fax'] = $person['fax'];
            $input[$i]['address'] = $person['address'];
            $input[$i]['department'] = $person['department'];
            $input[$i]['designation'] = $person['designation'];
            $input[$i]['company_id'] = $data['company_id'];
            $input[$i]['created_at'] = $dateTime;
            $input[$i]['updated_at'] = $dateTime;

            $i++;
        }

        $companyContactPerson = $this->companyContactPersonRepository->insert($input);

        return response()->json(['success'=>1, 'msg'=>'Company contact persons have been added successfully']);
    }

    /**
     * Display the specified CompanyContactPerson.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companyContactPerson = $this->companyContactPersonRepository->findWithoutFail($id);

        if (empty($companyContactPerson)) {
            Flash::error('Company Contact Person not found');

            return redirect(route('admin.companyContactPeople.index'));
        }

        return view('admin.company_contact_people.show')->with('companyContactPerson', $companyContactPerson);
    }

    /**
     * Show the form for editing the specified CompanyContactPerson.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companyContactPerson = $this->companyContactPersonRepository->findWithoutFail($id);

        if (empty($companyContactPerson)) {
            Flash::error('Company Contact Person not found');

            return redirect(route('admin.companyContactPeople.index'));
        }

        return view('admin.company_contact_people.edit')->with('companyContactPerson', $companyContactPerson);
    }

    /**
     * Update the specified CompanyContactPerson in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyContactPersonRequest $request
     *
     * @return Response
     */
    public function update(UpdateCompanyContactPersonRequest $request)
    {

        $data = $request->all();

        /*echo "<pre>";
        print_r($data['person']);
        echo "</pre>";

        exit;*/

        $input = [];
        $dateTime = date('Y-m-d h:i:s');
        $arr = [];

        $i = 0;
        $index = 0;

        foreach ($data['person'] as $person) {

            $input['name'] = $person['name'];
            $input['email'] = $person['email'];
            $input['phone'] = $person['phone'];
            $input['fax'] = $person['fax'];
            $input['address'] = $person['address'];
            $input['department'] = $person['department'];
            $input['designation'] = $person['designation'];
            $input['company_id'] = $data['company_id'];

            if (strpos($person['id'], 'new-') === false) {
                $id = $person['id'];
            } else {
                $index = preg_replace('/[^0-9]/', '', $person['id']);
                $id = "";
            }
            
            $where = ['id' => $id];

            $companyContactPerson = $this->companyContactPersonRepository->updateOrCreate($where, $input);

            if (strpos($person['id'], 'new-') !== false) {

                $arr["$index"] = $companyContactPerson->id;
            }

        }
        

        return response()->json([
                                'success'=>1, 
                                'msg'=>'Company contact persons have been updated successfully',
                                'createdFields'=>$arr,
                                ]);
    }

    /**
     * Remove the specified CompanyContactPerson from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companyContactPerson = $this->companyContactPersonRepository->findWithoutFail($id);

        if (empty($companyContactPerson)) {
            Flash::error('Company Contact Person not found');

            return redirect(route('admin.companyContactPeople.index'));
        }

        $this->companyContactPersonRepository->delete($id);

        Flash::success('Company Contact Person deleted successfully.');

        return redirect(route('admin.companyContactPeople.index'));
    }
}
