<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class State
 * @package App\Models
 * @version April 11, 2018, 2:28 pm UTC
 *
 * @property string name
 * @property integer country_id
 */
class City extends Model
{

    public $table = 'cities';
    

    public $fillable = [
        'name',
        'state_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'state_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:100',
        'state_id' => 'required|integer'
    ];

    
}
