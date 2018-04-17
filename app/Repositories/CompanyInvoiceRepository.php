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

    public function totalAndDiscountedTotal($payment_method,$discount_method,$discount,$company_modules,$calculateByCompanyModulePrice = true)
    {
        $total = 0;
        $final_total = 0;
        if ($calculateByCompanyModulePrice == true) 
        {
            if ($payment_method == 'Monthly') 
            {
                for ($i=0; $i < count($company_modules) ; $i++) 
                { 
                    $total += $company_modules[$i]['module_price'];
                }
                if ($discount_method == 'Fixed Price') 
                {
                    $final_total -= $discount;
                }
                elseif ($discount_method == 'Percentage') 
                {
                    $final_total = $total*($discount/100);
                }
            }
            elseif ($payment_method == 'Quaterly') 
            {

            }
            elseif ($payment_method == 'Half Yearly') 
            {

            }
            elseif ($payment_method == 'Annually') 
            {

            }
        }
        else
        {
            if ($payment_method == 'Monthly') 
            {
                if ($discount_method == 'Fixed Price') 
                {

                }
                elseif ($discount_method == 'Percentage') 
                {

                }
            }
            elseif ($payment_method == 'Quaterly') 
            {

            }
            elseif ($payment_method == 'Half Yearly') 
            {

            }
            elseif ($payment_method == 'Annually') 
            {

            }
        }
        return ['Total' => $total,'DisCountedTotal' => $final_total];
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
