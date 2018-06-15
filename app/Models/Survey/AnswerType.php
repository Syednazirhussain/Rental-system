<?php

namespace App\Models\Survey;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnswerType extends Model
{
    use SoftDeletes;
    public $table = 'answer_types';


    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public $fillable = [
        'name',
        'code',
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name',
        'code',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
}
