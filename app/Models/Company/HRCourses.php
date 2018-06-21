<?php

namespace App\Models\Company;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class HRCourses
 * @package App\Models\Company
 * @version June 14, 2018, 9:02 am UTC
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
 * @property string name
 */
class HRCourses extends Model
{
    use SoftDeletes;

    public $table = 'hr_course';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name','company_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'company_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
