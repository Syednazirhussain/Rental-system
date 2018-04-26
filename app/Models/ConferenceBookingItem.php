<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class ConferenceBookingItem
 * @package App\Models
 * @version April 23, 2018, 8:19 am UTC
 *
 * @property \App\Models\ConferenceBooking conferenceBooking
 * @property \Illuminate\Database\Eloquent\Collection companyContracts
 * @property \Illuminate\Database\Eloquent\Collection companyFloorRooms
 * @property \Illuminate\Database\Eloquent\Collection companyInvoiceItems
 * @property \Illuminate\Database\Eloquent\Collection companyInvoices
 * @property \Illuminate\Database\Eloquent\Collection companyModules
 * @property \Illuminate\Database\Eloquent\Collection companyUsers
 * @property integer booking_id
 * @property string entity_type
 * @property string entity_name
 * @property decimal entity_price
 * @property integer entity_qty
 */
class ConferenceBookingItem extends Model
{


    public $table = 'conference_booking_items';
    
    public $timestamps = false;

    public $fillable = [
        'booking_id',
        'entity_id',
        'entity_type',
        'entity_name',
        'entity_price',
        'entity_qty'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'booking_id' => 'integer',
        'entity_id' => 'integer',
        'entity_type' => 'string',
        'entity_name' => 'string',
        'entity_qty' => 'integer'
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
    public function conferenceBooking()
    {
        return $this->belongsTo(\App\Models\ConferenceBooking::class);
    }
}
