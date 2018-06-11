<?php

namespace App\Models\Company;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class hrCompanyEmployment
 * @package App\Models\Company
 * @version June 11, 2018, 11:57 am UTC
 *
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
 * @property string|\Carbon\Carbon employment_date
 * @property integer termination_time
 * @property string|\Carbon\Carbon employeed_untill
 * @property integer personal_category
 * @property integer collective_type
 * @property integer employment_form
 * @property string|\Carbon\Carbon insurance_date
 * @property integer insurance_fees
 * @property integer department
 * @property integer designation
 * @property integer vacancies
 */
class hrCompanyEmployment extends Model
{
    use SoftDeletes;

    public $table = 'hr_company_employment';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
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
        'vacancies'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'termination_time' => 'integer',
        'personal_category' => 'integer',
        'collective_type' => 'integer',
        'employment_form' => 'integer',
        'insurance_fees' => 'integer',
        'department' => 'integer',
        'designation' => 'integer',
        'vacancies' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
