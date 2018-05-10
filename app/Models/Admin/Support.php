<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Support
 * @package App\Models\Admin
 * @version May 10, 2018, 1:34 pm UTC
 *
 * @property \App\Models\Admin\SupportCategory supportCategory
 * @property \App\Models\Admin\SupportPriority supportPriority
 * @property \App\Models\Admin\SupportStatus supportStatus
 * @property \App\Models\Admin\User user
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
        'html',
        'status_id',
        'priority_id',
        'user_id',
        'category_id'
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
        'category_id' => 'integer'
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
        return $this->belongsTo(\App\Models\Admin\SupportCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function supportPriority()
    {
        return $this->belongsTo(\App\Models\Admin\SupportPriority::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function supportStatus()
    {
        return $this->belongsTo(\App\Models\Admin\SupportStatus::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\Admin\User::class);
    }
}
