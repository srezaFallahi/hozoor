<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{


    public function manager()
    {
        return $this->belongsTo('App\Manager');
    }

    public function rooms()
    {
        return $this->hasMany('App\Room');
    }

    public function users()
    {
        return $this->morphToMany('App\User', 'userable');
    }
}

