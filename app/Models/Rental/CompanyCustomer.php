<?php

namespace App\Models\Rental;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyCustomer extends Model
{
    use SoftDeletes;
    public $table = 'company_customers';


    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public $fillable = [
        'company_id',
        'org_no',
        'name',
        'printer_code',
        'address_1',
        'address_2',
        'zipcode',
        'city',
        'country',
        'building',
        'floor',
        'room',
        'category',
        'email',
        'attachment',
        'tel_number',
        'qty_meeting_room',
        'mobile',
        'block_customer',
        'language',
        'bocked_by',
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'org_no',
        'name',
        'printer_code',
        'address_1',
        'address_2',
        'zipcode',
        'city',
        'country',
        'building',
        'floor',
        'room',
        'category',
        'email',
        'attachment',
        'tel_number',
        'qty_meeting_room',
        'mobile',
        'block_customer',
        'language',
        'bocked_by',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
}
