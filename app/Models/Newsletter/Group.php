<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'user_id',
        'name'
    ];

    /**
     * A group have many customers - one to many relations
     */
    public function customers()
    {
        return $this->hasMany('App\Customer','group_id', 'id');
    }

}
