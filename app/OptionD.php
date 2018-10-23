<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionD extends Model
{
    public function imageD()
    {
        return $this->hasMany('App\ImageD');
    }
    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
