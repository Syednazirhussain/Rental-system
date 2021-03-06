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
        'services',
        'area',
        'company_id',
        'security_code',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
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
        'floor_id' => 'integer',
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
        return $this->belongsTo(\App\Models\CompanyFloorRoom::class,'floor_id','id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    **/
    public function service()
    {
        return $this->belongsTo(\App\Models\Service::class,'service_id','id');
    }
}
