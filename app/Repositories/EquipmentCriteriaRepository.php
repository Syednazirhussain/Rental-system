<?php

namespace App\Repositories;

use App\Models\EquipmentCriteria;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EquipmentCriteriaRepository
 * @package App\Repositories\Company/conference
 * @version April 21, 2018, 12:24 pm UTC
 *
 * @method EquipmentCriteria findWithoutFail($id, $columns = ['*'])
 * @method EquipmentCriteria find($id, $columns = ['*'])
 * @method EquipmentCriteria first($columns = ['*'])
*/
class EquipmentCriteriaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'title'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EquipmentCriteria::class;
    }



    public function getEquipmetsCriteria()
    {
        return EquipmentCriteria::orderBy('title', 'asc')->get();
    }





}
