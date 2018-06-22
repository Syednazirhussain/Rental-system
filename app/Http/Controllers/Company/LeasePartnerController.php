<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreateLeasePartnerRequest;
use App\Http\Requests\Company\UpdateLeasePartnerRequest;
use App\Repositories\Company\LeasePartnerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use Auth;
use App\Models\Company\Currency;
use App\Models\CompanyBuilding;
use App\Models\Company\LeaseCounterpart;
use App\Models\Company\LeaseContractInformation;
use App\Models\Company\LeaseAttachment;

class LeasePartnerController extends AppBaseController
{
    /** @var  LeasePartnerRepository */
    private $leasePartnerRepository;

    public function __construct(LeasePartnerRepository $leasePartnerRepo)
    {
        $this->leasePartnerRepository = $leasePartnerRepo;
    }

    /**
     * Display a listing of the LeasePartner.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->leasePartnerRepository->pushCriteria(new RequestCriteria($request));
        $leasePartners = $this->leasePartnerRepository->all();

        return view('company.lease_partners.index')
            ->with('leasePartners', $leasePartners);
    }

    /**
     * Show the form for creating a new LeasePartner.
     *
     * @return Response
     */
    public function create()
    {

        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;

        $buildings = CompanyBuilding::where('company_id',$company_id)->get();
        $currencies = Currency::all();

        $data = [
            'currencies' => $currencies,
            'buildings'  => $buildings   
        ];

        return view('company.lease_partners.create',$data);
    }

    /**
     * Store a newly created LeasePartner in storage.
     *
     * @param CreateLeasePartnerRequest $request
     *
     * @return Response
     */
    public function store(CreateLeasePartnerRequest $request)
    {
        
        $input = $request->all();



        if(isset($input['delegated']) &&  $input['delegated'] == 'on')
        {
            $input['delegated'] = 1;
        }
        else
        {
            $input['delegated'] = 0;
        }

        $leasePartner = $this->leasePartnerRepository->create($input);
        return response()->json($leasePartner);
    }

    /**
     * Display the specified LeasePartner.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $leasePartner = $this->leasePartnerRepository->findWithoutFail($id);

        if (empty($leasePartner)) {
            Flash::error('Lease Partner not found');

            return redirect(route('company.leasePartners.index'));
        }

        return view('company.lease_partners.show')->with('leasePartner', $leasePartner);
    }

    /**
     * Show the form for editing the specified LeasePartner.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $leasePartner = $this->leasePartnerRepository->findWithoutFail($id);

        if (empty($leasePartner)) 
        {
            session()->flash('msg.error','Lease Partner not found');
            return redirect(route('company.leasePartners.index'));
        }

        $data['leasePartner'] = $leasePartner;

        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;

        $buildings = CompanyBuilding::where('company_id',$company_id)->get();
        $data['buildings'] = $buildings; 
        $currencies = Currency::all();
        $data['currencies'] = $currencies; 

        $leaseCounterPart =  LeaseCounterpart::where('lease_partner_id',$id)->get();
        if(count($leaseCounterPart) > 0)
        {
            $data['leaseCounterPart'] = $leaseCounterPart;            
        }

        $leaseContractInformation =  LeaseContractInformation::where('lease_partner_id',$id)->get();
        if(count($leaseContractInformation) > 0)
        {
            $data['leaseContractInformation'] = $leaseContractInformation;            
        }

        $leaseAttachment =  LeaseAttachment::where('lease_partner_id',$id)->get();
        if(count($leaseAttachment) > 0)
        {
            $data['leaseAttachment'] = $leaseAttachment;
            $imageFiles = [];
            $url = asset('storage/leasingImages');
            $url2 = public_path()."/storage/leasingImages";
            for($i = 0 ; $i < count($leaseAttachment) ; $i++)
            {
                $imageFiles[$i]['name'] = $leaseAttachment[$i]->file_name;
                $imageFiles[$i]['file'] = $url.'/'.$leaseAttachment[$i]->file_name;
                $imageFiles[$i]['size'] = filesize($url2.'/'.$leaseAttachment[$i]->file_name);
                $imageFiles[$i]['type'] = mime_content_type($url2.'/'.$leaseAttachment[$i]->file_name);
            }
            $data['imageFiles'] = $imageFiles;
        }


        return view('company.lease_partners.edit',$data);
    }

    /**
     * Update the specified LeasePartner in storage.
     *
     * @param  int              $id
     * @param UpdateLeasePartnerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLeasePartnerRequest $request)
    {
        $leasePartner = $this->leasePartnerRepository->findWithoutFail($id);

        $input = $request->all();

        if(isset($input['delegated']) &&  $input['delegated'] == 'on')
        {
            $input['delegated'] = 1;
        }
        else
        {
            $input['delegated'] = 0;
        }

        if (empty($leasePartner)) 
        {
            session()->flash('msg.error','Lease Partner not found');
            return redirect(route('company.leasePartners.index'));
        }

        $leasePartner = $this->leasePartnerRepository->update($input, $id);

        if($leasePartner)
        {   
            return response()->json(['status' => 'success','msg' => 'Lease Partner updated successfully']);
        }
        else
        {
            return response()->json(['status' => 'fail','msg' => 'Lease Partner cannot be updated']);
        }

        // Flash::success('Lease Partner updated successfully.');

        // return redirect(route('company.leasePartners.index'));
    }

    /**
     * Remove the specified LeasePartner from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $leasePartner = $this->leasePartnerRepository->findWithoutFail($id);

        if (empty($leasePartner)) {
            Flash::error('Lease Partner not found');

            return redirect(route('company.leasePartners.index'));
        }

        $this->leasePartnerRepository->delete($id);

        Flash::success('Lease Partner deleted successfully.');

        return redirect(route('company.leasePartners.index'));
    }
}
