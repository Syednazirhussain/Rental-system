<?php

namespace App\Repositories\Company;

use App\Models\Company\hrSalaryType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class hrSalaryTypeRepository
 * @package App\Repositories\Company
 * @version June 13, 2018, 7:08 am UTC
 *
 * @method hrSalaryType findWithoutFail($id, $columns = ['*'])
 * @method hrSalaryType find($id, $columns = ['*'])
 * @method hrSalaryType first($columns = ['*'])
*/
class hrSalaryTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return hrSalaryType::class;
    }
}
