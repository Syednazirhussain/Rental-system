<?php

namespace App\Models;

use Eloquent as Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Permission
 * @package App\Models\Admin
 * @version May 7, 2018, 6:51 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection companyContracts
 * @property \Illuminate\Database\Eloquent\Collection companyFloorRooms
 * @property \Illuminate\Database\Eloquent\Collection companyInvoiceItems
 * @property \Illuminate\Database\Eloquent\Collection companyInvoices
 * @property \Illuminate\Database\Eloquent\Collection companyModules
 * @property \Illuminate\Database\Eloquent\Collection companyUsers
 * @property \Illuminate\Database\Eloquent\Collection customers
 * @property \Illuminate\Database\Eloquent\Collection groups
 * @property \App\Models\Admin\ModelHasPermission modelHasPermission
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection roomLayouts
 * @property string name
 * @property string guard_name
 */
class Permission extends Model
{
    // use SoftDeletes;

    public $table = 'permissions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    // protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        // 'guard_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        // 'guard_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function modelHasPermission()
    {
        return $this->hasOne(\App\Models\Admin\ModelHasPermission::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function roles()
    {
        return $this->belongsToMany(\App\Models\Admin\Role::class, 'role_has_permissions');
    }
}
