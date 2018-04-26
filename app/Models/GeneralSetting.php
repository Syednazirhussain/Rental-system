<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;


/**
 * Class GeneralSetting
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
class GeneralSetting extends Model
{


    public $table = 'general_settings';

    public $timestamps = false;
 

    public $fillable = [
        'meta_key',
        'meta_value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'id' => 'integer',
    //     'company_id' => 'integer',
    //     'invoice_id' => 'integer'
    // ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];


}
