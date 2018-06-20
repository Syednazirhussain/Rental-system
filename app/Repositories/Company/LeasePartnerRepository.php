<?php

namespace App\Repositories\Company;

use App\Models\Company\LeasePartner;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LeasePartnerRepository
 * @package App\Repositories\Company
 * @version June 11, 2018, 9:57 am UTC
 *
 * @method LeasePartner findWithoutFail($id, $columns = ['*'])
 * @method LeasePartner find($id, $columns = ['*'])
 * @method LeasePartner first($columns = ['*'])
*/
class LeasePartnerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'parent_company',
        'sister_company',
        'sales_person',
        'delegated'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LeasePartner::class;
    }
}
