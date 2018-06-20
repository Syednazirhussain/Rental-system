<?php

namespace App\Models\Company;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LeaseCounterpart
 * @package App\Models\Company
 * @version June 11, 2018, 9:58 am UTC
 *
 * @property \App\Models\Company\LeasePartner leasePartner
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
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection roomLayouts
 * @property integer organization_number
 * @property string company_name
 * @property string contract_person
 * @property string tel
 * @property string email
 * @property integer lease_partner_id
 */
class LeaseCounterpart extends Model
{
    use SoftDeletes;

    public $table = 'lease_counterpart';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'organization_number',
        'company_name',
        'contract_person',
        'tel',
        'email',
        'lease_partner_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'organization_number' => 'integer',
        'company_name' => 'string',
        'contract_person' => 'string',
        'tel' => 'string',
        'email' => 'string',
        'lease_partner_id' => 'integer'
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
    public function leasePartner()
    {
        return $this->belongsTo(\App\Models\Company\LeasePartner::class);
    }
}
