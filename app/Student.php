<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'grade_id',
        'first_name',
        'last_name',
        'dad_name',
        'personal_code',
        'birth_day',
        'entry_date'
    ];

    public function rooms()
    {
        return $this->hasMany('App\Room');
    }

    public function grade()
    {
        return $this->belongsTo('App\Grade');
    }
}
