<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ConferenceBookingDraft
 * @package App\Models
 * @version June 25, 2018, 2:50 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection articleFinancials
 * @property \Illuminate\Database\Eloquent\Collection articlePrices
 * @property \Illuminate\Database\Eloquent\Collection articleStocks
 * @property \Illuminate\Database\Eloquent\Collection companyContracts
 * @property \Illuminate\Database\Eloquent\Collection companyCustomer
 * @property \Illuminate\Database\Eloquent\Collection companyFloorRooms
 * @property \Illuminate\Database\Eloquent\Collection companyHrNotes
 * @property \Illuminate\Database\Eloquent\Collection companyInvoiceItems
 * @property \Illuminate\Database\Eloquent\Collection companyInvoices
 * @property \Illuminate\Database\Eloquent\Collection companyModules
 * @property \Illuminate\Database\Eloquent\Collection companyServices
 * @property \Illuminate\Database\Eloquent\Collection companyUsers
 * @property \Illuminate\Database\Eloquent\Collection customerContactPeople
 * @property \Illuminate\Database\Eloquent\Collection customerInvoices
 * @property \Illuminate\Database\Eloquent\Collection customers
 * @property \Illuminate\Database\Eloquent\Collection groups
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection roomLayouts
 * @property \Illuminate\Database\Eloquent\Collection signages
 * @property \Illuminate\Database\Eloquent\Collection surveyQuestions
 * @property integer booking_id
 * @property string booking_type
 * @property string cancellation_policy
 * @property string booking_category
 * @property string booking_color
 * @property string signage
 * @property string customer_in_place
 * @property string contact_person_in_place
 * @property string event_name
 * @property string telephone_number
 * @property string email_address
 * @property string project_leader
 * @property string other_personal
 * @property string sales_person
 * @property string|\Carbon\Carbon project_time
 * @property string project_cost
 * @property string|\Carbon\Carbon clearing_time
 * @property string clearing_cost
 * @property string|\Carbon\Carbon writers_time
 * @property string writers_cost
 * @property string|\Carbon\Carbon furnishing_time
 * @property string furnishing_cost
 * @property string|\Carbon\Carbon first_person_time
 * @property string first_person_text
 * @property string|\Carbon\Carbon guest_arrival_time
 * @property string guest_arrival_text
 * @property string|\Carbon\Carbon morning_coffee_time
 * @property string morning_coffee_text
 * @property string|\Carbon\Carbon meeting_start_time
 * @property string meeting_start_text
 * @property string|\Carbon\Carbon lunch_time
 * @property string lunch_text
 * @property string|\Carbon\Carbon afternoon_coffee_time
 * @property string afternoon_coffee_text
 * @property string|\Carbon\Carbon meeting_end_time
 * @property string meeting_end_text
 * @property string|\Carbon\Carbon dinner_time
 * @property string dinner_text
 * @property string|\Carbon\Carbon party_time
 * @property string party_text
 */
class ConferenceBookingDraft extends Model
{
    use SoftDeletes;

    public $table = 'conference_booking_draft';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'booking_id' => 'integer',
        'booking_type' => 'string',
        'cancellation_policy' => 'string',
        'booking_category' => 'string',
        'booking_color' => 'string',
        'signage' => 'string',
        'customer_in_place' => 'string',
        'contact_person_in_place' => 'string',
        'event_name' => 'string',
        'telephone_number' => 'string',
        'email_address' => 'string',
        'project_leader' => 'string',
        'other_personal' => 'string',
        'sales_person' => 'string',
        'project_cost' => 'string',
        'clearing_cost' => 'string',
        'writers_cost' => 'string',
        'furnishing_cost' => 'string',
        'first_person_text' => 'string',
        'guest_arrival_text' => 'string',
        'morning_coffee_text' => 'string',
        'meeting_start_text' => 'string',
        'lunch_text' => 'string',
        'afternoon_coffee_text' => 'string',
        'meeting_end_text' => 'string',
        'dinner_text' => 'string',
        'party_text' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
