<?php

namespace App\Repositories;

use App\Models\ConferenceBooking;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ConferenceBookingRepository
 * @package App\Repositories
 * @version April 23, 2018, 8:07 am UTC
 *
 * @method ConferenceBooking findWithoutFail($id, $columns = ['*'])
 * @method ConferenceBooking find($id, $columns = ['*'])
 * @method ConferenceBooking first($columns = ['*'])
*/
class ConferenceBookingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'company_customer_id',
        'booking_date',
        'start_datetime',
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
        'package_price',
        'tax',
        'total_price',
        'deposit',
        'remarks'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ConferenceBooking::class;
    }
}
