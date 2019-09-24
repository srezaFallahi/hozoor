<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable=['name','techer_id'];
    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }
    public function students()
    {
        return $this->belongsToMany('App\Student');
    }

}
