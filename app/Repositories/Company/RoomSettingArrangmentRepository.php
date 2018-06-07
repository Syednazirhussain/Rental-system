<?php

namespace App\Repositories\Company;

use App\Models\Company\RoomSettingArrangment;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RoomSettingArrangmentRepository
 * @package App\Repositories\Company
 * @version May 31, 2018, 12:03 pm UTC
 *
 * @method RoomSettingArrangment findWithoutFail($id, $columns = ['*'])
 * @method RoomSettingArrangment find($id, $columns = ['*'])
 * @method RoomSettingArrangment first($columns = ['*'])
*/
class RoomSettingArrangmentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'room_id',
        'company_id',
        'building_id',
        'name',
        'number_persons'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RoomSettingArrangment::class;
    }
}
