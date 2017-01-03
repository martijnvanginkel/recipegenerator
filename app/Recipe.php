<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public function diets()
    {
    	return $this->belongsToMany('App\Diet');
    }

    public function users()
    {
    	return $this->belongsToMany('App\User');
    }

    // public function users()
    // {
    // 	return $this->belongsToMany('App\User', 'history_user', 'history_id', 'user_id');
    // }

        public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

}
