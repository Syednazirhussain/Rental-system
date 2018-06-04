<?php

namespace App\Models\Rental;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticlePrice extends Model
{
    use SoftDeletes;
    public $table = 'article_prices';


    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public $fillable = [
        'company_id',
        'article_id',
        'new_in_price',
        'new_from',
        'new_until',
        'new_continues',
        'sales_price',
        'sales_from',
        'sales_until',
        'sales_continues',
        'note_internal_use',
        'note_customers_swedish',
        'note_customers_english',
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'company_id',
        'article_id',
        'new_in_price',
        'new_from',
        'new_until',
        'new_continues',
        'sales_price',
        'sales_from',
        'sales_until',
        'sales_continues',
        'note_internal_use',
        'note_customers_swedish',
        'note_customers_english',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
}
