<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Question extends Model
{
    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function year()
    {
        return $this->belongsTo('App\Year');
    }
    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }
    public function solution()
    {
        return $this->hasOne('App\Solution');
    }
    public function correctOption()
    {
        return $this->hasOne('App\CorrectOption');
    }
    public function optiona()
    {
        return $this->hasOne('App\OptionA');
    }
    public function optionb()
    {
        return $this->hasOne('App\OptionB');
    }
    public function optionc()
    {
        return $this->hasOne('App\OptionC');
    }
    public function optiond()
    {
        return $this->hasOne('App\OptionD');
    }
    public function qimages()
    {
        return $this->hasMany('App\Qimage');
    }
    public function cimages()
    {
        return $this->hasMany('App\Cimage');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function views()
    {
        return $this->hasMany('App\View');
    }
}
