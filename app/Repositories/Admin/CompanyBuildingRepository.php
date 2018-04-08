<?php

namespace App\Repositories\Admin;

use App\Models\CompanyBuilding;
// use App\Models\CompanyFloorRoom;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CompanyBuildingRepository
 * @package App\Repositories\Admin
 * @version April 8, 2018, 1:53 pm UTC
 *
 * @method CompanyBuilding findWithoutFail($id, $columns = ['*'])
 * @method CompanyBuilding find($id, $columns = ['*'])
 * @method CompanyBuilding first($columns = ['*'])
*/
class CompanyBuildingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'address',
        'zipcode',
        'num_floors',
        'company_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CompanyBuilding::class;
    }


    public function insertFloors() {

    }
}
