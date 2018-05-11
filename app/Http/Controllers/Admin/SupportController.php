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

// use App\Models\Support;
use App\Models\SupportPriorities;
use App\Models\SupportCategory;
use App\Models\SupportStatus;
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
        $supports = $this->supportRepository->all();
        return view('admin.supports.index')->with('supports', $supports);
    }


    public function companyIndex(Request $request)
    {
        $user_id = Auth::guard('company')->user()->id;
        $tickets = $this->supportRepository->getAllTicketsByUserId($user_id);

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

        $support_status_id = SupportStatus::where('name','Pending')->first()->id;

        $user_id = Auth::guard('company')->user()->id;

        $input['parent_id'] = 0;
        $input['user_id'] = $user_id;
        $input['status_id'] = $support_status_id;


        $support = $this->supportRepository->create($input);


        // Flash::success('Support saved successfully.');

        session()->flash('msg.success','Support saved successfully.');

        return redirect(route('company.supports.index'));
    }

    public function companyShow($ticket_id)
    {
        $ticketId = (int)$ticket_id;

        $ticket = $this->supportRepository->getMasterTicket(0,$ticketId);

        return view('company.supports.show',compact('ticket'));   
    }




    public function companyCompleteTicket()
    {
        return view('company.supports.completeTicket');   
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
        $input = $request->all();

        $support = $this->supportRepository->create($input);

        Flash::success('Support saved successfully.');

        return redirect(route('admin.supports.index'));
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
        // $support = $this->supportRepository->findWithoutFail($id);

        // if (empty($support)) {
        //     Flash::error('Support not found');

        //     return redirect(route('admin.supports.index'));
        // }

        // return view('admin.supports.show')->with('support', $support);

        return view('admin.supports.show');
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
