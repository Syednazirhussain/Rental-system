<?php

namespace App\Repositories;

use App\Models\RoomContracts;
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
class RoomContractRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'room_id',
        'start_date',
        'end_date',
        'price',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RoomContracts::class;
    }


    /**
     * Bulk insert
     **/
    public function insert($arr = [])
    {
        return RoomContracts::insert($arr);
    }
}
