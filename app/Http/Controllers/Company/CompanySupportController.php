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
use App\Models\CompanyCustomer;

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
                // dd($companySupports);
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

                // dd($supports);

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


    public function customerSupportCreate()
    {
        $priorities = CompanySupportPriorities::all();
        $categories = CompanySupportCategory::all();

        $data = [
            'priorities' => $priorities,
            'categories' => $categories
        ];

        return view('company_customer.supports.create',$data); 

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


    public function customerSupportStore(CreateCompanySupportRequest $request)
    {
        $this->validate($request,[
            'subject' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'priority_id' => 'required'
        ]);

        $input = $request->except(['files']);

        if(isset($input['parent_id']))
        {
            $parent_id =  $input['parent_id'];

            $support = $this->companySupportRepository->create($input);

            if($support)
            {
                $updateSupport = CompanySupport::where('id',$parent_id)->first();

                $updateSupport->last_comment = $input['last_comment'];

                $updateSupport->save();
            }

            session()->flash('msg.success','Message sent successfully.');

            return redirect()->route('company.supports.show',[$parent_id]);
        }   
        else
        {
            $support_status_id = CompanySupportStatus::where('name','Pending')->first()->id;


            $user_id = Auth::guard('company_customer')->user()->id;
            $email = Auth::guard('company_customer')->user()->email;
            $user_name = Auth::guard('company_customer')->user()->name;

            // $user = User::find($user_id);

            $companyCustomer =  CompanyCustomer::where('user_id',$user_id)->first();

            $company_name = $companyCustomer->company->name;

            $company_id   = $companyCustomer->company_id;

            $input['parent_id'] = 0;
            $input['user_id'] = $user_id;
            $input['status_id'] = $support_status_id;
            $input['company_id'] = $company_id;
            $input['company_name'] = $company_name;
            $input['last_comment'] = $user_name;

            $support = $this->companySupportRepository->create($input);

            if($support)
            {
                $input['header'] = 'Dear '.$user_name;

                $input['sub_header'] = 'You have created a new ticket subject';
                
                Mail::to($email)->send(new TicketEmail($input));                
            }

            session()->flash('msg.success','Ticket generated successfully.');

            return redirect(route('companyCustomer.supports.index'));
        }        

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
        $ticketId = (int)$id;

        $support = $this->companySupportRepository->findWithoutFail($ticketId);

        $parent_id =  $support->parent_id;

        if (empty($support)) 
        {
            session()->flash('msg.error','Support not found');
            return redirect(route('admin.supports.index'));
        }

        $priorities =  CompanySupportPriorities::all();
        $categories =  CompanySupportCategory::all();
        $statues =  CompanySupportStatus::all();
        
        // $user_role = UserRole::all();
        // $userRoleArr = [];
        // foreach ($user_role as $key => $value) 
        // {
        //     if (substr( $value->code, 0, 5 ) === "admin") 
        //     {
        //         $userRoleArr[$key] = $value;
        //     }
        // }

        $reply = CompanySupport::where('parent_id',$ticketId)->get();

        if(isset($reply) && count($reply) == 0)
        {
            $data = [
                'support' => $support,
                'priorities' => $priorities,
                'categories' => $categories,
                'statues'    => $statues,
                // 'userRoles'  => $userRoleArr     
            ];
        }
        else
        {
            $data = [
                'support' => $support,
                'reply'   => $reply,
                'priorities' => $priorities,
                'categories' => $categories,
                'statues'    => $statues,
                // 'userRoles'  => $userRoleArr    
            ];
        }

        return view('company.company_supports.show',$data);
    }

    public function customerSupportShow($ticket_id)
    {
        $ticketId = (int)$ticket_id;

        // $ticket = $this->companySupportRepository->getMasterTicket(0,$ticketId);
        $ticket = CompanySupport::where('parent_id',0)->where('id',$ticket_id)->first();


        if (empty($ticket)) 
        {
            session()->flash('msg.error','Support not found');
            return redirect(route('admin.supports.index'));
        }

        $reply = CompanySupport::where('parent_id',$ticketId)->get();

        // dd( $reply );

        if(isset($reply) && count($reply) == 0)
        {
            $data = [
                'ticket' => $ticket       
            ];
        }
        else
        {
            $data = [
                'ticket' => $ticket,
                'reply'   => $reply
            ];
        }

        return view('company_customer.supports.show',$data);
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
