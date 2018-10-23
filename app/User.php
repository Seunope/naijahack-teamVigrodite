<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function questions()
    {
        return $this->hasMany('App\Question');
    }
    public function solutions()
    {
        return $this->hasMany('App\Solution');
    }
     public function helpfuls()
    {
        return $this->hasMany('App\Helpful');
    }

     public function views()
    {
        return $this->hasMany('App\View');
    }

     public function phone()
    {
        return $this->hasOne('App\Phone');
    }
    public function school()
    {
        return $this->belongsTo('App\School');
    }

     public function credit()
    {
        return $this->hasOne('App\Credit');
    }
     public function department()
    {
        return $this->belongsTo('App\Department');
    }

     public function level()
    {
        return $this->belongsTo('App\Level');
    }

     public function courses()
    {
        return $this->hasMany('App\Course');
    }

     public function mails()
    {
        return $this->hasMany('App\Mail');
    }

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function rank(){
        if($this->role_id=="1" && $this->visibility==1){
            return 1;
        }
        if($this->role_id=="2" && $this->visibility==1){
            return 2;
        }
        if($this->role_id=="3" && $this->visibility==1){
            return 3;
        }
        if($this->role_id=="4" && $this->visibility==1){
            return 4;
        }
        return 5;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','slug', 'password','level_id','credit_id','phone_id','credit_id','department_id','school_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
