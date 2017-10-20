<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function messages(){
        return $this->hasMany('App\Message', 'user_id');
    }

    public function getAvatarAttribute($value){
        if($value == null){
            return "user-default.png";
        }
        return $value;
    }

    public function getBioAttribute($value){
        if($value == null){
            return "Tell me a secret!";
        }
        return $value;
    }
}
