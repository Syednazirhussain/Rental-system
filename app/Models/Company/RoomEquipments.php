<?php

namespace App\Models\Company;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RoomEquipments
 * @package App\Models\Company
 * @version May 31, 2018, 12:05 pm UTC
 *
 * @property \App\Models\Company\Room room
 * @property \App\Models\Company\ConferenceEquipment conferenceEquipment
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
 * @property \Illuminate\Database\Eloquent\Collection roomImages
 * @property \Illuminate\Database\Eloquent\Collection roomLayouts
 * @property \Illuminate\Database\Eloquent\Collection roomNotes
 * @property integer room_id
 * @property string room_type
 * @property integer equipment_id
 * @property integer qty
 * @property decimal price
 * @property string info
 */
class RoomEquipments extends Model
{
    use SoftDeletes;

    public $table = 'room_equipments';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'building_id',
        'room_id',
        'room_type',
        'equipment_id',
        'qty',
        'price',
        'info'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'room_id' => 'integer',
        'room_type' => 'string',
        'equipment_id' => 'integer',
        'qty' => 'integer',
        'info' => 'string'
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
    public function conferenceEquipment()
    {
        return $this->belongsTo(\App\Models\Equipments::class,'equipment_id','id');
    }
}
