<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function manager(){
        return $this->belongsTo('App\Manager');
    }
    public function room(){
        return $this->hasOne('App\Room');
    }
}

