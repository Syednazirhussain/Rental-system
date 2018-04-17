<?php

namespace App\Repositories;

use App\Models\CompanyModule;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CompanyModuleRepository
 * @package App\Repositories
 * @version April 12, 2018, 8:12 am UTC
 *
 * @method CompanyModule findWithoutFail($id, $columns = ['*'])
 * @method CompanyModule find($id, $columns = ['*'])
 * @method CompanyModule first($columns = ['*'])
*/
class CompanyModuleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'company_id',
        'module_id',
        'price',
        'users_limit'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CompanyModule::class;
    }


    /**
     * Bulk insert
     **/
    public function insert($arr = []) {
        return CompanyModule::insert($arr);
    }
}
