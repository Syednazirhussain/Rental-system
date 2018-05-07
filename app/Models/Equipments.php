<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Equipments
 * @package App\Models\Company/conference
 * @version April 21, 2018, 12:44 pm UTC
 *
 * @property \App\Models\Company/conference\ConferenceEquipmentsCriterion conferenceEquipmentsCriterion
 * @property \Illuminate\Database\Eloquent\Collection companyContracts
 * @property \Illuminate\Database\Eloquent\Collection companyFloorRooms
 * @property \Illuminate\Database\Eloquent\Collection companyInvoiceItems
 * @property \Illuminate\Database\Eloquent\Collection companyInvoices
 * @property \Illuminate\Database\Eloquent\Collection companyModules
 * @property \Illuminate\Database\Eloquent\Collection companyUsers
 * @property string title
 * @property decimal price
 * @property integer criteria_id
 * @property boolean is_multi_units
 */
class Equipments extends Model
{
    use SoftDeletes;

    public $table = 'conference_equipments';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'price',
        'criteria_id',
        'is_multi_units'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'criteria_id' => 'integer',
        'is_multi_units' => 'boolean'
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
    public function conferenceEquipmentsCriterion()
    {
        return $this->belongsTo(\App\Models\EquipmentCriteria::class, 'criteria_id', 'id');
    }
}
