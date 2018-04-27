<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class DiscountType
 * @package App\Models
 * @version April 11, 2018, 3:24 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection companyContracts
 * @property \Illuminate\Database\Eloquent\Collection companyModules
 * @property \Illuminate\Database\Eloquent\Collection companyUsers
 * @property string name
 */
class DiscountType extends Model
{

    public $table = 'discount_type';



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


    public function companyContract()
    {
        return $this->hasMany(\App\Models\CompanyContract::class);
    }
    


}
