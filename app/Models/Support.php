<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Support
 * @package App\Models\Admin
 * @version May 10, 2018, 1:34 pm UTC
 *
 * @property \App\Models\SupportCategory supportCategory
 * @property \App\Models\SupportPriority supportPriority
 * @property \App\Models\SupportStatus supportStatus
 * @property \App\Models\User user
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
 */
class Support extends Model
{
    use SoftDeletes;

    public $table = 'support';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'parent_id',
        'subject',
        'content',
        'status_id',
        'priority_id',
        'user_id',
        'category_id',
        'company_id',
        'company_name',
        'last_comment',
        'agent'
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
        'category_id' => 'integer',
        'agent' => 'integer'
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
    public function supportCategory()
    {
        return $this->belongsTo(\App\Models\SupportCategory::class,'category_id','id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function supportPriority()
    {
        return $this->belongsTo(\App\Models\SupportPriorities::class,'priority_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function supportStatus()
    {
        return $this->belongsTo(\App\Models\SupportStatus::class,'status_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class,'user_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function userAgent()
    {
        return $this->belongsTo(\App\Models\User::class,'agent','id');
    }
}
