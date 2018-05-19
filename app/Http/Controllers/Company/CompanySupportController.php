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

use App\Models\CompanySupportPriorities;
use App\Models\CompanySupportCategory;
use App\Models\CompanySupportStatus;


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

        $statuses =  CompanySupportStatus::all();

        if(count($statuses) > 0)
        {
            $status_id = CompanySupportStatus::where('name','Solved')->first()->id;

            if($status_id)
            {
                $companySupports = CompanySupport::where('status_id', '!=' ,$status_id)->where('parent_id',0)->get();
                return view('company.company_supports.index')->with('companySupports', $companySupports);            
            }
        }        



        return view('company.company_supports.index');

    }

    public function completedTicket()
    {
        $statuses =  CompanySupportStatus::all();

        if(count($statuses) > 0)
        {
            $status_id = CompanySupportStatus::where('name','Solved')->first()->id;
            if($status_id)
            {
                $companySupports = CompanySupport::where('status_id',$status_id)
                                    ->where('parent_id',0)
                                    ->get();
                return view('company.company_supports.index')->with('companySupports', $companySupports);
            }
        }

        return view('company.company_supports.index');
    }


    public function customerSupportIndex()
    {
        $user_id = Auth::guard('company_customer')->user()->id;

        $statuses =  CompanySupportStatus::all();

        if(count($statuses) > 0)
        {
            $status_id = CompanySupportStatus::where('name','Solved')->first()->id;
            if($status_id)
            {
                $supports = CompanySupport::where('status_id', '!=' ,$status_id)
                                    ->where('parent_id',0)
                                    ->where('user_id',$user_id)
                                    ->get();
                if(count($supports) > 0)
                {
                    return view('company_customer.supports.index')->with('supports', $supports);                    
                }       
            }
        }

        return view('company_customer.supports.index');
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
