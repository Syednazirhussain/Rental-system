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
class State extends Model
{

    public $table = 'states';
    

    public $fillable = [
        'name',
        'country_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'country_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:100',
        'country_id' => 'required|integer'
    ];

    
}
