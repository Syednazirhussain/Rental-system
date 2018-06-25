<?php

namespace App\Repositories;

use App\Models\ConferenceBookingDraft;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ConferenceBookingDraftRepository
 * @package App\Repositories
 * @version June 25, 2018, 2:50 pm UTC
 *
 * @method ConferenceBookingDraft findWithoutFail($id, $columns = ['*'])
 * @method ConferenceBookingDraft find($id, $columns = ['*'])
 * @method ConferenceBookingDraft first($columns = ['*'])
*/
class ConferenceBookingDraftRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'booking_id',
        'booking_type',
        'cancellation_policy',
        'booking_category',
        'booking_color',
        'signage',
        'customer_in_place',
        'contact_person_in_place',
        'event_name',
        'telephone_number',
        'email_address',
        'project_leader',
        'other_personal',
        'sales_person',
        'project_time',
        'project_cost',
        'clearing_time',
        'clearing_cost',
        'writers_time',
        'writers_cost',
        'furnishing_time',
        'furnishing_cost',
        'first_person_time',
        'first_person_text',
        'guest_arrival_time',
        'guest_arrival_text',
        'morning_coffee_time',
        'morning_coffee_text',
        'meeting_start_time',
        'meeting_start_text',
        'lunch_time',
        'lunch_text',
        'afternoon_coffee_time',
        'afternoon_coffee_text',
        'meeting_end_time',
        'meeting_end_text',
        'dinner_time',
        'dinner_text',
        'party_time',
        'party_text'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ConferenceBookingDraft::class;
    }
}
