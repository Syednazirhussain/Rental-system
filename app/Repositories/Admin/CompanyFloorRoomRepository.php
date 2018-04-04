<?php

namespace App\Repositories\Admin;

use App\Models\CompanyFloorRoom;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CompanyFloorRoomRepository
 * @package App\Repositories\Admin
 * @version April 4, 2018, 1:35 pm UTC
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
}
