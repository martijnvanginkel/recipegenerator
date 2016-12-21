<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Recipe;
use App\Diet;
use Image;
use Auth;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
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
        return view('recipes.create')->with('diets', $diets);
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
        //--

        $recipe->save();
        
        //$recipe->diets()->attach(1);
        $recipe->diets()->sync($request->diets, false);

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
        //
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
            ));

        $recipe = Recipe::find($id);

        $recipe->titel = $request->input('titel');
        $recipe->ingredienten = $request->input('ingredienten');
        $recipe->bereidingswijze = $request->input('bereidingswijze');
        $recipe->voedingswaarde = $request->input('voedingswaarde');

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

    public function generate(){

        $clicked =  Input::get('genereer');
        //$favorited = Input::get('favorited');
        $recipe = Recipe::inRandomOrder()->first();

        if ($clicked) { 
            //return redirect()->route('');
            //als er geklikt is, ga door naar de route met $recipe->id.
            //verwijs in de route naar de history functie
            //in de history functie, sla met sync() op in database en verwijs naar /home 
            return view('/home')->with('recipe', $recipe)->with('clicked', $clicked);
        }else {
           return view('/home')->with('clicked', $clicked);
        }
    }

    public function favorite(request $request) {

        $user = Auth::user();
        $recipe = $request->recipe_id;
        $user->recipes()->sync([$recipe], false);

        return view('users.index')->with('user', $user)->with('recipe', $recipe);
    }

}
