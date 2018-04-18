<?php

namespace App\Repositories\Company;

use App\Models\Service;
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
class ServiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'company_id',
        'name',
        'price'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Service::class;
    }


    /**
     * Bulk insert
     **/
    public function insert($arr = [])
    {
        return Service::insert($arr);
    }
}
