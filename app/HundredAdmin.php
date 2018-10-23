<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HundredAdmin extends Model
{

//    100 Level model
    public function user()
    {
        return $this->belongsTo('App\User');
    }

//    100 Level model
    public function department()
    {
        return $this->belongsTo('App\Department');
    }

}
