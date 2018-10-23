<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable=['name','full_name','slug'];
    protected $guarded=['id'];

    public function faculties()
    {
        return $this->hasMany('App\Faculty');
    }
    public function courses()
    {
        return $this->hasMany('App\Course');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
