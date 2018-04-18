<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class CompanyFloorRoom
 * @package App\Models
 * @version April 8, 2018, 3:43 pm UTC
 *
 * @property \App\Models\Company company
 * @property \Illuminate\Database\Eloquent\Collection companyContracts
 * @property \Illuminate\Database\Eloquent\Collection companyModules
 * @property \Illuminate\Database\Eloquent\Collection companyUsers
 * @property integer building_id
 * @property integer company_id
 * @property integer floor
 * @property integer num_rooms
 */
class CompanyFloorRoom extends Model
{
    public $table = 'company_floor_rooms';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'building_id',
        'company_id',
        'floor',
        'num_rooms'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'building_id' => 'integer',
        'company_id' => 'integer',
        'floor' => 'string',
        'num_rooms' => 'integer'
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


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function building()
    {
        return $this->belongsTo(\App\Models\CompanyBuilding::class, 'id', 'building_id');
    }
}
