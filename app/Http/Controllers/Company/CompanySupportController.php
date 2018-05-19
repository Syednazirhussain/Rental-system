<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreateCompanySupportRequest;
use App\Http\Requests\Company\UpdateCompanySupportRequest;
use App\Repositories\CompanySupportRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\CompanySupport;
use App\Models\SupportPriorities;
use App\Models\SupportCategory;
use App\Models\SupportStatus;
use App\Models\User;
use App\Models\CompanyUser;
use App\Models\UserRole;

use App\Mail\TicketEmail;
use Mail;

use Auth;

class CompanySupportController extends AppBaseController
{
    /** @var  CompanySupportRepository */
    private $companySupportRepository;

    public function __construct(CompanySupportRepository $companySupportRepo)
    {
        $this->companySupportRepository = $companySupportRepo;
    }

    /**
     * Display a listing of the CompanySupport.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companySupportRepository->pushCriteria(new RequestCriteria($request));
        $companySupports = $this->companySupportRepository->all();

        $status_id = SupportStatus::where('name','Solved')->first()->id;

        $companySupports = CompanySupport::where('status_id', '!=' ,$status_id)->where('parent_id',0)->get();

        return view('company.company_supports.index')->with('companySupports', $companySupports);
    }

    public function completedTicket()
    {
        $status_id = SupportStatus::where('name','Solved')->first()->id;
        $companySupports = CompanySupport::where('status_id',$status_id)
                            ->where('parent_id',0)
                            ->get();
        return view('company.company_supports.index')->with('companySupports', $companySupports);
    }

    /**
     * Show the form for creating a new CompanySupport.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.company_supports.create');
    }

    /**
     * Store a newly created CompanySupport in storage.
     *
     * @param CreateCompanySupportRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanySupportRequest $request)
    {
        $input = $request->all();

        $companySupport = $this->companySupportRepository->create($input);

        Flash::success('Company Support saved successfully.');

        return redirect(route('company.companySupports.index'));
    }

    /**
     * Display the specified CompanySupport.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companySupport = $this->companySupportRepository->findWithoutFail($id);

        if (empty($companySupport)) {
            Flash::error('Company Support not found');

            return redirect(route('company.companySupports.index'));
        }

        return view('company.company_supports.show')->with('companySupport', $companySupport);
    }

    /**
     * Show the form for editing the specified CompanySupport.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companySupport = $this->companySupportRepository->findWithoutFail($id);

        if (empty($companySupport)) {
            Flash::error('Company Support not found');

            return redirect(route('company.companySupports.index'));
        }

        return view('company.company_supports.edit')->with('companySupport', $companySupport);
    }

    /**
     * Update the specified CompanySupport in storage.
     *
     * @param  int              $id
     * @param UpdateCompanySupportRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanySupportRequest $request)
    {
        $companySupport = $this->companySupportRepository->findWithoutFail($id);

        if (empty($companySupport)) {
            Flash::error('Company Support not found');

            return redirect(route('company.companySupports.index'));
        }

        $companySupport = $this->companySupportRepository->update($request->all(), $id);

        Flash::success('Company Support updated successfully.');

        return redirect(route('company.companySupports.index'));
    }

    /**
     * Remove the specified CompanySupport from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companySupport = $this->companySupportRepository->findWithoutFail($id);

        if (empty($companySupport)) {
            Flash::error('Company Support not found');

            return redirect(route('company.companySupports.index'));
        }

        $this->companySupportRepository->delete($id);

        Flash::success('Company Support deleted successfully.');

        return redirect(route('company.companySupports.index'));
    }
}
