<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreateCompanyHrOtherInfoRequest;
use App\Http\Requests\Company\UpdateCompanyHrOtherInfoRequest;
use App\Repositories\Company\CompanyHrOtherInfoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CompanyHrOtherInfoController extends AppBaseController
{
    /** @var  CompanyHrOtherInfoRepository */
    private $companyHrOtherInfoRepository;

    public function __construct(CompanyHrOtherInfoRepository $companyHrOtherInfoRepo)
    {
        $this->companyHrOtherInfoRepository = $companyHrOtherInfoRepo;
    }

    /**
     * Display a listing of the CompanyHrOtherInfo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyHrOtherInfoRepository->pushCriteria(new RequestCriteria($request));
        $companyHrOtherInfos = $this->companyHrOtherInfoRepository->all();

        return view('company.company_hr_other_infos.index')
            ->with('companyHrOtherInfos', $companyHrOtherInfos);
    }

    /**
     * Show the form for creating a new CompanyHrOtherInfo.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.company_hr_other_infos.create');
    }

    /**
     * Store a newly created CompanyHrOtherInfo in storage.
     *
     * @param CreateCompanyHrOtherInfoRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyHrOtherInfoRequest $request)
    {
        $input = $request->all();

        $companyHrOtherInfo = $this->companyHrOtherInfoRepository->create($input);

        Flash::success('Company Hr Other Info saved successfully.');

        return redirect(route('company.companyHrOtherInfos.index'));
    }

    /**
     * Display the specified CompanyHrOtherInfo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companyHrOtherInfo = $this->companyHrOtherInfoRepository->findWithoutFail($id);

        if (empty($companyHrOtherInfo)) {
            Flash::error('Company Hr Other Info not found');

            return redirect(route('company.companyHrOtherInfos.index'));
        }

        return view('company.company_hr_other_infos.show')->with('companyHrOtherInfo', $companyHrOtherInfo);
    }

    /**
     * Show the form for editing the specified CompanyHrOtherInfo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companyHrOtherInfo = $this->companyHrOtherInfoRepository->findWithoutFail($id);

        if (empty($companyHrOtherInfo)) {
            Flash::error('Company Hr Other Info not found');

            return redirect(route('company.companyHrOtherInfos.index'));
        }

        return view('company.company_hr_other_infos.edit')->with('companyHrOtherInfo', $companyHrOtherInfo);
    }

    /**
     * Update the specified CompanyHrOtherInfo in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyHrOtherInfoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyHrOtherInfoRequest $request)
    {
        $companyHrOtherInfo = $this->companyHrOtherInfoRepository->findWithoutFail($id);

        if (empty($companyHrOtherInfo)) {
            Flash::error('Company Hr Other Info not found');

            return redirect(route('company.companyHrOtherInfos.index'));
        }

        $companyHrOtherInfo = $this->companyHrOtherInfoRepository->update($request->all(), $id);

        Flash::success('Company Hr Other Info updated successfully.');

        return redirect(route('company.companyHrOtherInfos.index'));
    }

    /**
     * Remove the specified CompanyHrOtherInfo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companyHrOtherInfo = $this->companyHrOtherInfoRepository->findWithoutFail($id);

        if (empty($companyHrOtherInfo)) {
            Flash::error('Company Hr Other Info not found');

            return redirect(route('company.companyHrOtherInfos.index'));
        }

        $this->companyHrOtherInfoRepository->delete($id);

        Flash::success('Company Hr Other Info deleted successfully.');

        return redirect(route('company.companyHrOtherInfos.index'));
    }
}
