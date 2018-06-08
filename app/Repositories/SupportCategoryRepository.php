<?php

namespace App\Repositories;

use App\Models\CompanySupportCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SupportCategoryRepository
 * @package App\Repositories\Admin
 * @version May 10, 2018, 1:32 pm UTC
 *
 * @method SupportCategory findWithoutFail($id, $columns = ['*'])
 * @method SupportCategory find($id, $columns = ['*'])
 * @method SupportCategory first($columns = ['*'])
*/
class SupportCategoryRepository extends BaseRepository
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
        return CompanySupportCategory::class;
    }
}
