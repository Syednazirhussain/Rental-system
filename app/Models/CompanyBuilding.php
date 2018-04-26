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
class CompanyBuilding extends Model
{
    use SoftDeletes;

    public $table = 'company_buildings';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'address',
        'zipcode',
        'num_floors',
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
        'address' => 'string',
        'zipcode' => 'string',
        'num_floors' => 'integer',
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
        return $this->belongsTo(\App\Models\Company::class, 'id', 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function companyFloorRooms()
    {
        return $this->hasMany(\App\Models\CompanyFloorRoom::class, 'building_id', 'id');
    }
}
