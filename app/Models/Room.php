<?php

namespace App\Models;

use Eloquent as Model;
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
class Room extends Model
{
    use SoftDeletes;

    public $table = 'rooms';

    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];


    public $fillable = [
        'name',
        'price',
        'floor_id',
        'area',
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
        'area' => 'integer',
        'floor_id' => 'integer'
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
    public function floor()
    {
        return $this->belongsTo(\App\Models\CompanyFloorRoom::class);
    }
}
