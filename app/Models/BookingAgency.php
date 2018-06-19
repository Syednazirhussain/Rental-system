<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BookingAgency
 * @package App\Models\Company
 * @version May 15, 2018, 2:37 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection companyContracts
 * @property \Illuminate\Database\Eloquent\Collection companyFloorRooms
 * @property \Illuminate\Database\Eloquent\Collection companyInvoiceItems
 * @property \Illuminate\Database\Eloquent\Collection companyInvoices
 * @property \Illuminate\Database\Eloquent\Collection companyModules
 * @property \Illuminate\Database\Eloquent\Collection companyUsers
 * @property \Illuminate\Database\Eloquent\Collection customers
 * @property \Illuminate\Database\Eloquent\Collection groups
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection roomLayouts
 * @property integer company_id
 * @property string name
 * @property string contact_person
 * @property string phone
 * @property string email
 * @property string mobile
 * @property string fax
 * @property string kick_back_fnb
 * @property string kick_back_room
 * @property string buildings
 */
class BookingAgency extends Model
{
    use SoftDeletes;

    public $table = 'booking_agency';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'company_id',
        'name',
        'contact_person',
        'phone',
        'email',
        'mobile',
        'fax',
        'kick_back_fnb',
        'kick_back_room',
        'buildings'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_id' => 'integer',
        'name' => 'string',
        'contact_person' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'mobile' => 'string',
        'fax' => 'string',
        'kick_back_fnb' => 'string',
        'kick_back_room' => 'string',
        'buildings' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
    
}
