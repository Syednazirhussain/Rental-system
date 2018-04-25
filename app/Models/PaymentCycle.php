<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class PaymentCycle
 * @package App\Models
 * @version April 11, 2018, 3:24 pm UTC
 *
 * @property string name
 */
class PaymentCycle extends Model
{

    public $table = 'payment_cycles';



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
    **/
    public function paymentMethod()
    {
        return $this->hasMany(\App\Models\CompanyContract::class);
    }
}
