<?php

namespace App\Repositories\Company;

use App\Models\Room;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CompanyFloorRoomRepository
 * @package App\Repositories\Admin
 * @version April 8, 2018, 3:43 pm UTC
 *
 * @method CompanyFloorRoom findWithoutFail($id, $columns = ['*'])
 * @method CompanyFloorRoom find($id, $columns = ['*'])
 * @method CompanyFloorRoom first($columns = ['*'])
*/
class RoomRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'floor_id',
        'service_id',
        'name',
        'area',
        'price',
        'security_code',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Room::class;
    }


    /**
     * Bulk insert
     **/
    public function insert($arr = [])
    {
        return Room::insert($arr);
    }
}
