<?php

namespace App\Repositories\Admin;

use App\Models\CompanyUser;
use App\Models\User;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CompanyUserRepository
 * @package App\Repositories\Admin
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
}
