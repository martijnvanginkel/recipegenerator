<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Diet;
use Auth;

class GenerateController extends Controller
{

    public function generate(){

        $clicked =  Input::get('genereer');
        $favorited = Input::get('favorited');
        $recipe = Recipe::inRandomOrder()->first();

        if ($clicked) {            
            return view('/home')->with('recipe', $recipe)->with('clicked', $clicked);
        }

        if ($favorited) {
            $user = Auth::User();
            $recipeId = $recipe->id;
            $user->recipes()->sync([$recipeId], false);

            return view('users.index')->with('user', $user)->with('recipe', $recipe);
        }

        else {
           return view('/home')->with('clicked', $clicked);
        }
    }

    public function store()
    {
        
    }

}

