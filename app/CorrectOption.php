<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorrectOption extends Model
{
    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
