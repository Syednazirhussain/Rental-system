<?php

namespace App\Models\Rental;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerInvoice extends Model
{
    use SoftDeletes;
    public $table = 'customer_invoices';


    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public $fillable = [
        'company_id',
        'customer_id',
        'company_name',
        'invoice_delivery',
        'address_1',
        'address_2',
        'zipcode',
        'city',
        'country',
        'email_invoicing',
        'payment_condition',
        'interest_invoice',
        'reminder',
        'inkasso',
        'cost_number',
        'sale_discount',
        'interest_rate',
        'reference_person',
        'free_text_1',
        'free_text_2',
        'free_text_3',
        'language',
        'note',
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'company_id',
        'customer_id',
        'company_name',
        'invoice_delivery',
        'address_1',
        'address_2',
        'zipcode',
        'city',
        'country',
        'email_invoicing',
        'payment_condition',
        'interest_invoice',
        'reminder',
        'inkasso',
        'cost_number',
        'sale_discount',
        'interest_rate',
        'reference_person',
        'free_text_1',
        'free_text_2',
        'free_text_3',
        'language',
        'note',
    ];
}
