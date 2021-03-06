<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Admin\CreateCompanyInvoiceRequest;
use App\Http\Requests\Admin\UpdateCompanyInvoiceRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\PaymentCycle;
use App\Models\Room;
use App\Models\RoomContracts;
use App\Repositories\CompanyInvoiceRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;
use Prettus\Repository\Criteria\RequestCriteria;
use Illuminate\Support\Facades\Storage;
use App\Mail\NewInvoiceMail;
use Mail;


use App\Repositories\CompanyRepository;
use App\Repositories\CompanyBuildingRepository;
use App\Repositories\CompanyContactPersonRepository;
use App\Repositories\CompanyContractRepository;
use App\Repositories\CompanyModuleRepository;
use App\Repositories\ModuleRepository;
use App\Repositories\PaymentCycleRepository;
use App\Repositories\DiscountTypeRepository;
use App\Repositories\CompanyInvoiceItemRepository;
use App\Repositories\GeneralSettingRepository;


use Session;
use Flash;
use Response;
use Carbon;
use PDF;
use App\Models\CompanyContactPerson;
use Illuminate\Support\Facades\Auth;
use App\Models\State;

class CompanyInvoiceController extends AppBaseController
{
    /** @var  CompanyInvoiceRepository */
    private $companyInvoiceRepository;
    private $companyRepository;
    private $companyBuildingRepository;
    private $companyContactPersonRepository;
    private $companyContractRepository;
    private $companyModuleRepository;
    private $paymentCycleRepository;
    private $moduleRepository;
    private $companyInvoiceItemRepository;

    public function __construct(
        CompanyInvoiceRepository $companyInvoiceRepo,
        CompanyRepository $CompanyRepository,
        CompanyBuildingRepository $CompanyBuildingRepository,
        CompanyContactPersonRepository $CompanyContactPersonRepository,
        CompanyContractRepository $CompanyContractRepository,
        CompanyModuleRepository $CompanyModuleRepository,
        PaymentCycleRepository $PaymentCycleRepository,
        DiscountTypeRepository $DiscountTypeRepository,
        ModuleRepository $ModuleRepository,
        CompanyInvoiceItemRepository $CompanyInvoiceItemRepo,
        GeneralSettingRepository $GeneralSettingRepository
    )
    {
        $this->companyInvoiceRepository = $companyInvoiceRepo;
        $this->companyRepository = $CompanyRepository;
        $this->companyBuildingRepository = $CompanyBuildingRepository;
        $this->companyContactPersonRepository = $CompanyContactPersonRepository;
        $this->companyContractRepository = $CompanyContractRepository;
        $this->companyModuleRepository = $CompanyModuleRepository;
        $this->paymentCycleRepository = $PaymentCycleRepository;
        $this->discountTypeRepository = $DiscountTypeRepository;
        $this->moduleRepository = $ModuleRepository;
        $this->companyInvoiceItemRepository = $CompanyInvoiceItemRepo;
        $this->generalSettingRepository = $GeneralSettingRepository;
    }


    public function index(Request $request)
    {

        $this->companyInvoiceRepository->pushCriteria(new RequestCriteria($request));
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;

        $Invoices = RoomContracts::join('companies', 'room_contracts.id', '=', 'companies.room_contract_id')
            ->join('company_invoices', 'companies.id', '=', 'company_invoices.company_id')
            ->select('company_invoices.*', 'companies.name')
            ->where('room_contracts.company_id', $company_id)->get();

        return view('company.company_invoices.index')->with('Invoices', $Invoices);
    }

