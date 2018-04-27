<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CompanyBuilding
 * @package App\Models
 * @version April 8, 2018, 1:53 pm UTC
 *
 * @property \App\Models\Company company
 * @property \Illuminate\Database\Eloquent\Collection companyContracts
 * @property \Illuminate\Database\Eloquent\Collection CompanyFloorRoom
 * @property \Illuminate\Database\Eloquent\Collection companyModules
 * @property \Illuminate\Database\Eloquent\Collection companyUsers
 * @property string name
 * @property string address
 * @property string zipcode
 * @property integer num_floors
 * @property integer company_id
 */
class RoomContracts extends Model
{
    use SoftDeletes;

    public $table = 'room_contracts';

    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];


    public $fillable = [
        'company_id',
        'room_id',
        'number',
        'content',
        'start_date',
        'end_date',
        'termindation_date',
        'payment_method',
        'payment_cycle',
        'discount',
        'discount_type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'room_id' => 'integer',
        'company_contract_id' => 'integer',
        'customer_id' => 'integer',
        'contract_number' => 'integer',
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
    public function room()
    {
        return $this->belongsTo(\App\Models\Room::class);
    }
}
