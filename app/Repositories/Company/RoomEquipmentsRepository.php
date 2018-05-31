<?php

namespace App\Repositories\Company;

use App\Models\Company\RoomEquipments;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RoomEquipmentsRepository
 * @package App\Repositories\Company
 * @version May 31, 2018, 12:05 pm UTC
 *
 * @method RoomEquipments findWithoutFail($id, $columns = ['*'])
 * @method RoomEquipments find($id, $columns = ['*'])
 * @method RoomEquipments first($columns = ['*'])
*/
class RoomEquipmentsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'room_id',
        'room_type',
        'equipment_id',
        'qty',
        'price',
        'info'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RoomEquipments::class;
    }
}
