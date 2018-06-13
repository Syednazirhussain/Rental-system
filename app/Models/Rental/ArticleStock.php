<?php

namespace App\Models\Rental;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleStock extends Model
{
    use SoftDeletes;
    public $table = 'article_stocks';


    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public $fillable = [
        'company_id',
        'article_id',
        'qty',
        'value',
        'width',
        'height',
        'depth',
        'weight',
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'company_id',
        'article_id',
        'qty',
        'value',
        'width',
        'height',
        'depth',
        'weight',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
}
