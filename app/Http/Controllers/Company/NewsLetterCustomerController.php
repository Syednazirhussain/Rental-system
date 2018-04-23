<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class NewsLetterCustomerController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $group_id = request()->group_id;
        return view('company.newsletter_customer.index', ['customers' => Group::find($group_id)->customers()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.newsletter_customer.create', ['groups' => Group::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $company_id = Auth::user()->companyUser()->first()->company_id;
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'description' => 'required',
        ]);

        $input['company_id'] = $company_id;
        Customer::create($input);
        return redirect()->route('company.newsletterGroups.index')->with('success', 'New Customer has been created!');
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
     * Customer List View
     * */
    public function lists()
    {
        $company_id = Auth::user()->companyUser()->first()->company_id;
        return view('company.newsletter_customer.index', ['customers' => Customer::where('company_id', $company_id)->get()]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('company.newsletter_customer.edit', ['customer' => $customer, 'groups' => Group::all()]);
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
            'email' => 'required',
            'description' => 'required',
        ]);

        $data = request()->except(['_token', '_method']);
        Customer::where('id', $id)->update($data);
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
        //Destroy Customer
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('company.newsletterGroups.index')->with('success', 'The Group has been deleted!');
    }
}
