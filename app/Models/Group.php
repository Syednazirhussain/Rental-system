<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'user_id',
        'company_id',
        'name'
    ];

    /**
     * A group have many customers - one to many relations
     */
    public function customers()
    {
        return $this->hasMany('App\Models\Customer','group_id', 'id');
    }

}
