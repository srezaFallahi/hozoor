<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['date', 'attendance', 'room_id', 'manager_id'];

    function student()
    {
        return $this->belongsTo('App\Student');
    }

    function room()
    {
        return $this->belongsTo('App\Room');
    }

    function manager()
    {
        return $this->belongsTo('App\Manager');
    }
}
