<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageD extends Model
{
    public function optionD()
    {
        return $this->belongsTo('App\OptionD');
    }
}
