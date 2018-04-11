<?php

namespace App\Repositories;

use App\Models\UserStatus;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UserStatusRepository
 * @package App\Repositories\Admin
 * @version April 4, 2018, 12:59 pm UTC
 *
 * @method UserStatus findWithoutFail($id, $columns = ['*'])
 * @method UserStatus find($id, $columns = ['*'])
 * @method UserStatus first($columns = ['*'])
*/
class UserStatusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserStatus::class;
    }
}
