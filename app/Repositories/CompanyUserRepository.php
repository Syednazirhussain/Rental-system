<?php

namespace App\Repositories;

use App\Models\CompanyUser;
use App\Models\User;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CompanyUserRepository
 * @package App\Repositories
 * @version April 12, 2018, 10:35 am UTC
 *
 * @method CompanyUser findWithoutFail($id, $columns = ['*'])
 * @method CompanyUser find($id, $columns = ['*'])
 * @method CompanyUser first($columns = ['*'])
*/
class CompanyUserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'company_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CompanyUser::class;
    }

    /**
     * Bulk insert
     **/
    public function insert($arr = []) {
        return CompanyUser::insert($arr);
    }

    /**
     * Get Admin Row by Email
     **/
    public function findAdminByEmail(string $adminEmail)
    {

        $user = User::where('email', $adminEmail)->where('user_role_code', 'company_admin')->first();
        return $user;
    }

    public function getCompanyUserByCompanyId($company_id)
    {
        $CompanyUser = CompanyUser::where('company_id',$company_id)->first();
        if (count($CompanyUser)) 
        {
            return $CompanyUser;
        }
        else
        {
            return [];
        }
    }

}
