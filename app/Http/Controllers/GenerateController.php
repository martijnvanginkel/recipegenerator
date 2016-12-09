<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use Illuminate\Support\Facades\Input;

class GenerateController extends Controller
{

	public function generate(){

		$clicked =  Input::get('genereer');

		if ($clicked) {

			//$recipeAmount = Recipe::count();
	        $randomNumber = rand(13, 20);
	        $id = $randomNumber;
	        $recipe = Recipe::find($id);

        	return view('/home')->with('recipe', $recipe)->with('clicked', $clicked);
		}else {
			return view('/home')->with('clicked', $clicked);
		}

	}

}