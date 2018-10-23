<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageC extends Model
{
    public function optionC()
    {
        return $this->belongsTo('App\OptionC');
    }
}
