<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
use App\Models\Customer;
use Mail;

class NewsLetterGroupController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::guard('company')->user()->id;
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $groups = Group::where('user_id', $id)->where('company_id', $company_id)->get();

        return view('company.newsletter_group.index', ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.newsletter_group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        request()->validate([
            'name' => 'required',
        ]);
        Group::create(array_merge($request->all(), ['user_id' => Auth::guard('company')->user()->id, 'company_id' => $company_id]));
        return redirect()->route('company.newsletterGroups.index')->with('success', 'New Group has been created!');
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
        return view('company.newsletter_group.edit', ['group' => $group]);
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
        Group::where('id', $id)->update(array_merge($data, ['user_id' => Auth::guard('company')->user()->id]));
        return redirect()->route('company.newsletterGroups.index')->with('success', 'New Group has been created!');
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
        return redirect()->route('company.newsletterGroups.index')->with('success', 'The Group has been deleted!');
    }

    /**
     * Upload file to storage/app/uploads
     */
    public function upload(Request $request)
    {
        $request->file->store('uploads');
        return view('company.newsletterGroups.sendmail', ['groups' => Group::all()]);
    }

    /**
     * Send mail to all group users via sendgrid
     */
    public function sendmail()
    {
        return view('company.newsletter_group.sendmail', ['groups' => Group::all()]);
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
        $from_email = Auth::guard('company')->user()->email;

        // Send message if users exist to deliver.
        if($customers)
        {
            foreach ($customers as $customer) {
                Mail::send('emails.newsletter', ['data'=> $data], function($message) use ($from_email, $customer, $request) {
                    $message->from ($from_email);
                    $message->to($customer->email);
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
            }
            return redirect()->route('company.newsletterGroups.index')->with('success', 'Emails are sent successfully !');
        }
        else
            return redirect()->route('company.newsletterGroups.index');
    }
}
