<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model as Model;


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
class CompanyInvoiceItem extends Model
{


    public $table = 'company_invoice_items';

    public $timestamps = false;
    

    public $fillable = [
        'company_id',
        'invoice_id',
        'item_name',
        'item_price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_id' => 'integer',
        'invoice_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  **/
    // public function company()
    // {
    //     return $this->belongsTo(\App\Model\Company::class);
    // }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  **/
    // public function paymentCycle()
    // {
    //     return $this->belongsTo(\App\Model\PaymentCycle::class);
    // }


}
