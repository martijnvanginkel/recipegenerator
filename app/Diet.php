<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    public function recipes()
    {
    	return $this->belongsToMany('App\Recipe');
    }

    public function users()
    {
    	return $this->belongsToMany('App\User');
    }

}