    public function getCompanyDetailById($company_id)
    {
            $company = $this->companyRepository->findWithoutFail($company_id);

            $company_details = [
                'company'                   => $company,
                'city'                      => $company->city->name,
                'state'                     => $company->state->name,
                'country'                   => $company->country->name,
                'company_contract_persons'  => $company->companyContactPeople,
                'company_contract'          => $this->companyContractRepository->getCompanyContract($company_id),
                'company_modules'           => $company->companyModules  
            ];

            $company_modules = $this->mergeCompanyRelatedModuleWithModule($company_details['company_modules']);

            $contract = RoomContracts::join('companies', 'room_contracts.id', '=', 'companies.room_contract_id')->where('companies.id', $company_id)->first();
            $payment_cycle_id = $contract->payment_cycle;
            $discount_type_id = $contract->discount_type;

            if (isset($discount_type_id)) 
            {
                $discount_method = $this->discountTypeRepository->getDiscountTypeById($discount_type_id);
                $vat = $this->generalSettingRepository->getCompanyInvoiceVat();
                $payment_method = $this->paymentCycleRepository->getPaymentCycleById($payment_cycle_id);

                $discount = $contract->discount;
                $contract_start_date =  $contract->start_date;
                $contract_end_date = $contract->end_date;

                $temp = [
                    'discount'              => $discount,
                    'value_edit_tax'        => $vat->meta_value,
                    'discount_method'       => $discount_method,
                    'payment_method'        => $payment_method,
                    'company_modules'       => $company_modules,
                    'contract_start_date'   => $contract_start_date,
                    'contract_end_date'     => $contract_end_date   
                ];
            }
            else
            {

                $vat = $this->generalSettingRepository->getCompanyInvoiceVat();
                $payment_method = $this->paymentCycleRepository->getPaymentCycleById($payment_cycle_id);

                $contract_start_date =  $company_details['company_contract']->start_date;
                $contract_end_date = $company_details['company_contract']->end_date;

                $temp = [
                    'discount'              => 0,
                    'value_edit_tax'        => $vat->meta_value,
                    'discount_method'       => 'Percentage',
                    'payment_method'        => $payment_method,
                    'company_modules'       => $company_modules,
                    'contract_start_date'   => $contract_start_date,
                    'contract_end_date'     => $contract_end_date   
                ];
            }

            //$company_discount_detail =  $this->companyInvoiceRepository->totalAndDiscountedTotal($temp);

            /*echo "<pre>";
            print_r($company_discount_detail);
            exit;*/


            // This array contain company related all invoice information
            $company_infomation = [
                'Company'           => $company_details['company'],
                'Contact_Person'    => $company_details['company_contract_persons'],
                'Contract'          => $contract,
                'Modules'           => $company_modules,
                //'Discount'          => $company_discount_detail,
                'PaymentCycleId'    => $payment_cycle_id,
                'PaymentMethod'     => $payment_method
            ];

            return $company_infomation;
    }

    public function sendLatestInvoiceToCompanyContractPerson($company_id)
    {
        // Increase Execution time
        ini_set('max_execution_time', 300);
        
        $lastInvoice =  $this->companyInvoiceRepository->getLastInsertedInvoiceId();
        $Invoice_id =  $lastInvoice->id;      
        $filename = "invoice_".$Invoice_id.".pdf";         
        $filePath = public_path().DIRECTORY_SEPARATOR."storage".DIRECTORY_SEPARATOR."company_invoices".DIRECTORY_SEPARATOR.$filename;
        $data = ['Path' => $filePath];
        $company_infomation = $this->getCompanyDetailById($company_id); 
        foreach ($company_infomation['Contact_Person'] as $person) 
        {
            Mail::to($person->email)->send(new NewInvoiceMail($data));
        }
        $Invoices = $this->companyInvoiceRepository->all();
        Session::Flash('SendEmails','Invoice send successfully to company contract persons');
        return redirect()->route('admin.companyInvoices.index');
    }


