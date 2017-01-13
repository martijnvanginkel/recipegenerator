<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Foodrestriction;
use App\Recipe;
use App\Ingredient;
use DB;
use Auth;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //definieer gebruiker
        $user = Auth::User();
        //alle dieeten 
        $allFoodrestrictions = Foodrestriction::all();
        //dieeten van de gebruiker 
        $userFoodrestrictions = $user->foodrestrictions()->get();
        //zet de id's in arrays
        $allFoodrestrictionsArray = $allFoodrestrictions->pluck('id')->toArray();
        $userFoodrestrictionsArray = $userFoodrestrictions->pluck('id')->toArray();
        //vergelijk arrays en zoek naar verschillen in id's
        $foodrestrictionsDifference = array_diff($allFoodrestrictionsArray, $userFoodrestrictionsArray);
        //zoek de dieeten die bij de verschillende id's horen
        $notChosenFoodrestrictions = Foodrestriction::findMany($foodrestrictionsDifference);

        return view ('users.index')->with('user', $user)->with('notChosenFoodrestrictions', $notChosenFoodrestrictions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::User();
        $foodrestrictions = Foodrestriction::all();
        $foodrestriction = $request->foodrestriction_id;

        if(empty($foodrestriction)){
            return redirect()->route('users.index', $foodrestriction);
        }else{
            $user->foodrestrictions()->sync([$foodrestriction], false);
            return redirect()->route('users.index', $foodrestriction);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::find($id);
        return view('pages.favorites')->with('recipe', $recipe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $recipe = Recipe::find($id);
        $user->recipes()->detach($recipe);
        return redirect()->route('users.index');
    }

    public function destroyFoodrestriction($id)
    {
        $user = Auth::user();
        $foodrestriction = Foodrestriction::find($id);
        $user->foodrestrictions()->detach($foodrestriction);
        return redirect()->route('users.index');
    }

    public function favorite($id)
    {
        $recipe = Recipe::find($id);
        $ingredients = Ingredient::all();
        return view('pages.favorites')->with('recipe', $recipe)->with('ingredients', $ingredients);
    }

    public function history($id)
    {
        $recipe = Recipe::find($id);
        $ingredients = Ingredient::all();
        return view('pages.history')->with('recipe', $recipe)->with('ingredients', $ingredients);
    }
}
