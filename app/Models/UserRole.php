<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
/**
 * Class UserRole
 * @package App\Models\Admin
 * @version April 4, 2018, 12:58 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection companyContracts
 * @property \Illuminate\Database\Eloquent\Collection companyModules
 * @property \Illuminate\Database\Eloquent\Collection companyUsers
 * @property string code
 * @property string name
 */
class UserRole extends Model
{

    public $table = 'user_roles';

    public $timestamps = false;


    public $fillable = [
        'code',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
