<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [

        'name'
    ];

    public function student()
    {
        return $this->hasOne('App\Student');
    }
}
