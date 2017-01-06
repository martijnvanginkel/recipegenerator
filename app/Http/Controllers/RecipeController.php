<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Recipe;
use App\Diet;
use App\Allergy;
use App\User;
use Image;
use Auth;
use Storage;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diets = Diet::all();
        $allergies = Allergy::all();
        return view('recipes.create')->with('diets', $diets)->with('allergies', $allergies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $this->validate($request,
        [
            'titel' => 'required',
            'ingredienten' => 'required',
            'bereidingswijze' => 'required',
            'voedingswaarde' => 'required',
            'image' => 'required|image',
        ]);

        $recipe = new Recipe;

        $recipe->titel = $request->titel;
        $recipe->ingredienten = $request->ingredienten;
        $recipe->bereidingswijze = $request->bereidingswijze;
        $recipe->voedingswaarde = $request->voedingswaarde;

        //afbeelding toevoegen aan recept
        $image = $request->image;
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('img/' . $filename);
        Image::make($image)->resize(900, 250)->save($location);
        $recipe->image = $filename;

        //recept opslaan
        $recipe->save();

        //koppel het recept aan een dieet als die zijn aangegeven
        if($request->diets){
            $recipe->diets()->sync($request->diets, false);
        }
        if($request->allergies){
            $recipe->allergies()->sync($request->allergies, false);
        }

        return redirect()->route('recipes.show', $recipe->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //zoek het recept die je hebt aangeklikt op in de database
        $recipe = Recipe::find($id);
        
        return view('recipes.show')->with('recipe', $recipe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::find($id);

        return view('recipes.edit')->with('recipe', $recipe);
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
        $this->validate($request, array(
            'titel' => 'required',
            'ingredienten' => 'required',
            'bereidingswijze' => 'required',
            'voedingswaarde' => 'required',
            'image' => 'image',
            ));

        $recipe = Recipe::find($id);

        $recipe->titel = $request->input('titel');
        $recipe->ingredienten = $request->input('ingredienten');
        $recipe->bereidingswijze = $request->input('bereidingswijze');
        $recipe->voedingswaarde = $request->input('voedingswaarde');

        if ($request->hasFile('image')) {
            //nieuwe foto toevoegen
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/' . $filename);
            Image::make($image)->resize(900, 250)->save($location);
            $oldFilename = $recipe->image;
        
            $recipe->image = $filename;

            //verwijder de vorige foto
            Storage::delete($oldFilename);
        }

        //sla het recept opnieuw op
        $recipe->save();

        return redirect()->route('recipes.show', $recipe->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();
        return redirect()->route('recipes.index');
    }

    public function generate()
    {
        $clicked =  Input::get('genereer');
        $user = Auth::user();

        $historyRecipes = $user->histories()->pluck('history_id')->toArray();
        $userDietsIds = $user->diets->pluck('id')->toArray(); 

        $allRecipes = Recipe::all()->pluck('id')->toArray();

        if($user->diets->isEmpty()){

            $recipe = Recipe::findMany(array_diff($allRecipes, $historyRecipes))->random(1);

        }
        else{

            $recipess = Recipe::whereHas('diets', function($q)
            {
                $user = Auth::user();
                $userDietsIds = $user->diets->pluck('id')->toArray(); 
                
                $q->whereIn('diet_id', $userDietsIds);

            })->pluck('id')->toArray();

            $recipe = Recipe::findMany(array_diff($recipess, $historyRecipes))->random(1);

        }

        if($clicked){
            $generatedRecipe = $recipe->id;
            if ($user->histories()->count() <= 4) {
                $user->histories()->sync([$generatedRecipe], false);

                return view('/home')->with('recipe', $recipe)->with('clicked', $clicked)->with('user', $user);
            }
            if($user->histories()->count() >= 5){
                $lastRecipe = $user->histories()->first();
                $user->histories()->detach($lastRecipe);

                $user->histories()->sync([$generatedRecipe], false);

                return view('/home')->with('recipe', $recipe)->with('clicked', $clicked)->with('user', $user);
            }


        }

        return view('/home')->with('clicked', $clicked);
    }


    public function favorite(request $request) 
    {
        $user = Auth::user();
        $recipe = $request->recipe_id;
        $user->recipes()->sync([$recipe], false);

        return view('users.index')->with('user', $user);
    }


}
