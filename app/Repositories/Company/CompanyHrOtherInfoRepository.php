<?php

namespace App\Repositories\Company;

use App\Models\Company\CompanyHrOtherInfo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CompanyHrOtherInfoRepository
 * @package App\Repositories\Company
 * @version June 19, 2018, 1:50 pm UTC
 *
 * @method CompanyHrOtherInfo findWithoutFail($id, $columns = ['*'])
 * @method CompanyHrOtherInfo find($id, $columns = ['*'])
 * @method CompanyHrOtherInfo first($columns = ['*'])
*/
class CompanyHrOtherInfoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'company_hr_id',
        'languages',
        'driving_license',
        'skills'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CompanyHrOtherInfo::class;
    }
}
