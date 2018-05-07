<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class RoleHasPermission extends Model
{
    public $table = 'role_has_permissions';


    public $fillable = [
        'permission_id',
        'role_id'
    ];
}
