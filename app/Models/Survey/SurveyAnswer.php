<?php

namespace App\Model\Survey;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurveyAnswer extends Model
{
    use SoftDeletes;
    public $table = 'survey_questions';


    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public $fillable = [
        'company_id',
        'survey_id',
        'user_id',
        'question_id',
        'answer_type',
        'answer',
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'company_id',
        'survey_id',
        'user_id',
        'question_id',
        'answer_type',
        'answer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
}