    // This is the responsible to Insert and generate invoice by company ID  
    public function createInvoiceByCompanyId($contract_id)
    {
        $company_id = Company::where('room_contract_id', $contract_id)->first()->id;
        $company_infomation = RoomContracts::find($contract_id);

        if($company_infomation)
        {
            $general_setting = $this->generalSettingRepository->getVendorInfomation();
            $company_infomation['general_setting'] = json_decode($general_setting->meta_value);            

            // return $general_setting->meta_value;
            $setting    = json_decode($general_setting->meta_value);
            $country_id = $setting->country_id;
            $state_id   = $setting->state_id;
            $city_id    = $setting->city_id;
            $due_day    = $setting->due_day;

            $company_infomation['names'] = $this->generalSettingRepository->getCityStateCountryName($city_id,$state_id,$country_id);

            $dt = Carbon\Carbon::now();
            $extended_date = $dt->addDays($due_day);
            $company_infomation['extented_date'] = $extended_date;


            $discount   = $company_infomation['discount'];
            $tax        = $company_infomation['discount'];
            $total      = '5000';

            $company_admin_id = Auth::guard('company')->user()->companyUser()->first()->id;
            $company_admin = Company::find($company_admin_id);
            $admin_address = [
                'city' => City::find($company_admin->city_id)->name,
                'state' => State::find($company_admin->state_id)->name,
                'country' => Country::find($company_admin->country_id)->name
            ];

            $current_room = Room::find(RoomContracts::find($contract_id)->room_id);
            $price = [
                'basic_price' => $current_room->price,
                'discount' => RoomContracts::find($contract_id)->discount,
                'tax' => $current_room->price * 0.25,
                'total' => $current_room->price * 0.25 + $current_room->price,
            ];

            $Invoice = [
                'company_id'         => $company_id,
                'payment_cycle_id'   => $company_infomation->payment_cycle,
                'payment_cycle'      => PaymentCycle::find($company_infomation->payment_cycle)->name,
                'discount'           => $discount,
                'tax'                => $current_room->price * 0.25,
                'total'              =>  $current_room->price * 0.25 + $current_room->price,
                'due_date'           => $extended_date
            ];

            // ---------------------  For Testing Email without entry into database ------------------ //

            if($this->companyInvoiceRepository->create($Invoice))
            {
                $lastInvoice =  $this->companyInvoiceRepository->getLastInsertedInvoiceId();
                $Invoice_id =  $lastInvoice->id;
                $company_infomation['Invoice_id'] = $Invoice_id;


                $Invoice_Item = ['invoice_id' => $Invoice_id, 'company_id' => $company_id];
                if ($this->companyInvoiceItemRepository->create($Invoice_Item)) 
                {
                    $company = [
                        'Company' => Company::find($company_id),
                        'Invoice_id' => $Invoice_id,
                        'Contract' => $company_infomation,
                        'Billed_to' => $company_admin,
                        'Billed_to_address' => $admin_address,
                        'Price' => $price,
                        'Room_name' => $current_room->name,
                    ];

                    $data = ['Invoice' => $company];
                    //dd($data['Invoice']['Price']);
                    $filename = "invoice_".$Invoice_id.".pdf";
                    $lastInsertedInvoice = $this->companyInvoiceRepository->findWithoutFail($Invoice_id);
                    $lastInsertedInvoice->due_date = $extended_date;
                    $lastInsertedInvoice->file_name = $filename;
                    if ($lastInsertedInvoice->save()) 
                    {
                        // For Browser view
                        // return view('admin.companies.invoice')->with('Invoice',$company_infomation);

                        // For saved pdf in company invoice directory
                        $filePath = storage_path("app").DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR."company_invoices";
                        
                        /*echo Storage::exists($filePath);
                        exit;*/

                        if (!file_exists($filePath)) {
                            mkdir($filePath);
                        };

                        $filePath = $filePath.DIRECTORY_SEPARATOR.$filename;
                        $pdf = PDF::loadView('company.contracts.invoice', $data);
                        $pdf->save($filePath);

                        // $path = Storage::put('public/company_invoices', $pdf);
                        // $path = explode("/", $path);

                        // $input['logo'] = $path[2];

                        $data = ['Path' => $filePath];
                        $persons = CompanyContactPerson::where('company_id', $company_id)->get();

                        foreach ($persons as $person)
                        {
                            Mail::to($person->email)->send(new NewInvoiceMail($data));
                        }

                        // Session::Flash("InvoiceSuccess","Invoice successfully created.");
                        
                        session()->flash('msg.success', 'Invoice Message sent successfully');

                        return redirect()->route('company.companyInvoices.index');
                    }
                    else
                    {
                        return json_encode(['status' => 'Failed','result' => 'Invoice due date or file name cannot be update']);
                    }
                }
                else
                {
                    return json_encode(['status' => 'Failed','result' => 'Invoice item can not inserted.']);
                }

            }
            else
            {
                return json_encode(['status' => 'Failed','result' => 'Invoice can not inserted.']);
            }

        }
        else
        {
            return json_encode(['status' => 'Failed','result' => 'Company contract expire']);
        } 
    }


