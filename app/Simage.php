<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Simage extends Model
{
    
    public function solution()
    {
        return $this->belongsTo('App\Solution');
    }
}
