<?php

namespace App\Models\Company;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CompanyHrOtherInfo
 * @package App\Models\Company
 * @version June 19, 2018, 1:50 pm UTC
 *
 * @property \App\Models\Company\CompanyHr companyHr
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
 * @property integer company_hr_id
 * @property string languages
 * @property boolean driving_license
 * @property string skills
 */
class CompanyHrOtherInfo extends Model
{
    use SoftDeletes;

    public $table = 'company_hr_other_info';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'company_hr_id',
        'languages',
        'driving_license',
        'skills'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_hr_id' => 'integer',
        'languages' => 'string',
        'driving_license' => 'boolean',
        'skills' => 'string'
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
    public function companyHr()
    {
        return $this->belongsTo(\App\Models\Company\CompanyHr::class);
    }
}
