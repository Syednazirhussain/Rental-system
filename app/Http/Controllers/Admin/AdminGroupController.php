<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
use App\Models\Customer;
use Mail;

class AdminGroupController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('group.index', ['groups' => Auth::guard('admin')->user()->groups()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
        ]);
        Group::create(array_merge($request->all(), ['user_id' => Auth::guard('admin')->user()->id]));
        return redirect()->route('admin.newsletter.groups.index')->with('success', 'New Group has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::find($id);
        return view('group.edit', ['group' => $group]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
        ]);

        $data = request()->except(['_token', '_method']);
        Group::where('id', $id)->update(array_merge($data, ['user_id' => Auth::guard('admin')->user()->id]));
        return redirect()->route('admin.newsletter.groups.index')->with('success', 'New Group has been created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();
        return redirect()->route('admin.newsletter.groups.index')->with('success', 'The Group has been deleted!');
    }

    /**
     * Upload file to storage/app/uploads
     */
    public function upload(Request $request)
    {
        $request->file->store('uploads');
        return view('group.sendmail', ['groups' => Group::all()]);
    }

    /**
     * Send mail to all group users via sendgrid
     */
    public function sendmail()
    {
        return view('group.sendmail', ['groups' => Group::all()]);
    }

    public function mailto(Request $request)
    {
        // Increase Execution time
        ini_set('max_execution_time', 300);

        // Upload file if exist
        if($request->file)
        {
            $request->file->store('uploads');
        }

        $group_id = $request->group_id;
        $data = $request->message_content;
        $customers = Customer::where('group_id', $group_id)->get();
        $from_email = Auth::guard('admin')->user()->email;

        // Send message if users exist to deliver.
        if($customers)
        {
            $send_to = [];
            foreach ($customers as $customer) {
                array_push($send_to, $customer->email);
            }

            Mail::send('emails.mailEvent', ['data'=> $data], function($message) use ($from_email, $send_to, $request) {
                $message->from ($from_email);
                $message->to($send_to);
                $message->subject($request->message_subject);
                $message->sender('email@example.com', 'Mr. Example');
                if($request->file)
                {
                    $message->attach(storage_path().'/app/uploads/'.$request->file->hashName(), [
                        'as' => $request->file->getClientOriginalName(),
                        'mime' => $request->file->getMimeType(),
                    ]);
                }
            });
            return redirect()->route('admin.newsletter.groups.index')->with('success', 'Emails are sent successfully !');
        }
        else
            return redirect()->route('admin.newsletter.groups.index');
    }
}
