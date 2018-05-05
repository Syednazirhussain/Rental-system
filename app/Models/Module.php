<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Module
 * @package App\Models\Admin
 * @version April 4, 2018, 1:41 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection companyContracts
 * @property \Illuminate\Database\Eloquent\Collection CompanyModule
 * @property \Illuminate\Database\Eloquent\Collection companyUsers
 * @property string name
 * @property decimal price
 */
class Module extends Model
{
    use SoftDeletes;

    public $table = 'modules';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'price'
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
    public function companyModules()
    {
        return $this->hasMany(\App\Models\CompanyModule::class);
    }
}
