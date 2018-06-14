<?php

namespace App\Models\Rental;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerContactPerson extends Model
{
    use SoftDeletes;
    public $table = 'customer_contact_people';


    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public $fillable = [
        'company_id',
        'customer_id',
        'name',
        'position_title',
        'tel_number',
        'mobile',
        'email',
        'cost_no',
        'purchase_order',
        'order_status',
        'login_code',
        'busin_levage',
        'group',
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
        'name',
        'position_title',
        'tel_number',
        'mobile',
        'email',
        'cost_no',
        'purchase_order',
        'order_status',
        'login_code',
        'busin_levage',
        'group',
        'note',
    ];
}
