<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'password',
        'email',
        'username',
        'is_active',
    ];

    public function manager()
    {
        return $this->belongsTo('App\Manager');
    }

    public function room()
    {
        return $this->hasOne('App\Room');
    }
}

