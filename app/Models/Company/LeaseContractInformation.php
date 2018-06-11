<?php

namespace App\Models\Company;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LeaseContractInformation
 * @package App\Models\Company
 * @version June 11, 2018, 10:00 am UTC
 *
 * @property \App\Models\Company\LeasePartner leasePartner
 * @property \App\Models\Company\CompanyBuilding companyBuilding
 * @property \App\Models\Company\LeaseAttachment leaseAttachment
 * @property \App\Models\Company\Currency currency
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
 * @property date contract_start_date
 * @property integer contract_length
 * @property integer termination_time
 * @property boolean contract_auto_renewal
 * @property string contract_renewal
 * @property integer renewal_number_month
 * @property string contract_type
 * @property string contract_number
 * @property string contract_name
 * @property string contract_desc
 * @property decimal amount_per_month
 * @property decimal income_per_month
 * @property integer currency_id
 * @property string cost_reference
 * @property string income_reference
 * @property string other_reference
 * @property integer lease_attachment_id
 * @property integer building_id
 * @property integer cost_number
 * @property integer lease_partner_id
 */
class LeaseContractInformation extends Model
{
    use SoftDeletes;

    public $table = 'lease_contract_information';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'contract_start_date',
        'contract_length',
        'termination_time',
        'contract_auto_renewal',
        'contract_renewal',
        'renewal_number_month',
        'contract_type',
        'contract_number',
        'contract_name',
        'contract_desc',
        'amount_per_month',
        'income_per_month',
        'currency_id',
        'cost_reference',
        'income_reference',
        'other_reference',
        'lease_attachment_id',
        'building_id',
        'cost_number',
        'lease_partner_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'contract_start_date' => 'date',
        'contract_length' => 'integer',
        'termination_time' => 'integer',
        'contract_auto_renewal' => 'boolean',
        'contract_renewal' => 'string',
        'renewal_number_month' => 'integer',
        'contract_type' => 'string',
        'contract_number' => 'string',
        'contract_name' => 'string',
        'contract_desc' => 'string',
        'currency_id' => 'integer',
        'cost_reference' => 'string',
        'income_reference' => 'string',
        'other_reference' => 'string',
        'lease_attachment_id' => 'integer',
        'building_id' => 'integer',
        'cost_number' => 'integer',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function companyBuilding()
    {
        return $this->belongsTo(\App\Models\Company\CompanyBuilding::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function leaseAttachment()
    {
        return $this->belongsTo(\App\Models\Company\LeaseAttachment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function currency()
    {
        return $this->belongsTo(\App\Models\Company\Currency::class);
    }
}
