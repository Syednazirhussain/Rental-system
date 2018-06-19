<?php

namespace App\Repositories\Company;

use App\Models\Company\LeaseCounterpart;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LeaseCounterpartRepository
 * @package App\Repositories\Company
 * @version June 11, 2018, 9:58 am UTC
 *
 * @method LeaseCounterpart findWithoutFail($id, $columns = ['*'])
 * @method LeaseCounterpart find($id, $columns = ['*'])
 * @method LeaseCounterpart first($columns = ['*'])
*/
class LeaseCounterpartRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'organization_number',
        'company_name',
        'contract_person',
        'tel',
        'email',
        'lease_partner_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LeaseCounterpart::class;
    }
}
