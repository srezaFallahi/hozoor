<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    public function room()
    {
        return $this->hasMany('App\Room');
    }
}
