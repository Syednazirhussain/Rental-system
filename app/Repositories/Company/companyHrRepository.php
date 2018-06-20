<?php

namespace App\Repositories\Company;

use App\Models\Company\companyHr;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class companyHrRepository
 * @package App\Repositories\Company
 * @version June 11, 2018, 7:45 am UTC
 *
 * @method companyHr findWithoutFail($id, $columns = ['*'])
 * @method companyHr find($id, $columns = ['*'])
 * @method companyHr first($columns = ['*'])
*/
class companyHrRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'address_1',
        'address_2',
        'post_code',
        'city_id',
        'state_id',
        'country_id',
        'telephone_job',
        'telephone_private',
        'email_job',
        'email_private',
        'civil_status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return companyHr::class;
    }
}
