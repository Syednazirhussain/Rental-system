<?php

namespace App\Models\Rental;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Signage extends Model
{
    use SoftDeletes;
    public $table = 'signages';


    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public $fillable = [
        'company_id',
        'customer_id',
        'first_name',
        'second_name',
        'third_name',
        'fourth_name',
        'screen_name_1',
        'screen_name_2',
        'screen_name_3',
        'screen_name_4',
        'logo_1',
        'logo_2',
        'logo_3',
        'logo_4',
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'company_id',
        'customer_id',
        'first_name',
        'second_name',
        'third_name',
        'fourth_name',
        'screen_name_1',
        'screen_name_2',
        'screen_name_3',
        'screen_name_4',
        'logo_1',
        'logo_2',
        'logo_3',
        'logo_4',
    ];
}
