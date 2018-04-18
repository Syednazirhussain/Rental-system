<?php

namespace App\Repositories\Admin;

use App\Models\CompanyContract;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CompanyContractRepository
 * @package App\Repositories\Admin
 * @version April 10, 2018, 5:25 pm UTC
 *
 * @method CompanyContract findWithoutFail($id, $columns = ['*'])
 * @method CompanyContract find($id, $columns = ['*'])
 * @method CompanyContract first($columns = ['*'])
*/
class CompanyContractRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'company_id',
        'number',
        'content',
        'start_date',
        'end_date',
        'termindation_date',
        'payment_method',
        'payment_cycle',
        'discount',
        'discount_type'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CompanyContract::class;
    }

    /**
     * Get Contract Row
     **/
    public function findContractByNumber(string $contractNo)
    {
        $contract = CompanyContract::where('number', $contractNo)->first();
        return $contract;
    }

    public function checkCompanyContract($company_id)
    {

        $contract = CompanyContract::where('company_id',$company_id)->orderBy('id', 'desc')->get();
        $company_contract_end_date = $contract[0]->end_date;
        if (strtotime($company_contract_end_date) >= time()) 
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function getCompanyContract($company_id)
    {
        return CompanyContract::where('company_id',$company_id)->orderBy('id', 'desc')->get();
    }


}
