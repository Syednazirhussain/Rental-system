<?php

namespace App\Repositories\Admin;

use App\Models\CompanyBuilding;
use App\Models\CompanyFloorRoom;
// use App\Models\CompanyFloorRoom;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CompanyBuildingRepository
 * @package App\Repositories
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

    public function getCompanyBuilding($company_id)
    {
        return CompanyBuilding::where('company_id',$company_id)->get();
    }

    public function getCompanyBuildingAllFloorInformation($company_id,$company_buildings)
    {
        $responseArr = array();
        for($i = 0 ; $i < count($company_buildings) ; $i++)
        {
            $responseArr[$i] = CompanyFloorRoom::where('company_id',$company_id)->where('building_id',$company_buildings[$i]->id);
        }
        return $responseArr;
    }


    public function companyBuildingCount()
    {
        return CompanyBuilding::count();
    }

}
