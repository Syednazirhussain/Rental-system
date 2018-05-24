<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateSupportRequest;
use App\Http\Requests\Admin\UpdateSupportRequest;
use App\Repositories\SupportRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\Support;
use App\Models\SupportPriorities;
use App\Models\SupportCategory;
use App\Models\SupportStatus;
use App\Models\User;
use App\Models\CompanyUser;
use App\Models\CompanyCustomer;
use App\Models\UserRole;

use App\Mail\TicketEmail;
use App\Mail\ChangedStatusAndPriorityEmail;
// use Illuminate\Support\Facades\URL;
use Mail;
use Auth;



class SupportController extends AppBaseController
{
    /** @var  SupportRepository */
    private $supportRepository;

    public function __construct(SupportRepository $supportRepo)
    {
        $this->supportRepository = $supportRepo;
    }

    /**
     * Display a listing of the Support.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->supportRepository->pushCriteria(new RequestCriteria($request));

        $status_id = SupportStatus::where('name','Solved')->first()->id;

        $supports = Support::where('status_id', '!=' ,$status_id)->where('parent_id',0)->get();

        return view('admin.supports.index')->with('supports',$supports);
    }

    public function completedTicket()
    {

        $status_id = SupportStatus::where('name','Solved')->first()->id;
        $supports = Support::where('status_id',$status_id)
                            ->where('parent_id',0)
                            ->get();

        return view('admin.supports.index')->with('supports', $supports);
    }


    public function companyIndex(Request $request)
    {
        $user_id = Auth::guard('company')->user()->id;

        $status_id = SupportStatus::where('name','Solved')->first()->id;

        $supports = Support::where('status_id', '!=' ,$status_id)
                            ->where('parent_id',0)
                            ->where('user_id',$user_id)
                            ->get();

        return view('company.supports.index',compact('supports'));
    }


    public function companyCreate()
    {
        $priorities = SupportPriorities::all();
        $categories = SupportCategory::all();

        $data = [
            'priorities' => $priorities,
            'categories' => $categories
        ];

        return view('company.supports.create',$data);        
    }

    public function companyStore(CreateSupportRequest $request)
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

            $support = $this->supportRepository->create($input);

            if($support)
            {
                $updateSupport = Support::where('id',$parent_id)->first();

                $updateSupport->last_comment = $input['last_comment'];

                $updateSupport->save();
            }

            session()->flash('msg.success','Message sent successfully.');

            return redirect()->route('company.supports.show',[$parent_id]);
        }   
        else
        {


            $support_status_id = SupportStatus::where('name','Pending')->first()->id;

            $user_id = Auth::guard('company')->user()->id;
            $email = Auth::guard('company')->user()->email;
            $user_name = Auth::guard('company')->user()->name;

            $user = User::find($user_id);

            $company_name = $user->companyUser->company->name;
            $company_id   = $user->companyUser->company->id;

            $input['parent_id'] = 0;
            $input['user_id'] = $user_id;
            $input['status_id'] = $support_status_id;
            $input['company_id'] = $company_id;
            $input['company_name'] = $company_name;
            $input['last_comment'] = $user_name;

            $support = $this->supportRepository->create($input);

            if($support)
            {
                $input['header'] = 'Dear '.$user_name;

                $input['sub_header'] = 'You have created a new ticket subject';
                
                Mail::to($email)->send(new TicketEmail($input));                
            }

            session()->flash('msg.success','Ticket generated successfully.');

            return redirect(route('company.supports.index'));
        }        
    }

    public function companyShow($ticket_id)
    {
        $ticketId = (int)$ticket_id;

        $ticket = $this->supportRepository->findWithoutFail($ticketId);

        if (empty($ticket)) 
        {
            // session()->flash('msg.error','Ticket not found');
            return redirect(route('company.supports.index'));
        }
        else
        {
            if(Auth::guard('company')->check())
            {
                $user_id = Auth::guard('company')->user()->id;
                $companyUser = CompanyUser::where('user_id',$user_id)->first();

                if($companyUser->company_id == $ticket->company_id)
                {
                    if($ticket->parent_id == 0)
                    {
                        $ticket = Support::where('parent_id',0)->where('id',$ticketId)->first();
                        $reply = Support::where('parent_id',$ticketId)->get();
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
                        return view('company.supports.show',$data);
                    }
                    else
                    {
                        $ticketId = $ticket->parent_id;
                        $ticket = Support::where('parent_id',0)->where('id',$ticketId)->first();
                        $reply = Support::where('parent_id',$ticketId)->get();
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
                        return view('company.supports.show',$data);
                    }
                }
                else
                {
                    return redirect()->back();
                }
            }
            else
            {
                session()->flash('msg.error','Please login to your account');
                return redirect()->route('company.login');
            }
        }
    }




    public function companyCompleteTicket(Request $request)
    {
        $status_id = SupportStatus::where('name','Solved')->first()->id;

        $user_id = Auth::guard('company')->user()->id;

        $supports = Support::where('status_id',$status_id)
                    ->where('user_id',$user_id)
                    ->where('parent_id',0)
                    ->get();

        return view('company.supports.index',compact('supports'));  
    }


    /**
     * Show the form for creating a new Support.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.supports.create');
    }

    /**
     * Store a newly created Support in storage.
     *
     * @param CreateSupportRequest $request
     *
     * @return Response
     */
    public function store(CreateSupportRequest $request)
    {

        $this->validate($request,[
            'subject' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'priority_id' => 'required',
            'status_id' => 'required',
            'user_id' => 'required',
            'parent_id' => 'required',
        ]);

        $input = $request->except(['files']);

        $support = $this->supportRepository->create($input);

        if($support)
        {
            $parent_id =  $input['parent_id'];
            $company_id = (int)$input['company_id'];
            $company_user = CompanyUser::select('user_id')->where('company_id',$company_id)->first();
            $user_id = $company_user->user_id;
            $user = User::find($user_id);
            $email = $user->email;
            $name = $user->name;
            $input['header'] = 'Hi '.$name;
            $input['sub_header'] = 'responed your ticket ';
            Mail::to($email)->send(new TicketEmail($input));

            $supportStatus = SupportStatus::where('name','Progress')->first();
            if($supportStatus)
            {
                $status_id = $supportStatus->id;
                $updateSupport = Support::where('id',$parent_id)->first();
                $updateSupport->last_comment = $input['last_comment'];
                $updateSupport->status_id = $status_id;
                $updateSupport->save();
            }
            else
            {
                $updateSupport = Support::where('id',$parent_id)->first();
                $updateSupport->last_comment = $input['last_comment'];
                $updateSupport->save();
            }
        }
        else
        {
            session()->flash('msg.success','Message sent successfully.');
            return redirect()->route('admin.supports.index');
        }

        session()->flash('msg.success','Support saved successfully.');
        return redirect()->route('admin.supports.show',[$parent_id]);
    }

