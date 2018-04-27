<?php

namespace App\Repositories\Company;

use App\Models\Service;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ServiceRepository
 * @package App\Repositories\Admin
 * @version April 8, 2018, 3:43 pm UTC
 *
 * @method Service findWithoutFail($id, $columns = ['*'])
 * @method Service find($id, $columns = ['*'])
 * @method Service first($columns = ['*'])
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
