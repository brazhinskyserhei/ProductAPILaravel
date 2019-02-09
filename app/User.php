<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*Relation*/
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function categories()
    {
        return $this->hasMany('App\Categories');
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function saveAvatar($avatar)
    {
        if ($avatar) {
            $filename = str_random(10) . '.' . $avatar->extension();
            $avatar->storeAs('images/users', $filename);
            $this->avatar = $filename;
            $this->save();
        } else {
            return;
        }
    }

    /*Acsessor*/
    public function getAvatarAttribute($avatar)
    {
        if (!$avatar) {
            return env('APP_URL') . '/public/images/users/no-avatar.jpg';
        } else {
            return env('APP_URL') . '/public/images/users/' . $avatar;
        }
    }


}
