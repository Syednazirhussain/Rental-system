<?php

namespace App\Models;

use Eloquent as Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CompanyCustomer
 * @package App\Models
 * @version May 21, 2018, 9:31 am UTC
 *
 * @property \App\Models\User user
 * @property \App\Models\Company company
 * @property \Illuminate\Database\Eloquent\Collection companyContracts
 * @property \Illuminate\Database\Eloquent\Collection companyFloorRooms
 * @property \Illuminate\Database\Eloquent\Collection companyInvoiceItems
 * @property \Illuminate\Database\Eloquent\Collection companyInvoices
 * @property \Illuminate\Database\Eloquent\Collection companyModules
 * @property \Illuminate\Database\Eloquent\Collection companyUsers
 * @property \Illuminate\Database\Eloquent\Collection customers
 * @property \Illuminate\Database\Eloquent\Collection groups
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection roomLayouts
 * @property integer company_id
 * @property integer user_id
 */
class CompanyCustomer extends Model
{
    // use SoftDeletes;

    public $table = 'company_customer';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    // protected $dates = ['deleted_at'];


    public $fillable = [
        'company_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_id' => 'integer',
        'user_id' => 'integer'
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
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class,'company_id','id');
    }
}
