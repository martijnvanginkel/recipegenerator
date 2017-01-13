<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{

    public function foodrestrictions()
    {
        return $this->belongsToMany('App\Foodrestriction');
    }

    public function users()
    {
    	return $this->belongsToMany('App\User');
    }

    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

    public function ingredients()
    {
        return $this->hasMany('App\Ingredient');
    }

}
