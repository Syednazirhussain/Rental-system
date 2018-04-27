<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class UserStatus
 * @package App\Models\Admin
 * @version April 4, 2018, 12:59 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection Company
 * @property \Illuminate\Database\Eloquent\Collection companyContracts
 * @property \Illuminate\Database\Eloquent\Collection companyModules
 * @property \Illuminate\Database\Eloquent\Collection companyUsers
 * @property \Illuminate\Database\Eloquent\Collection User
 * @property string name
 */
class UserStatus extends Model
{

    public $table = 'user_status';

    public $timestamps = false;
    
    

    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function companies()
    {
        return $this->hasMany(\App\Models\Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->hasMany(\App\Models\User::class);
    }
}
