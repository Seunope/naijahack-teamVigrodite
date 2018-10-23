<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function faculty()
    {
        return $this->belongsTo('App\Faculty');
    }
    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
//    100 Level model
    public function hundred()
    {
        return $this->hasOne('App\HundredAdmin');
    }
//    200 Level model
    public function twoHundred()
    {
        return $this->hasOne('App\TwoHundredAdmin');
    }
//    300 Level model
    public function threeHundred()
    {
        return $this->hasOne('App\ThreeHundredAdmin');
    }
//    400 Level model
    public function fourHundred()
    {
        return $this->hasOne('App\FourHundredAdmin');
    }
//    500 Level model
    public function fiveHundred()
    {
        return $this->hasOne('App\FiveHundredAdmin');
    }
}
