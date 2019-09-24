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

    public function teacher(){
        return $this->hasOne('App\Teacher');
    }
}
