<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CompanyFloorRoom
 * @package App\Models\Admin
 * @version April 4, 2018, 1:35 pm UTC
 *
 * @property \App\Models\CompanyBuilding companyBuilding
 * @property \Illuminate\Database\Eloquent\Collection companyContracts
 * @property \Illuminate\Database\Eloquent\Collection companyModules
 * @property \Illuminate\Database\Eloquent\Collection companyUsers
 * @property integer building_id
 * @property integer floor
 * @property integer num_rooms
 */
class CompanyFloorRoom extends Model
{
    use SoftDeletes;

    public $table = 'company_floor_rooms';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'building_id',
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
        'floor' => 'integer',
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
    public function companyBuilding()
    {
        return $this->belongsTo(\App\Models\CompanyBuilding::class);
    }
}
