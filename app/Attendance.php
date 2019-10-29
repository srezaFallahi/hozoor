<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['date', 'attendance', 'class_id'];

    function student()
    {
        return $this->belongsTo('App\Student');
    }
}
