<?php

namespace App\Models\Company;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LeasePartner
 * @package App\Models\Company
 * @version June 11, 2018, 9:57 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection companyContracts
 * @property \Illuminate\Database\Eloquent\Collection companyCustomer
 * @property \Illuminate\Database\Eloquent\Collection companyFloorRooms
 * @property \Illuminate\Database\Eloquent\Collection companyInvoiceItems
 * @property \Illuminate\Database\Eloquent\Collection companyInvoices
 * @property \Illuminate\Database\Eloquent\Collection companyModules
 * @property \Illuminate\Database\Eloquent\Collection companyServices
 * @property \Illuminate\Database\Eloquent\Collection companyUsers
 * @property \Illuminate\Database\Eloquent\Collection customers
 * @property \Illuminate\Database\Eloquent\Collection groups
 * @property \Illuminate\Database\Eloquent\Collection LeaseContractInformation
 * @property \Illuminate\Database\Eloquent\Collection LeaseCounterpart
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection roomLayouts
 * @property string parent_company
 * @property string sister_company
 * @property string sales_person
 * @property integer delegated
 */
class LeasePartner extends Model
{
    // use SoftDeletes;

    public $table = 'lease_partner';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    // protected $dates = ['deleted_at'];


    public $fillable = [
        'parent_company',
        'sister_company',
        'sales_person',
        'delegated'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'parent_company' => 'string',
        'sister_company' => 'string',
        'sales_person' => 'string',
        'delegated' => 'integer'
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
    public function leaseContractInformations()
    {
        return $this->hasMany(\App\Models\Company\LeaseContractInformation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function leaseCounterparts()
    {
        return $this->hasMany(\App\Models\Company\LeaseCounterpart::class);
    }
}
