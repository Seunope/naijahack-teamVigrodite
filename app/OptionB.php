<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionB extends Model
{
    public function imageB()
    {
        return $this->hasMany('App\ImageB');
    }
    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
