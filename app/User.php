<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

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

    public function hasPermission($permission)
    {
        $user = Auth::user();
        foreach ($user->roles()->get() as $role) {
            foreach ($role->permissions()->get() as $per) {
                if ($per->name == $permission) {
                    return true;

                }
            }
        }
        return false;
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

}
