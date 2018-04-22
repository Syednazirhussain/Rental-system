<?php

namespace App\Repositories;

use App\Models\Equipments;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EquipmentsRepository
 * @package App\Repositories\Company/conference
 * @version April 21, 2018, 12:44 pm UTC
 *
 * @method Equipments findWithoutFail($id, $columns = ['*'])
 * @method Equipments find($id, $columns = ['*'])
 * @method Equipments first($columns = ['*'])
*/
class EquipmentsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'price',
        'criteria_id',
        'is_multi_units'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Equipments::class;
    }
}
