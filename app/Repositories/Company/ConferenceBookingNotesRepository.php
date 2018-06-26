<?php

namespace App\Repositories\Company;

use App\Models\Company\ConferenceBookingNotes;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ConferenceBookingNotesRepository
 * @package App\Repositories\Company
 * @version June 26, 2018, 9:18 am UTC
 *
 * @method ConferenceBookingNotes findWithoutFail($id, $columns = ['*'])
 * @method ConferenceBookingNotes find($id, $columns = ['*'])
 * @method ConferenceBookingNotes first($columns = ['*'])
*/
class ConferenceBookingNotesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'conference_booking_id',
        'user_id',
        'code',
        'note'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ConferenceBookingNotes::class;
    }
}
