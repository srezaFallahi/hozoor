<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [

        'name',
        'id'
    ];

    public function student()
    {
        return $this->hasOne('App\Student');
    }

    public function manager()
    {
        return $this->belongsTo('App\Manager');
    }

    public function room()
    {
        return $this->hasOne('App\Room');
    }
}
