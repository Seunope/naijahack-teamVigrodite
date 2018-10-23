<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageB extends Model
{
    public function optionB()
    {
        return $this->belongsTo('App\OptionB');
    }
}
