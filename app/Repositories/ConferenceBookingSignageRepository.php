<?php

namespace App\Repositories;

use App\Models\ConferenceBookingSignage;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ConferenceBookingSignageRepository
 * @package App\Repositories
 * @version June 26, 2018, 1:35 pm UTC
 *
 * @method ConferenceBookingSignage findWithoutFail($id, $columns = ['*'])
 * @method ConferenceBookingSignage find($id, $columns = ['*'])
 * @method ConferenceBookingSignage first($columns = ['*'])
*/
class ConferenceBookingSignageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'booking_id',
        'is_signage',
        'first_name',
        'first_screen_name',
        'first_logo',
        'second_name',
        'second_screen_name',
        'second_logo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ConferenceBookingSignage::class;
    }

    public function getBookingSignageData($id)
    {
        return ConferenceBookingSignage::where('booking_id', $id)->first();
    }


    
}
