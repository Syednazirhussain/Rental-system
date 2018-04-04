<?php

namespace App\Repositories\Admin;

use App\Models\CompanyModule;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CompanyModuleRepository
 * @package App\Repositories\Admin
 * @version April 4, 2018, 1:33 pm UTC
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
        'price'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CompanyModule::class;
    }
}
