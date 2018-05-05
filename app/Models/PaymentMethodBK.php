<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class PaymentMethods
 * @package App\Models
 * @version April 11, 2018, 3:24 pm UTC
 *
 * @property string name
 */
class PaymentMethod extends Model
{

    public $table = 'payment_methods';



    public $fillable = [
        'name',
        'code',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'code' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:100',
        'code' => 'required|string|max:50',
    ];

    
}
