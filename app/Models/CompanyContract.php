<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CompanyContract
 * @package App\Models
 * @version April 10, 2018, 5:25 pm UTC
 *
 * @property \App\Models\Company company
 * @property \Illuminate\Database\Eloquent\Collection companyModules
 * @property \Illuminate\Database\Eloquent\Collection companyUsers
 * @property integer company_id
 * @property string number
 * @property string content
 * @property date start_date
 * @property date end_date
 * @property date termindation_date
 * @property string payment_method
 * @property integer payment_cycle
 * @property decimal discount
 * @property string discount_type
 */
class CompanyContract extends Model
{
    use SoftDeletes;

    public $table = 'company_contracts';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'company_id',
        'number',
        'content',
        'start_date',
        'end_date',
        'termindation_date',
        'payment_method',
        'payment_cycle',
        'discount',
        'discount_type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_id' => 'integer',
        'number' => 'string',
        'content' => 'string',
        'start_date' => 'date',
        'end_date' => 'date',
        'termindation_date' => 'date',
        'payment_method' => 'string',
        'payment_cycle' => 'integer',
        'discount_type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'company_id' => 'required|integer',
        'number' => 'required|string',
        'content' => 'string|nullable',
        'start_date' => 'required',
        'end_date' => 'required',
        'payment_method' => 'required|string|max:30',
        'payment_cycle' => 'required',
        'discount_type' => 'integer|max:50|nullable',
        'discount' => 'numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class);
    }



    public function discountType()
    {
        return $this->belongsTo(\App\Models\DiscountType::class, 'discount_type', 'id');
    }

}
