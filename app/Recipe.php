<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public function diets()
    {
    	return $this->belongsToMany('App\Diet');
    }

    public function allergies()
    {
        return $this->belongsToMany('App\Allergy');
    }

    public function users()
    {
    	return $this->belongsToMany('App\User');
    }

    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

}
