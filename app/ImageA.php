<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageA extends Model
{
    public function optionA()
    {
        return $this->belongsTo('App\OptionA');
    }
}
