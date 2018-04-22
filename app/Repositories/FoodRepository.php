<?php

namespace App\Repositories;

use App\Models\Food;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FoodRepository
 * @package App\Repositories\Company/conference
 * @version April 21, 2018, 11:23 am UTC
 *
 * @method Food findWithoutFail($id, $columns = ['*'])
 * @method Food find($id, $columns = ['*'])
 * @method Food first($columns = ['*'])
*/
class FoodRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'price_per_attendee'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Food::class;
    }

    public function getFoodItems()
    {
        return Food::select('title','id')->orderBy('title', 'asc')->get();
    }

}
