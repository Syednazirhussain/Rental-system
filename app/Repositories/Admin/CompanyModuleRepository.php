<?php

namespace App\Repositories\Admin;

use App\Models\CompanyModule;
use App\Models\Module;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CompanyModuleRepository
 * @package App\Repositories\Admin
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

    public function getCompanyModule($company_id)
    {
        return CompanyModule::where('company_id',$company_id)->get();
    }

    public function getCompanyRelatedModule($company_modules)
    {
        $modules_id = array();
        for ($i=0 ; $i < count($company_modules) ; $i++) { 
           $modules_id[$i] = $company_modules[$i]->module_id;
        }
        return Module::find($modules_id);
    }




}
