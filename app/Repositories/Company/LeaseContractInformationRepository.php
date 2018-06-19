<?php

namespace App\Repositories\Company;

use App\Models\Company\LeaseContractInformation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LeaseContractInformationRepository
 * @package App\Repositories\Company
 * @version June 11, 2018, 10:00 am UTC
 *
 * @method LeaseContractInformation findWithoutFail($id, $columns = ['*'])
 * @method LeaseContractInformation find($id, $columns = ['*'])
 * @method LeaseContractInformation first($columns = ['*'])
*/
class LeaseContractInformationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'contract_start_date',
        'contract_length',
        'termination_time',
        'contract_auto_renewal',
        'contract_renewal',
        'renewal_number_month',
        'contract_type',
        'contract_number',
        'contract_name',
        'contract_desc',
        'amount_per_month',
        'income_per_month',
        'currency_id',
        'cost_reference',
        'income_reference',
        'other_reference',
        'lease_attachment_id',
        'building_id',
        'cost_number',
        'lease_partner_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LeaseContractInformation::class;
    }
}
