<?php

namespace App\Models\Rental;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleFinancial extends Model
{
    use SoftDeletes;
    public $table = 'article_financials';


    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public $fillable = [
        'company_id',
        'article_id',
        'acc_1',
        'acc_2',
        'acc_3',
        'acc_4',
        'article_no',
        'cost_no',
        'project_no',
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'company_id',
        'article_id',
        'acc_1',
        'acc_2',
        'acc_3',
        'acc_4',
        'article_no',
        'cost_no',
        'project_no',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
}
