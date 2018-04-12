<?php

namespace App\Repositories\Admin;

use App\Models\CompanyFloorRoom;
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
class CompanyFloorRoomRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'building_id',
        'company_id',
        'floor',
        'num_rooms'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CompanyFloorRoom::class;
    }


    /**
     * Bulk insert
     **/
    public function insert($arr = []) {
        return CompanyFloorRoom::insert($arr);
    }
}
