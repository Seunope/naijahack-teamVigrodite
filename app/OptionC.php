<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionC extends Model
{
    public function imageC()
    {
        return $this->hasMany('App\ImageC');
    }
    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
