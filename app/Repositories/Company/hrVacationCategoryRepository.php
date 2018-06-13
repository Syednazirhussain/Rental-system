<?php

namespace App\Repositories\Company;

use App\Models\Company\hrVacationCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class hrVacationCategoryRepository
 * @package App\Repositories\Company
 * @version June 13, 2018, 7:28 am UTC
 *
 * @method hrVacationCategory findWithoutFail($id, $columns = ['*'])
 * @method hrVacationCategory find($id, $columns = ['*'])
 * @method hrVacationCategory first($columns = ['*'])
*/
class hrVacationCategoryRepository extends BaseRepository
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
        return hrVacationCategory::class;
    }
}
