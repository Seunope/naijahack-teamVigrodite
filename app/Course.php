<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function department()
    {
        return $this->belongsTo('App\Department');
    }
    public function school()
    {
        return $this->belongsTo('App\School');
    }
    public function level()
    {
        return $this->belongsTo('App\Level');
    }
    public function semester()
    {
        return $this->belongsTo('App\Semester');
    }
    public function questions()
    {
        return $this->hasMany('App\Question');
    }
    public function year()
    {
        return $this->belongsToMany('App\Year');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function courses()
    {
        return $this->belongsTo('App\Course');
    }
}
