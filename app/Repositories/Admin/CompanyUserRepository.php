<?php

namespace App\Repositories\Admin;

use App\Models\CompanyUser;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CompanyUserRepository
 * @package App\Repositories\Admin
 * @version April 4, 2018, 1:36 pm UTC
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
}
