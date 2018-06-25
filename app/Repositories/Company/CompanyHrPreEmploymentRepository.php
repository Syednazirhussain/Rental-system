<?php

namespace App\Repositories\Company;

use App\Models\Company\CompanyHrPreEmployment;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CompanyHrPreEmploymentRepository
 * @package App\Repositories\Company
 * @version June 19, 2018, 1:53 pm UTC
 *
 * @method CompanyHrPreEmployment findWithoutFail($id, $columns = ['*'])
 * @method CompanyHrPreEmployment find($id, $columns = ['*'])
 * @method CompanyHrPreEmployment first($columns = ['*'])
*/
class CompanyHrPreEmploymentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'company_hr_id',
        'organization_name',
        'job_title',
        'courses',
        'employed_from',
        'employed_until',
        'create_at'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CompanyHrPreEmployment::class;
    }
}
