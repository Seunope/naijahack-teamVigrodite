<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionA extends Model
{
    public function imageA()
    {
        return $this->hasMany('App\ImageA');
    }
    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
