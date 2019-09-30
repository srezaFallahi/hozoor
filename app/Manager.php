<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'is_active',
        'username',
        'email',
        'password'
    ];

    public function teacher()
    {
        return $this->hasOne('App\Teacher');
    }

    public function grade()
    {
        return $this->hasOne('App\Grade');
    }

    public function room()
    {
        return $this->hasOne('App\Room');
    }

    public function student()
    {
        return $this->hasOne('App\Student');
    }
}
