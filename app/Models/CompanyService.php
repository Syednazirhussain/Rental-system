<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyService extends Model
{
    protected $fillable = [
        'room_id',
        'service_id',
        'price',
    ];
}
