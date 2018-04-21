<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CompanyModule
 * @package App\Models
 * @version April 12, 2018, 8:12 am UTC
 *
 * @property \App\Models\Company company
 * @property \App\Models\Module module
 * @property \Illuminate\Database\Eloquent\Collection companyContracts
 * @property \Illuminate\Database\Eloquent\Collection companyUsers
 * @property integer company_id
 * @property integer module_id
 * @property decimal price
 * @property integer users_limit
 */
class CompanyModule extends Model
{
    use SoftDeletes;

    public $table = 'company_modules';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'company_id',
        'module_id',
        'price',
        'users_limit'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_id' => 'integer',
        'module_id' => 'integer',
        'users_limit' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'module' => 'array'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function module()
    {
        return $this->belongsTo(\App\Models\Module::class);
    }
}
