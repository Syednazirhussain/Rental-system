<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CompanyContactPerson
 * @package App\Models
 * @version April 8, 2018, 9:16 am UTC
 *
 * @property \App\Models\Company company
 * @property \Illuminate\Database\Eloquent\Collection companyContracts
 * @property \Illuminate\Database\Eloquent\Collection companyModules
 * @property \Illuminate\Database\Eloquent\Collection companyUsers
 * @property integer company_id
 * @property string department
 * @property string designation
 * @property string name
 * @property string email
 * @property string phone
 * @property string fax
 * @property string address
 */
class CompanyContactPerson extends Model
{
    use SoftDeletes;

    public $table = 'company_contact_persons';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'company_id',
        'department',
        'designation',
        'name',
        'email',
        'phone',
        'fax',
        'address',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_id' => 'integer',
        'department' => 'string',
        'designation' => 'string',
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'fax' => 'string',
        'address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'person' => 'array|nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class);
    }
}
