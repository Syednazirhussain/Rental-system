<?php

namespace App\Models\Company;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RoomImages
 * @package App\Models\Company
 * @version May 31, 2018, 12:05 pm UTC
 *
 * @property \App\Models\Company\Room room
 * @property \App\Models\Company\RoomSittingArrangement roomSittingArrangement
 * @property \Illuminate\Database\Eloquent\Collection companyContracts
 * @property \Illuminate\Database\Eloquent\Collection companyCustomer
 * @property \Illuminate\Database\Eloquent\Collection companyFloorRooms
 * @property \Illuminate\Database\Eloquent\Collection companyInvoiceItems
 * @property \Illuminate\Database\Eloquent\Collection companyInvoices
 * @property \Illuminate\Database\Eloquent\Collection companyModules
 * @property \Illuminate\Database\Eloquent\Collection companyServices
 * @property \Illuminate\Database\Eloquent\Collection companyUsers
 * @property \Illuminate\Database\Eloquent\Collection customers
 * @property \Illuminate\Database\Eloquent\Collection groups
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection roomEquipments
 * @property \Illuminate\Database\Eloquent\Collection roomLayouts
 * @property \Illuminate\Database\Eloquent\Collection roomNotes
 * @property integer room_id
 * @property integer sitting_id
 * @property string entity_type
 * @property string image_file
 */
class RoomImages extends Model
{
    use SoftDeletes;

    public $table = 'room_images';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'building_id',
        'room_id',
        'sitting_id',
        'entity_type',
        'image_file'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'building_id' => 'integer',
        'room_id' => 'integer',
        'sitting_id' => 'integer',
        'entity_type' => 'string',
        'image_file' => 'string'
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
    public function room()
    {
        return $this->belongsTo(\App\Models\Room::class,'room_id','id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function companyBuilding()
    {
        return $this->belongsTo(\App\Models\CompanyBuilding::class,'building_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function roomSittingArrangement()
    {
        return $this->belongsTo(\App\Models\Company\RoomSittingArrangment::class,'sitting_id','id');
    }
}
