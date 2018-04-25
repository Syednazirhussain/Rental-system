<?php

namespace App\Repositories\Admin;

use App\Models\CompanyFloorRoom;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CompanyFloorRoomRepository
 * @package App\Repositories
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
        'num_rooms',
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


    /**
     * Get Company Building Floors
     **/
    public function getBuildingFloors($buildings = []) {

        $companyRooms =  CompanyFloorRoom::whereIn('building_id', $buildings)
                                ->orderBy('building_id', 'desc')
                                ->get();

        $rooms = [];
        foreach ($companyRooms as $r) {

            $i = 0;
            foreach ($companyRooms as $a) {
                if ($a->building_id == $r->building_id) {
                    $rooms[$r->building_id][$i]['id'] = $a->id;                    
                    $rooms[$r->building_id][$i]['floor'] = $a->floor;
                    $rooms[$r->building_id][$i]['num_rooms'] = $a->num_rooms;
                    $i++;
                }
            }
        }

        return $rooms;
    }



}
