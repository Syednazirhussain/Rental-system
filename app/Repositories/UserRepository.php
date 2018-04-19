<?php

namespace App\Repositories;

use App\Models\User;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version April 4, 2018, 12:33 pm UTC
 *
 * @method User findWithoutFail($id, $columns = ['*'])
 * @method User find($id, $columns = ['*'])
 * @method User first($columns = ['*'])
*/
class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'password',
        'user_role_code',
        'country_id',
        'state_id',
        'city_id',
        'user_status_id',
        'uuid',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }

    /**
     * Bulk insert
     **/
    public function insert($arr = []) {
        return User::insert($arr);
    }


    public function adminAccountSettings($updateArr, $id) {
        
        return User::where('id', $id)->update($updateArr);
    }

    public function findSiteAdminByEmail(string $siteAdmin_email)
    {
        $user = User::where('email', $siteAdmin_email)->where('user_role_code', 'admin')->first();
        return $user;
    }

    public function adminAccountSettingsRemoveProfilePic($profilePicName)
    {

        $null = NULL;
        
        $data = [
                    'profile_pic' => $null
                ];

        $userProfilePic = User::where('profile_pic', $profilePicName)->update($data);

        return $userProfilePic;
    }
}
