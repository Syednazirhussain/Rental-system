<?php

namespace App\Repositories\Admin;

use App\Models\UserRole;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UserRoleRepository
 * @package App\Repositories
 * @version April 4, 2018, 12:58 pm UTC
 *
 * @method UserRole findWithoutFail($id, $columns = ['*'])
 * @method UserRole find($id, $columns = ['*'])
 * @method UserRole first($columns = ['*'])
*/
class UserRoleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserRole::class;
    }
}