    /**
     * Display the specified Support.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ticketId = (int)$id;

        $support = $this->supportRepository->findWithoutFail($ticketId);

        if (empty($support)) 
        {
            // session()->flash('msg.error','Ticket not found');
            return redirect(route('admin.supports.index'));
        }
        else
        {
            $parent_id =  $support->parent_id;

            $priorities =  SupportPriorities::all();
            $categories =  SupportCategory::all();
            $statues =  SupportStatus::all();
            $user_role = UserRole::all();

            $userRoleArr = [];

            foreach ($user_role as $key => $value) 
            {
                if (substr( $value->code, 0, 5 ) === "admin") 
                {
                    $userRoleArr[$key] = $value;
                }

            }

            $reply = Support::where('parent_id',$ticketId)->get();

            if(isset($reply) && count($reply) == 0)
            {
                $data = [
                    'support' => $support,
                    'priorities' => $priorities,
                    'categories' => $categories,
                    'statues'    => $statues,
                    'userRoles'  => $userRoleArr     
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
                    'userRoles'  => $userRoleArr    
                ];
            }

            return view('admin.supports.show',$data);
        }
    }

    /**
     * Show the form for editing the specified Support.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $support = $this->supportRepository->findWithoutFail($id);

        if (empty($support)) {
            Flash::error('Support not found');

            return redirect(route('admin.supports.index'));
        }

        return view('admin.supports.edit')->with('support', $support);
    }

    /**
     * Update the specified Support in storage.
     *
     * @param  int              $id
     * @param UpdateSupportRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSupportRequest $request)
    {

        $input = $request->except(['files']);

        $support = Support::find($id);


        if (empty($support)) {
            session()->flash('msg.error','Support not found');
            return redirect(route('admin.supports.index'));
        }

        if($support->priority_id != $input['priority_id'] || $support->status_id != $input['status_id'])
        {
            $username = $support->user->name;
            $email = $support->user->email;
            $messageUser = Auth::guard('admin')->user()->name;
            $data['subject'] = 'Highnox Customer Support [Ticket# '.$id.']'; 

            $url =  url('/').'/company/supports/'.$id;
            $data['footer1'] = 'Thanks';
            $data['footer2'] = 'Regards,';
            $data['footer3'] = 'Highnox';

            if($support->priority_id != $input['priority_id'] && $support->status_id == $input['status_id'])
            {
                $newPriority = SupportPriorities::find($input['priority_id'])->name;
                $priority = $support->supportPriority->name;
                $data['header'] = 'Dear '.$username.',';
                $data['body'] = 'Your ticket number# 191 at '.$url.'  priority has been changed from `'.$priority.'` to `'.$newPriority.'`';
                // $data['footer'] = nl2br("Thanks \n\nRegards,\nHighnox",false);
                // $data['footer'] = htmlentities('Thanks <br/><br/>Regards,<br/>Highnox', ENT_QUOTES);

                Mail::to($email)->send(new ChangedStatusAndPriorityEmail($data));

            }
            elseif ($support->priority_id == $input['priority_id'] && $support->status_id != $input['status_id']) 
            {
                $newStatus = SupportStatus::find($input['status_id'])->name;
                $status = $support->supportStatus->name;
                $data['header'] = 'Dear '.$username.',';
                $data['body'] = 'Your ticket number# 191 at '.$url.'  status has been changed from `'.$status.'` to `'.$newStatus.'`';

                Mail::to($email)->send(new ChangedStatusAndPriorityEmail($data));

            }
            else
            {
                $priority = $support->supportPriority->name;
                $status = $support->supportStatus->name;
                $newPriority = SupportPriorities::find($input['priority_id'])->name;
                $newStatus = SupportStatus::find($input['status_id'])->name;
                $data['header'] = 'Dear '.$username.',';
                $data['body'] = 'Your ticket number# 191 at '.$url.'  status has been changed from `'.$status.'` to `'.$newStatus.'` and priority has been changed from `'.$priority.'` to `'.$newPriority.'`';

                Mail::to($email)->send(new ChangedStatusAndPriorityEmail($data));
            }
        }
    
        $support->subject       = $input['subject'];
        $support->content       = $input['content'];
        $support->priority_id   = $input['priority_id'];
        $support->category_id   = $input['category_id'];
        $support->status_id     = $input['status_id'];

        $support->save();
        session()->flash('msg.success','Ticket updated successfully');
        return redirect()->back();
    }


    public function solved($id)
    {
        $support = $this->supportRepository->findWithoutFail($id);

        $status_id = SupportStatus::where('name','Solved')->first()->id;

        $support->status_id = $status_id;

        if( $support->save() )
        {
            Support::where('parent_id',$id)->update(['status_id' => $status_id]);
            return redirect()->route('admin.supports.show',[$id]);
        }
        else
        {
            session()->flash('msg.error','Ticket Status cannot be updated');
            return redirect(route('admin.supports.index'));
        } 

    }

    /**
     * Remove the specified Support from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $support = $this->supportRepository->findWithoutFail($id);

        if (empty($support)) {
            Flash::error('Support not found');

            return redirect(route('admin.supports.index'));
        }

        $this->supportRepository->delete($id);

        Flash::success('Support deleted successfully.');

        return redirect(route('admin.supports.index'));
    }
}
