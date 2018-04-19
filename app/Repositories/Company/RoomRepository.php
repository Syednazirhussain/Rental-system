<?php

namespace App\Repositories\Company;

use App\Models\Room;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RoomRepository
 * @package App\Repositories\Admin
 * @version April 8, 2018, 3:43 pm UTC
 *
 * @method Room findWithoutFail($id, $columns = ['*'])
 * @method Room find($id, $columns = ['*'])
 * @method Room first($columns = ['*'])
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
