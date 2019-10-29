<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [

    ];

    public function manager()
    {
        return $this->belongsTo('App\Manager');
    }

    public function room()
    {
        return $this->hasOne('App\Room');
    }

    public function users()
    {
        return $this->morphToMany('App\User', 'userable');
    }
}

