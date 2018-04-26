<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ConferenceBooking
 * @package App\Models
 * @version April 23, 2018, 8:07 am UTC
 *
 * @property \App\Models\ConferenceRoomLayout conferenceRoomLayout
 * @property \Illuminate\Database\Eloquent\Collection companyContracts
 * @property \Illuminate\Database\Eloquent\Collection companyFloorRooms
 * @property \Illuminate\Database\Eloquent\Collection companyInvoiceItems
 * @property \Illuminate\Database\Eloquent\Collection companyInvoices
 * @property \Illuminate\Database\Eloquent\Collection companyModules
 * @property \Illuminate\Database\Eloquent\Collection companyUsers
 * @property \Illuminate\Database\Eloquent\Collection ConferenceBookingItem
 * @property date booking_date
 * @property string|\Carbon\Carbon start_dateime
 * @property string|\Carbon\Carbon end_datetime
 * @property integer attendees
 * @property integer room_id
 * @property integer room_layout_id
 * @property string duration_code
 * @property string booking_status
 * @property string payment_method_code
 * @property decimal room_price
 * @property decimal equipment_price
 * @property decimal food_price
 * @property decimal tax
 * @property decimal total_price
 * @property decimal deposit
 * @property string remarks
 */
class ConferenceBooking extends Model
{
    use SoftDeletes;

    public $table = 'conference_bookings';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'customer_id',
        'booking_date',
        'start_dateime',
        'end_datetime',
        'attendees',
        'room_id',
        'room_layout_id',
        'duration_code',
        'booking_status',
        'payment_method_code',
        'room_price',
        'equipment_price',
        'food_price',
        'tax',
        'total_price',
        'deposit',
        'remarks'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'customer_id' => 'integer',
        'booking_date' => 'date',
        'attendees' => 'integer',
        'room_id' => 'integer',
        'room_layout_id' => 'integer',
        'duration_code' => 'string',
        'booking_status' => 'string',
        'payment_method_code' => 'string',
        'remarks' => 'string'
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
    public function conferenceRoomLayout()
    {
        return $this->belongsTo(\App\Models\ConferenceRoomLayout::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function conferenceBookingItems()
    {
        return $this->hasMany(\App\Models\ConferenceBookingItem::class);
    }
}
