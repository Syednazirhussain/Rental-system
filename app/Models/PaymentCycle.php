<?php

namespace App\Models;


use Eloquent as Model;




/**
 * Class PaymentCycle
 * @package App\Models\Admin
 * @version May 3, 2018, 9:18 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection companyContracts
 * @property \Illuminate\Database\Eloquent\Collection companyFloorRooms
 * @property \Illuminate\Database\Eloquent\Collection companyInvoiceItems
 * @property \Illuminate\Database\Eloquent\Collection CompanyInvoice
 * @property \Illuminate\Database\Eloquent\Collection companyModules
 * @property \Illuminate\Database\Eloquent\Collection companyUsers
 * @property \Illuminate\Database\Eloquent\Collection customers
 * @property \Illuminate\Database\Eloquent\Collection groups
 * @property \Illuminate\Database\Eloquent\Collection RoomContract
 * @property \Illuminate\Database\Eloquent\Collection roomLayouts
 * @property string name
 */
class PaymentCycle extends Model
{

    public $table = 'payment_cycles';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    // protected $dates = ['deleted_at'];


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

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function companyInvoices()
    {
        return $this->hasMany(\App\Models\Admin\CompanyInvoice::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function roomContracts()
    {
        return $this->hasMany(\App\Models\Admin\RoomContract::class);
    }
}
