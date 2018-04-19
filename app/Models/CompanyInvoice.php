<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class CompanyInvoice
 * @package App\Model
 * @version April 16, 2018, 3:18 pm UTC
 *
 * @property \App\Model\Company company
 * @property \App\Model\PaymentCycle paymentCycle
 * @property \Illuminate\Database\Eloquent\Collection companyContracts
 * @property \Illuminate\Database\Eloquent\Collection CompanyInvoiceItem
 * @property \Illuminate\Database\Eloquent\Collection companyModules
 * @property \Illuminate\Database\Eloquent\Collection companyUsers
 * @property integer company_id
 * @property integer payment_cycle_id
 * @property decimal discount
 * @property decimal tax
 * @property decimal total
 */
class CompanyInvoice extends Model
{
    use SoftDeletes;

    public $table = 'company_invoices';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'company_id',
        'payment_cycle_id',
        'payment_cycle',
        'discount',
        'tax',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_id' => 'integer',
        'payment_cycle_id' => 'integer'
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
    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class,'company_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function paymentCycle()
    {
        return $this->belongsTo(\App\Models\PaymentCycle::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function companyInvoiceItems()
    {
        return $this->hasMany(\App\Models\CompanyInvoiceItem::class);
    }
}
