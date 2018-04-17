<?php

namespace App\Repositories;

use App\Models\DiscountType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DiscountTypeRepository
 * @package App\Repositories
 * @version April 11, 2018, 3:24 pm UTC
 *
 * @method DiscountType findWithoutFail($id, $columns = ['*'])
 * @method DiscountType find($id, $columns = ['*'])
 * @method DiscountType first($columns = ['*'])
*/
class DiscountTypeRepository extends BaseRepository
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
        return DiscountType::class;
    }
}
