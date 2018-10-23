<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
//    protected $fillable=['name','course_id','user_id'];
//    protected $guarded=['id'];
    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}
