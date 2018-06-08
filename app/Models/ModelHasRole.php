<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class ModelHasRole extends Model
{
    public $table = 'model_has_roles';


    public $fillable = [
        'role_id',
        'model_id',
        'model_type'
    ];
}
