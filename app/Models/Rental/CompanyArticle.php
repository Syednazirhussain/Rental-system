<?php

namespace App\Models\Rental;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyArticle extends Model
{
    use SoftDeletes;
    public $table = 'company_articles';


    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public $fillable = [
        'company_id',
        'module',
        'number',
        'article_name_swedish',
        'article_name_english',
        'sales_price',
        'in_price',
        'unit',
        'suppliers',
        'start_date',
        'end_date',
        'category',
        'shortcut',
        'vat',
        'rank_index',
        'sort_index',
        'cancellation_condition',
        'commission_article',
        'show_in_booking',
        'show_in_cache',
        'show_in_online_booking',
        'continues',
        'bonus_article',
        'main_article',
        'building',
        'package',
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'company_id',
        'module',
        'number',
        'article_name_swedish',
        'article_name_english',
        'sales_price',
        'in_price',
        'unit',
        'suppliers',
        'start_date',
        'end_date',
        'category',
        'shortcut',
        'vat',
        'rank_index',
        'sort_index',
        'cancellation_condition',
        'commission_article',
        'show_in_booking',
        'show_in_cache',
        'show_in_online_booking',
        'continues',
        'bonus_article',
        'main_article',
        'building',
        'package',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
}
