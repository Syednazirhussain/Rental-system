<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyLandlordTermination extends Model
{
    use SoftDeletes;
    public $table = 'company_landlord_terminations';


    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public $fillable = [
        'company_id',
        'termination_date',
        'termination_issue',
        'contract_end_date',
        'note',
        'contract_id',
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'company_id',
        'termination_date',
        'termination_issue',
        'contract_end_date',
        'note',
        'contract_id',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
}
