<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'group_id',
        'name',
        'email',
        'description',
    ];
}
