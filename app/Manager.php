<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Manager extends Model
{
    protected $guarded = 'manager';
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

    public function users()
    {
        return $this->morphToMany('App\User', 'userable');
    }

    public function attendance()
    {
        return $this->hasMany('App\Attendance');
    }


    public function media(){
        return $this->hasMany('App\Media');
    }

    public static function findManager(){
        if (Auth::user()->userable->userable_type == 'App\Manager') {
            $manger = Manager::find(Auth::user()->userable->userable_id);
            return $manger;
        } elseif (Auth::user()->userable->userable_type == 'App\Student') {
            $student = Student::find(Auth::user()->userable->userable_id);
            $manger = Manager::find($student->manager_id);
            return $manger;
        } elseif (Auth::user()->userable->userable_type == 'App\Teacher') {
            $teacher1 = Teacher::find(Auth::user()->userable->userable_id);
            $manger = Manager::find($teacher1->manager_id);
            return $manger;
        }
    }

}
