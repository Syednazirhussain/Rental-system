<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CompanyBuilding
 * @package App\Models
 * @version April 8, 2018, 1:53 pm UTC
 *
 * @property \App\Models\Company company
 * @property \Illuminate\Database\Eloquent\Collection companyContracts
 * @property \Illuminate\Database\Eloquent\Collection CompanyFloorRoom
 * @property \Illuminate\Database\Eloquent\Collection companyModules
 * @property \Illuminate\Database\Eloquent\Collection companyUsers
 * @property string name
 * @property string address
 * @property string zipcode
 * @property integer num_floors
 * @property integer company_id
 */
class Service extends Model
{
    use SoftDeletes;

    public $table = 'services';

    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];


    public $fillable = [
        'name',
        'price',
        'company_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'price' => 'integer',
        'company_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class);
    }
}
