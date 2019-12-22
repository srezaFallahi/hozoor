<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'code', 'is_active', 'phone_number', 'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function userable()
    {
        return $this->hasOne('App\userables');
    }

    public function isManager()
    {
        if ($this->userable->userable_type == 'App\Manager') {
            return true;

        }
        return false;
    }

    public function isTeacher()
    {
        if ($this->userable->userable_type == 'App\Teacher') {
            return true;
        }
        return false;
    }
}
