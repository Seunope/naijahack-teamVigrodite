<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    public function school()
    {
        return $this->belongsTo('App\School');
    }

    public function departments()
    {
        return $this->hasMany('App\Department');
    }
}
