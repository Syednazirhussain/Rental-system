<?php

namespace App\Repositories\Company;

use App\Models\Company\hrCompanyEmployment;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class hrCompanyEmploymentRepository
 * @package App\Repositories\Company
 * @version June 11, 2018, 11:57 am UTC
 *
 * @method hrCompanyEmployment findWithoutFail($id, $columns = ['*'])
 * @method hrCompanyEmployment find($id, $columns = ['*'])
 * @method hrCompanyEmployment first($columns = ['*'])
*/
class hrCompanyEmploymentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'employment_date',
        'termination_time',
        'employeed_untill',
        'personal_category',
        'collective_type',
        'employment_form',
        'insurance_date',
        'insurance_fees',
        'department',
        'designation',
        'vacancies'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return hrCompanyEmployment::class;
    }
}
