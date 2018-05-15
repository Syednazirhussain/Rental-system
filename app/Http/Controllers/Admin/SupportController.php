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
        $supports = Support::where('status_id',$status_id)->get();

        return view('admin.supports.index')->with('supports', $supports);
    }


    public function companyIndex(Request $request)
    {
        $user_id = Auth::guard('company')->user()->id;

        $status_id = SupportStatus::where('name','Solved')->first()->id;
        $tickets = Support::where('status_id', '!=' ,$status_id)
                                ->where('user_id',$user_id)
                                ->get();

        return view('company.supports.index',compact('tickets'));
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

            session()->flash('msg.success','Support saved successfully.');

            return redirect(route('company.supports.index'));
        }        


    }

    public function companyShow($ticket_id)
    {
        $ticketId = (int)$ticket_id;

        $ticket = $this->supportRepository->getMasterTicket(0,$ticketId);

        if (empty($ticket)) 
        {
            session()->flash('msg.error','Support not found');
            return redirect(route('admin.supports.index'));
        }

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




    public function companyCompleteTicket(Request $request)
    {
        $status_id = SupportStatus::where('name','Solved')->first()->id;
        $tickets = Support::where('status_id',$status_id)->get();

        return view('company.supports.index',compact('tickets'));  
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

        $parent_id =  $input['parent_id'];

        $support = $this->supportRepository->create($input);

        if($support)
        {
            $updateSupport = Support::where('id',$parent_id)->first();

            $updateSupport->last_comment = $input['last_comment'];

            $updateSupport->save();

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

        $parent_id =  $support->parent_id;

        if (empty($support)) 
        {
            session()->flash('msg.error','Support not found');
            return redirect(route('admin.supports.index'));
        }

        $reply = Support::where('parent_id',$ticketId)->get();


        if(isset($reply) && count($reply) == 0)
        {
            $data = [
                'support' => $support  
            ];
        }
        else
        {
            $data = [
                'support' => $support,
                'reply'   => $reply  
            ];
        }



        return view('admin.supports.show',$data);
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
        $support = $this->supportRepository->findWithoutFail($id);

        if (empty($support)) {
            Flash::error('Support not found');

            return redirect(route('admin.supports.index'));
        }

        $support = $this->supportRepository->update($request->all(), $id);

        Flash::success('Support updated successfully.');

        return redirect(route('admin.supports.index'));
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
