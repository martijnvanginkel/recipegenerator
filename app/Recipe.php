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

}
