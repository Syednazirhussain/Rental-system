<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateCompanyContractRequest;
use App\Http\Requests\Admin\UpdateCompanyContractRequest;
use App\Repositories\Admin\CompanyContractRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CompanyContractController extends AppBaseController
{
    /** @var  CompanyContractRepository */
    private $companyContractRepository;

    public function __construct(CompanyContractRepository $companyContractRepo)
    {
        $this->companyContractRepository = $companyContractRepo;
    }

    /**
     * Display a listing of the CompanyContract.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyContractRepository->pushCriteria(new RequestCriteria($request));
        $companyContracts = $this->companyContractRepository->all();

        return view('admin.company_contracts.index')
            ->with('companyContracts', $companyContracts);
    }

    /**
     * Show the form for creating a new CompanyContract.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.company_contracts.create');
    }

    /**
     * Store a newly created CompanyContract in storage.
     *
     * @param CreateCompanyContractRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyContractRequest $request)
    {
        $input = $request->all();

        $input['start_date'] = date('Y-m-d', strtotime($input['start_date']));
        $input['end_date'] = date('Y-m-d', strtotime($input['end_date']));

        /*echo "<pre>";
        print_r($input);
        echo "</pre>";

        exit;*/

        $companyContract = $this->companyContractRepository->create($input);

        return response()->json(['success'=>1, 'msg'=>'Company contract has been generated successfully']);
    }

    /**
     * Display the specified CompanyContract.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companyContract = $this->companyContractRepository->findWithoutFail($id);

        if (empty($companyContract)) {
            Flash::error('Company Contract not found');

            return redirect(route('admin.companyContracts.index'));
        }

        return view('admin.company_contracts.show')->with('companyContract', $companyContract);
    }

    /**
     * Show the form for editing the specified CompanyContract.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companyContract = $this->companyContractRepository->findWithoutFail($id);

        if (empty($companyContract)) {
            Flash::error('Company Contract not found');

            return redirect(route('admin.companyContracts.index'));
        }

        return view('admin.company_contracts.edit')->with('companyContract', $companyContract);
    }

    /**
     * Update the specified CompanyContract in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyContractRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyContractRequest $request)
    {
        $companyContract = $this->companyContractRepository->findWithoutFail($id);

        if (empty($companyContract)) {
            Flash::error('Company Contract not found');

            return redirect(route('admin.companyContracts.index'));
        }

        $companyContract = $this->companyContractRepository->update($request->all(), $id);

        Flash::success('Company Contract updated successfully.');

        return redirect(route('admin.companyContracts.index'));
    }

    /**
     * Remove the specified CompanyContract from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companyContract = $this->companyContractRepository->findWithoutFail($id);

        if (empty($companyContract)) {
            Flash::error('Company Contract not found');

            return redirect(route('admin.companyContracts.index'));
        }

        $this->companyContractRepository->delete($id);

        Flash::success('Company Contract deleted successfully.');

        return redirect(route('admin.companyContracts.index'));
    }
}
