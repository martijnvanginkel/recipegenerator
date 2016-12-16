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
	/*public function generate(){

        $clicked =  Input::get('genereer');




        //$recipes = Recipe::all();
		//$diets = Diet::all();
		//$user = Auth::user();

		
		//$recipesWithDiet = $recipe->diets;

        if ($clicked) {
        	   	$user = Auth::user();
		        $diets = Diet::all();
		        $dietsFromUser = $user->diets;
		        //$dietsFromUser = $user->diets;
		        //$recipes = Recipe::all();
		        $recipes = Recipe::all()->except($dietsFromUser->id);


            //$recipeAmount = Recipe::count();
            $randomNumber = rand(3, 5);
            $id = $randomNumber;
            $recipe = Recipe::find($id);
            return view('/home')->with('recipe', $recipe)->with('clicked', $clicked);
        }else {
            return view('/home')->with('clicked', $clicked);
        }
    }*/

    public function generate(){
        $clicked =  Input::get('genereer');
        if ($clicked) {
            //$recipeAmount = Recipe::count();
            $randomNumber = rand(3, 5);
            $id = $randomNumber;
            $user = Auth::user();//
            $dietsFromUser = $user->diets;
            $dietsFromRecipe = $recipe->diets;
			$recipe = Recipe::find($id);

            if($dietsFromUser == $dietsFromRecipe){

            }

            
            return view('/home')->with('recipe', $recipe)->with('clicked', $clicked);
        }else {
            return view('/home')->with('clicked', $clicked);
        }
    }



}


// 1. Dieeten van de gebruiker weten
// 2. Alle recepten ophalen
// 3. Alle recepten - Dieeten van gebruiker
// 4. if $clicked () {}
