<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Permission extends Model
{
    protected $fillable = ['name', 'label'];

    public function roles()
    {
        return $this->hasMany('App\Role');
    }





}
