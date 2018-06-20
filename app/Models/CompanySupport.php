<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class CompanySupport
 * @package App\Models\Company
 * @version May 19, 2018, 5:50 am UTC
 *
 * @property \App\Models\Company\SupportCategory supportCategory
 * @property \App\Models\Company\SupportPriority supportPriority
 * @property \App\Models\Company\SupportStatus supportStatus
 * @property \App\Models\Company\User user
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
 * @property integer parent_id
 * @property string subject
 * @property string content
 * @property string html
 * @property integer status_id
 * @property integer priority_id
 * @property integer user_id
 * @property integer category_id
 * @property integer company_id
 */
class CompanySupport extends Model
{

    public $table = 'company_support';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'parent_id',
        'subject',
        'content',
        'html',
        'status_id',
        'priority_id',
        'user_id',
        'agent',
        'category_id',
        'company_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'parent_id' => 'integer',
        'subject' => 'string',
        'content' => 'string',
        'html' => 'string',
        'status_id' => 'integer',
        'priority_id' => 'integer',
        'user_id' => 'integer',
        'agent' => 'integer',
        'category_id' => 'integer',
        'company_id' => 'integer'
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
    public function companySupportCategory()
    {
        return $this->belongsTo(\App\Models\CompanySupportCategory::class,'category_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function companySupportPriority()
    {
        return $this->belongsTo(\App\Models\CompanySupportPriorities::class,'priority_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function companySupportStatus()
    {
        return $this->belongsTo(\App\Models\CompanySupportStatus::class,'status_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function companyAgent()
    {
        return $this->belongsTo(\App\Models\User::class,'agent','id');
    }
}
