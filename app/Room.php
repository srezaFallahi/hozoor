<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name', 'teacher_id', 'manager_id', 'grade_id'];

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

    public function students()
    {
        return $this->belongsToMany('App\Student');
    }

    public function manger()
    {
        return $this->belongsTo('App\Manager');
    }

    public function grade()
    {

        return $this->belongsTo('App\Grade');
    }

    public function days()
    {
        return $this->belongsToMany('App\Day');
    }

}
