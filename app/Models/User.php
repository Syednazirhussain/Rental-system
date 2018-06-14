<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\Permission\Traits\HasRoles;


/**
 * Class User
 * @package App\Models\Admin
 * @version April 4, 2018, 12:33 pm UTC
 *
 * @property \App\Models\City city
 * @property \App\Models\Country country
 * @property \App\Models\State state
 * @property \App\Models\UserStatus userStatus
 * @property \Illuminate\Database\Eloquent\Collection companyContracts
 * @property \Illuminate\Database\Eloquent\Collection companyModules
 * @property \Illuminate\Database\Eloquent\Collection CompanyUser
 * @property string name
 * @property string email
 * @property string password
 * @property string user_role_code
 * @property integer country_id
 * @property integer state_id
 * @property integer city_id
 * @property integer user_status_id
 * @property string uuid
 * @property string remember_token
 * @property string|\Carbon\Carbon created_at
 * @property string|\Carbon\Carbon updated_at
 * @property string|\Carbon\Carbon deleted_at
 */

class User extends Authenticatable
{

    use SoftDeletes;
    use HasRoles;

    protected $guard_name = 'admin';

    protected $table = 'users';
    
    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];


    public $fillable = [
        'name',
        'email',
        'password',
        'user_role_code',
        'country_id',
        'state_id',
        'city_id',
        'profile_pic',
        'user_status_id',
        'uuid',
        'first_login',
        'permissions'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'user_role_code' => 'string',
        'country_id' => 'integer',
        'state_id' => 'integer',
        'city_id' => 'integer',
        'user_status_id' => 'integer',
        'uuid' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function city()
    {

        return $this->belongsTo(\App\Models\City::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function country()
    {
        return $this->belongsTo(\App\Models\Country::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function state()
    {
        return $this->belongsTo(\App\Models\State::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function userStatus()
    {
        return $this->belongsTo(\App\Models\UserStatus::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function companyUser()
    {
        return $this->hasOne(\App\Models\CompanyUser::class, 'user_id', 'id');
    }

    /**
     * A user has many groups - one to many relation
     */
    public function groups()
    {
        return $this->hasMany('App\Models\Group','user_id', 'id');
    }

}