    private function mergeCompanyRelatedModuleWithModule($company_modules)
    {
        $index = 0;
        $modules_id = [];
        foreach ($company_modules as $value) 
        {
            $modules_id[$index] = $value->module_id;
            $index++;    
        }

       /* echo "<pre>";
        print_r($company_modules);*/


        $modules = [];

        $collection = $this->moduleRepository->find($modules_id,['id','name','price']);

        foreach ($company_modules as $value) 
        {
            for ($i=0; $i < count($collection); $i++) 
            {
                if ($collection[$i]->id == $value->module_id) 
                {
                    $modules['company_module'][$i] = [
                        'module_id'                => $collection[$i]->id,
                        'module_name'              => $collection[$i]->name,
                        // 'module_price'             => $collection[$i]->price,
                        'module_price'             => $value->price,
                        'module_price_for_company' => $value->price,
                        'module_user_limit'        => $value->users_limit
                    ];
                }
            }
        }

        return $modules;

    }


    private function getCompanyInformationById($company_id)
    {
        $company_info = $this->companyRepository->getCompanyById($company_id);
        $company_buildings =  $this->companyBuildingRepository->getCompanyBuilding($company_id);
        $company_contract_persons = $this->companyContactPersonRepository->getCompanyContactPerson($company_id);
        $company_contract =  $this->companyContractRepository->getCompanyContract($company_id);
        $company_modules = $this->companyModuleRepository->getCompanyModule($company_id);
        $company_related_modules = $this->companyModuleRepository->getCompanyRelatedModule($company_modules);
        
        $company_info = [
            'company'              => $company_info,
            'company_buildings'         => $company_buildings,
            'company_contract_persons'  => $company_contract_persons,
            'company_contract'          => $company_contract,
            'company_modules'           => $company_modules,
            'company_related_modules'   => $company_related_modules 
        ];
        return $company_info;
    }

    /**
     * Show the form for creating a new CompanyInvoice.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.company_invoices.create');
    }

    /**
     * Store a newly created CompanyInvoice in storage.
     *
     * @param CreateCompanyInvoiceRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyInvoiceRequest $request)
    {
        $input = $request->all();

        $companyInvoice = $this->companyInvoiceRepository->create($input);

        Flash::success('Company Invoice saved successfully.');

        return redirect(route('admin.companyInvoices.index'));
    }

    /**
     * Display the specified CompanyInvoice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companyInvoice = $this->companyInvoiceRepository->findWithoutFail($id);

        if (empty($companyInvoice)) 
        {
            Flash::error('Company Invoice not found');
            return redirect(route('admin.companyInvoices.index'));
        }
        return view('admin.company_invoices.show')->with('companyInvoice', $companyInvoice);
    }



    /**
     * Show the form for editing the specified CompanyInvoice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companyInvoice = $this->companyInvoiceRepository->findWithoutFail($id);

        if (empty($companyInvoice)) {
            Flash::error('Company Invoice not found');

            return redirect(route('admin.companyInvoices.index'));
        }

        return view('admin.company_invoices.edit')->with('companyInvoice', $companyInvoice);
    }

    /**
     * Update the specified CompanyInvoice in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyInvoiceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyInvoiceRequest $request)
    {
        $companyInvoice = $this->companyInvoiceRepository->findWithoutFail($id);

        if (empty($companyInvoice)) {
            Flash::error('Company Invoice not found');

            return redirect(route('admin.companyInvoices.index'));
        }

        $companyInvoice = $this->companyInvoiceRepository->update($request->all(), $id);

        Flash::success('Company Invoice updated successfully.');

        return redirect(route('admin.companyInvoices.index'));
    }

    /**
     * Remove the specified CompanyInvoice from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companyInvoice = $this->companyInvoiceRepository->findWithoutFail($id);

        if (empty($companyInvoice)) {
            Flash::error('Company Invoice not found');

            return redirect(route('admin.companyInvoices.index'));
        }

        $this->companyInvoiceRepository->delete($id);

        Flash::success('Company Invoice deleted successfully.');

        return redirect(route('admin.companyInvoices.index'));
    }
}
