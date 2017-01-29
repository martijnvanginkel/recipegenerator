<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    public function foodrestrictions()
    {
        return $this->belongsToMany('App\Foodrestriction');
    }

    public function recipes()
    {
        return $this->belongsToMany('App\Recipe');
    }

    public function histories()
    {
        return $this->belongsToMany('App\Recipe', 'history_user', 'user_id', 'history_id');
    }

     public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
