<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateCompanyInvoiceRequest;
use App\Http\Requests\Admin\UpdateCompanyInvoiceRequest;
use App\Repositories\CompanyInvoiceRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;



use App\Repositories\Admin\CompanyRepository;
use App\Repositories\Admin\CompanyBuildingRepository;
use App\Repositories\Admin\CompanyContactPersonRepository;
use App\Repositories\Admin\CompanyContractRepository;
use App\Repositories\Admin\CompanyModuleRepository;
use App\Repositories\PaymentCycleRepository;
use App\Repositories\DiscountTypeRepository;

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

    public function __construct(
        CompanyInvoiceRepository $companyInvoiceRepo,
        CompanyRepository $CompanyRepository,
        CompanyBuildingRepository $CompanyBuildingRepository,
        CompanyContactPersonRepository $CompanyContactPersonRepository,
        CompanyContractRepository $CompanyContractRepository,
        CompanyModuleRepository $CompanyModuleRepository,
        PaymentCycleRepository $PaymentCycleRepository,
        DiscountTypeRepository $DiscountTypeRepository
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
    }

    /**
     * Display a listing of the CompanyInvoice.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyInvoiceRepository->pushCriteria(new RequestCriteria($request));
        $companyInvoices = $this->companyInvoiceRepository->all();

        $company =  $this->companyRepository->all();
        $company_id = $company[0]->id;

        // This is the responsible to display single company infomation & modules with discounted
        return $this->showInvoiceByCompanyId($company_id);
      
        return view('admin.company_invoices.index')
            ->with('company_details', $company_details);
    }

    public function showInvoiceByCompanyId($company_id)
    {
        if($this->companyContractRepository->checkCompanyContract($company_id))
        {
            $company_details = $this->getCompanyInformationById($company_id);

            $company_modules =  $this->companyInvoiceRepository->sumUpCompanyModule($company_details);
            $payment_cycle_id = $company_details['company_contract'][0]->payment_cycle;
            $payment_method = $this->paymentCycleRepository->getPaymentCycleById($payment_cycle_id);
            $discount = $company_details['company_contract'][0]->discount;
            $discount_type_id = $company_details['company_contract'][0]->discount_type;
            $discount_method = $this->discountTypeRepository->getDiscountTypeById($discount_type_id);
            $company_discount_detail =  $this->companyInvoiceRepository->totalAndDiscountedTotal($payment_method,$discount_method,$discount,$company_modules,true);

            $company_invoice_infomation = [
                'Company'  => $company_details['company'],
                'Buildings'=> $company_details['company_buildings'],
                'Contact_Person' => $company_details['company_contract_persons'],
                'Contract'  => $company_details['company_contract'],
                'Modules'  => $company_modules,
                'Discount' => $company_discount_detail
            ];

            return $company_invoice_infomation;

        }
        else
        {
            // Company Contract Expire de-activate it.
        }  
    }


    private function getCompanyInformationById($company_id)
    {
        $company_info = $this->companyRepository->getCompanyById($company_id);
        $company_buildings =  $this->companyBuildingRepository->getCompanyBuilding($company_id);
        $company_contract_persons = $this->companyContactPersonRepository->getCompanyContractPerson($company_id);
        $company_contract =  $this->companyContractRepository->getCompanyContract($company_id);
        $company_modules = $this->companyModuleRepository->getCompanyModule($company_id);
        $company_related_modules = $this->companyModuleRepository->getCompanyRelatedModule($company_modules);
        $company_info = array(
            'company'              => $company_info,
            'company_buildings'         => $company_buildings,
            'company_contract_persons'  => $company_contract_persons,
            'company_contract'          => $company_contract,
            'company_modules'           => $company_modules,
            'company_related_modules'   => $company_related_modules 
        );
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
