<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreateLeaseContractInformationRequest;
use App\Http\Requests\Company\UpdateLeaseContractInformationRequest;
use App\Repositories\Company\LeaseContractInformationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\Company\LeaseAttachment;
use App\Models\Company\LeaseContractInformation;

class LeaseContractInformationController extends AppBaseController
{
    /** @var  LeaseContractInformationRepository */
    private $leaseContractInformationRepository;

    public function __construct(LeaseContractInformationRepository $leaseContractInformationRepo)
    {
        $this->leaseContractInformationRepository = $leaseContractInformationRepo;
    }

    /**
     * Display a listing of the LeaseContractInformation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->leaseContractInformationRepository->pushCriteria(new RequestCriteria($request));
        $leaseContractInformations = $this->leaseContractInformationRepository->all();

        return view('company.lease_contract_informations.index')
            ->with('leaseContractInformations', $leaseContractInformations);
    }

    /**
     * Show the form for creating a new LeaseContractInformation.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.lease_contract_informations.create');
    }

    /**
     * Store a newly created LeaseContractInformation in storage.
     *
     * @param CreateLeaseContractInformationRequest $request
     *
     * @return Response
     */
    public function store(CreateLeaseContractInformationRequest $request)
    {
        $input = $request->all();

        $files = $input['files'];

        if(count($files) > 0)
        {
            $file_names = [];
            $index = 0;
            foreach ($files as  $file) 
            {
                $path = $file->store('public/leasingImages');
                $pathArr = explode('/', $path);
                $count = count($pathArr);
                $path = $pathArr[$count - 1];
                $file_names[$index] = $path;
                $index++;
            }

            $attachmentIDs = [];
            $index = 0;
            foreach ($file_names as  $file_name) 
            {
                $lease_attachment = new LeaseAttachment;
                $lease_attachment->file_name = $file_name;
                $lease_attachment->lease_partner_id = $input['lease_partner_id'];
                $lease_attachment->save();
                if($lease_attachment)
                {
                    $attachmentIDs[$index] = $lease_attachment->id;
                    $index++; 
                }
            }           
        }



        unset($input['files']);
        unset($input['fileuploader-list-files']);

        // print_r($input);
        // exit;
        $contract_start_date =  \Carbon\Carbon::parse($input['contract_start_date'])->format('Y-m-d');

        $leaseContractForm = new  LeaseContractInformation;
        $leaseContractForm->contract_start_date = $contract_start_date;
        $leaseContractForm->contract_length = $input['contract_length'];
        $leaseContractForm->termination_time = $input['termination_time'];
        $leaseContractForm->contract_auto_renewal = $input['contract_auto_renewal'];
        $leaseContractForm->contract_renewal = $input['contract_renewal'];
        $leaseContractForm->renewal_number_month = $input['renewal_number_month']; 
        $leaseContractForm->contract_type = $input['contract_type'];
        $leaseContractForm->contract_number = $input['contract_number'];
        $leaseContractForm->contract_name = $input['contract_name'];
        $leaseContractForm->contract_desc = $input['contract_desc'];
        $leaseContractForm->amount_per_month = $input['amount_per_month'];
        $leaseContractForm->income_per_month = $input['income_per_month'];
        $leaseContractForm->currency_id = $input['currency_id'];
        $leaseContractForm->cost_reference = $input['cost_reference'];
        $leaseContractForm->income_reference = $input['income_reference'];
        $leaseContractForm->other_reference = $input['other_reference'];
        $leaseContractForm->lease_attachment_id = null;
        $leaseContractForm->building_id = $input['building_id'];
        $leaseContractForm->cost_number = $input['cost_number'];
        $leaseContractForm->lease_partner_id = $input['lease_partner_id'];
        $leaseContractForm->save();

        if($leaseContractForm)
        { 
            return response()->json(['status' => 'success','msg' => 'Lease has been created successfully']);
        }
        else
        {
            return response()->json(['status' => 'fail','msg' => 'There is some problem while saving these record']);
        }

        // Flash::success('Lease Contract Information saved successfully.');
        // return redirect(route('company.leaseContractInformations.index'));
    }

