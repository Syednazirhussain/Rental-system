<?php

namespace App\Repositories;

use App\Model\CompanyInvoice;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CompanyInvoiceRepository
 * @package App\Repositories\Admin
 * @version April 16, 2018, 3:18 pm UTC
 *
 * @method CompanyInvoice findWithoutFail($id, $columns = ['*'])
 * @method CompanyInvoice find($id, $columns = ['*'])
 * @method CompanyInvoice first($columns = ['*'])
*/
class CompanyInvoiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'company_id',
        'payment_cycle_id',
        'payment_cycle',
        'discount',
        'tax',
        'total'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CompanyInvoice::class;
    }

    public function checkLeftDay($contract_end_date)
    {
        $days = strtotime($contract_end_date) - time();
        $left_days = round($days/(60 * 60 * 24));
        return $left_days;
    }


    public function getLastInsertedInvoiceId()
    {
        return CompanyInvoice::latest()->first();
    }

    public function totalAndDiscountedTotal($data,$calculateByCompanyModulePrice = true)
    {
        // ['company_modules']['company_module'][0]['module_name']
        $total = 0;
        $final_total = 0;
        $discount = 0;
        $remaining_days = 0;
        if ($calculateByCompanyModulePrice == true) 
        {
            if ($data['payment_method'] == 'Monthly') 
            {
                for ($i=0; $i < count($data['company_modules']['company_module']) ; $i++) 
                { 
                    $total += $data['company_modules']['company_module'][$i]['module_price'];
                }
                if ($data['discount_method'] == 'Fixed Price') 
                {
                    $discount -= $data['discount'];
                    $remaining_days = $this->checkLeftDay($data['contract_end_date']);
                    $final_total = $total - $discount;
                }
                elseif ($data['discount_method'] == 'Percentage') 
                {
                    $discount = $total*($data['discount']/100);
                    $remaining_days = $this->checkLeftDay($data['contract_end_date']);
                    $final_total = $total - $discount;
                }
            }
            elseif ($data['payment_method'] == 'Quaterly') 
            {

            }
            elseif ($data['payment_method'] == 'Half Yearly') 
            {

            }
            elseif ($data['payment_method'] == 'Annually') 
            {

            }
        }
        else
        {
            if ($data['payment_method'] == 'Monthly') 
            {
                if ($data['discount_method'] == 'Fixed Price') 
                {

                }
                elseif ($data['discount_method'] == 'Percentage') 
                {

                }
            }
            elseif ($data['payment_method'] == 'Quaterly') 
            {

            }
            elseif ($data['payment_method'] == 'Half Yearly') 
            {

            }
            elseif ($data['payment_method'] == 'Annually') 
            {

            }
        }
        return ['Total' => $total,'Discount' => $discount,'FinalAmount' => $final_total,'ContractRemainingDays' => $remaining_days];
    }


    public function sumUpCompanyModule($company_details)
    {
        $index = 0;
        $company_module = array();
        for ($i=0; $i < count($company_details['company_modules']); $i++) 
        { 
            $moduleId = $company_details['company_modules'][$i]->module_id;
            for ($j=0; $j < count($company_details['company_related_modules']); $j++) 
            { 
                if ($company_details['company_related_modules'][$j]->id == $moduleId) 
                {
                    $company_module[$index] = array(
                                                'module_id'                => $company_details['company_related_modules'][$j]->id,
                                                'module_name'              => $company_details['company_related_modules'][$j]->name,
                                                'module_price'             => $company_details['company_related_modules'][$j]->price,
                                                'module_price_for_company' => $company_details['company_modules'][$i]->price,
                                                'module_user_limit'        => $company_details['company_modules'][$i]->users_limit
                                            );
                    $index++;
                }
            }
        }
        return $company_module;           
    }




    
}
