<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    public function manager(){


        return $this->belongsTo('App\Manager');
    }



    public function grade(){


        return $this->belongsTo('App\Grade');
    }
}