    /**
     * Display the specified LeaseContractInformation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $leaseContractInformation = $this->leaseContractInformationRepository->findWithoutFail($id);

        if (empty($leaseContractInformation)) {
            Flash::error('Lease Contract Information not found');

            return redirect(route('company.leaseContractInformations.index'));
        }

        return view('company.lease_contract_informations.show')->with('leaseContractInformation', $leaseContractInformation);
    }

    /**
     * Show the form for editing the specified LeaseContractInformation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $leaseContractInformation = $this->leaseContractInformationRepository->findWithoutFail($id);

        if (empty($leaseContractInformation)) {
            Flash::error('Lease Contract Information not found');

            return redirect(route('company.leaseContractInformations.index'));
        }

        return view('company.lease_contract_informations.edit')->with('leaseContractInformation', $leaseContractInformation);
    }

    public function getAvailableFiles($file_list)
    {
        $str_files =  str_replace(['[',']'],'', $file_list)."\n";

        $files = explode(',', $str_files);

        return $files;
    }

    /**
     * Update the specified LeaseContractInformation in storage.
     *
     * @param  int              $id
     * @param UpdateLeaseContractInformationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLeaseContractInformationRequest $request)
    {
        $leaseContractInformation = $this->leaseContractInformationRepository->findWithoutFail($id);


        if (empty($leaseContractInformation)) 
        {
            session()->flash('msg.error','Lease Contract Information not found');
            return redirect(route('company.leaseContractInformations.index'));
        }

        $input = $request->all();

        $available_files = $this->getAvailableFiles($input['fileuploader-list-files']);

        if(isset($input['files']))
        {
            $files = $input['files'];

            if(count($files) > 0)
            {
                $file_names = [];
                $index = 0;
                foreach ($files as  $file) 
                {
                    $path = $file->store('public/leasingImages');
                    $pathArr = explode('/', $path);
                    $count = count($pathArr);
                    $path = $pathArr[$count - 1];
                    $file_names[$index] = $path;
                    $index++;
                }

                $attachmentIDs = [];
                $index = 0;
                foreach ($file_names as  $file_name) 
                {
                    $lease_attachment = new LeaseAttachment;
                    $lease_attachment->file_name = $file_name;
                    $lease_attachment->lease_partner_id = $input['lease_partner_id'];
                    $lease_attachment->save();
                    if($lease_attachment)
                    {
                        $attachmentIDs[$index] = $lease_attachment->id;
                        $index++; 
                    }
                }           
            }
        }

        $contract_start_date =  \Carbon\Carbon::parse($input['contract_start_date'])->format('Y-m-d');

        $leaseContractInformation->contract_start_date = $contract_start_date;
        $leaseContractInformation->contract_length = $input['contract_length'];
        $leaseContractInformation->termination_time = $input['termination_time'];
        $leaseContractInformation->contract_auto_renewal = $input['contract_auto_renewal'];
        $leaseContractInformation->contract_renewal = $input['contract_renewal'];
        $leaseContractInformation->renewal_number_month = $input['renewal_number_month']; 
        $leaseContractInformation->contract_type = $input['contract_type'];
        $leaseContractInformation->contract_number = $input['contract_number'];
        $leaseContractInformation->contract_name = $input['contract_name'];
        $leaseContractInformation->contract_desc = $input['contract_desc'];
        $leaseContractInformation->amount_per_month = $input['amount_per_month'];
        $leaseContractInformation->income_per_month = $input['income_per_month'];
        $leaseContractInformation->currency_id = $input['currency_id'];
        $leaseContractInformation->cost_reference = $input['cost_reference'];
        $leaseContractInformation->income_reference = $input['income_reference'];
        $leaseContractInformation->other_reference = $input['other_reference'];
        $leaseContractInformation->lease_attachment_id = null;
        $leaseContractInformation->building_id = $input['building_id'];
        $leaseContractInformation->cost_number = $input['cost_number'];
        $leaseContractInformation->lease_partner_id = $input['lease_partner_id'];
        $leaseContractInformation->save();

        if($leaseContractInformation)
        { 
            return response()->json(['status' => 'success','msg' => 'Lease has been updated successfully']);
        }
        else
        {
            return response()->json(['status' => 'fail','msg' => 'There is some problem while updating these record']);
        }


/*        $leaseContractInformation = $this->leaseContractInformationRepository->update($request->all(), $id);

        Flash::success('Lease Contract Information updated successfully.');

        return redirect(route('company.leaseContractInformations.index'));*/
    }

    public function imageRemove(Request $request)
    {
        $input = $request->all();

        $leaseAttachment = LeaseAttachment::where('file_name',$input['image'])->delete();

        if($leaseAttachment)
        {   
            return ['msg' => 'Image remove successfully'];
        }
        else
        {
            return ['msg' => 'Image cannot removed'];   
        }
    }

    /**
     * Remove the specified LeaseContractInformation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $leaseContractInformation = $this->leaseContractInformationRepository->findWithoutFail($id);

        if (empty($leaseContractInformation)) {
            Flash::error('Lease Contract Information not found');

            return redirect(route('company.leaseContractInformations.index'));
        }

        $this->leaseContractInformationRepository->delete($id);

        Flash::success('Lease Contract Information deleted successfully.');

        return redirect(route('company.leaseContractInformations.index'));
    }
}
