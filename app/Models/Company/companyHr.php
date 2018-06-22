<?php

namespace App\Models\Company;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class companyHr
 * @package App\Models\Company
 * @version June 11, 2018, 7:45 am UTC
 *
 * @property \App\Models\Company\City city
 * @property \App\Models\Company\Country country
 * @property \App\Models\Company\State state
 * @property \App\Models\Company\HrCivilStatus hrCivilStatus
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
 * @property \Illuminate\Database\Eloquent\Collection roomLayouts
 * @property string first_name
 * @property string last_name
 * @property string address_1
 * @property string address_2
 * @property string post_code
 * @property integer city_id
 * @property integer state_id
 * @property integer country_id
 * @property string telephone_job
 * @property string telephone_private
 * @property string email_job
 * @property string email_private
 * @property integer civil_status_id
 */
class companyHr extends Model
{
    use SoftDeletes;

    public $table = 'company_hr';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'first_name',
        'last_name',
        'address_1',
        'address_2',
        'post_code',
        'city_id',
        'state_id',
        'country_id',
        'telephone_job',
        'telephone_private',
        'email_job',
        'email_private',
        'civil_status_id',
        'employment_date',
        'termination_time',
        'employeed_untill',
        'personal_category',
        'collective_type',
        'employment_form',
        'insurance_date',
        'insurance_fees',
        'department',
        'designation',
        'vacancies',
        'salary_type',
        'salary',
        'employment_percent',
        'cost_division',
        'project',
        'vat_table',
        'vacation_days',
        'vacation_category',
        'father',
        'mother',
        'languages',
        'skills',
        'driving_license',
        'organization_name',
        'job_title',
        'hr_courses',
        'hr_notes',
        'manager_notes',
        'salary_development_notes',
        'courses'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'first_name' => 'string',
        'last_name' => 'string',
        'address_1' => 'string',
        'address_2' => 'string',
        'post_code' => 'string',
        'city_id' => 'integer',
        'state_id' => 'integer',
        'country_id' => 'integer',
        'telephone_job' => 'string',
        'telephone_private' => 'string',
        'email_job' => 'string',
        'email_private' => 'string',
        'civil_status_id' => 'integer',
        'employment_date' => 'date',
        'termination_time' => 'integer',
        'employeed_untill' => 'date',
        'personal_category' => 'integer',
        'collective_type' => 'integer',
        'employment_form' => 'integer',
        'insurance_date' => 'date',
        'insurance_fees' => 'integer',
        'department' => 'integer',
        'designation' => 'integer',
        'vacancies' => 'integer',
        'salary_type' => 'integer',
        'salary' => 'integer',
        'employment_percent' => 'integer',
        'cost_division' => 'integer',
        'project' => 'integer',
        'vat_table' => 'integer',
        'vacation_days' => 'integer',
        'vacation_category' => 'integer',
        'father_and_mother' => 'string',
        'languages' => 'string',
        'skills' => 'string',
        'driving_license' => 'string',
        'organization_name' => 'string',
        'job_title' => 'string',
        'hr_courses' => 'string',
        'hr_notes' => 'string',
        'manager_notes' => 'string',
        'salary_development_notes' => 'string',
        'courses' => 'string',
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
    public function city()
    {
        return $this->belongsTo(\App\Models\Company\City::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function country()
    {
        return $this->belongsTo(\App\Models\Country::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function state()
    {
        return $this->belongsTo(\App\Models\Company\State::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function hrCivilStatus()
    {
        return $this->belongsTo(\App\Models\Company\HrCivilStatus::class);
    }
}
