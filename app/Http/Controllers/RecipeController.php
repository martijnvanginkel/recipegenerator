<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Recipe;
use App\Foodrestriction;
use App\User;
use App\Ingredient;
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
    //laat alle recepten uit de database op de /recipe pagina zien
    public function index()
    {
        $recipes = Recipe::all();

        $ingredients = Ingredient::all();

        return view('recipes.index', compact('recipes'), compact('ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //geeft de mogelijkheid om een recept toe te voegen
    public function create()
    {
        //haalt de diëten op uit de database
        $foodrestrictions = Foodrestriction::all();
        return view('recipes.create')->with('foodrestrictions', $foodrestrictions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //valideert de data
        $this->validate($request,
        [
            'titel' => 'required',
            'ingredienten' => 'required',
            'bereidingswijze' => 'required',
            'voedingswaarde' => 'required',
            
        ]);

        //nieuw recept wordt aangemaakt
        $recipe = new Recipe;

        //ingevulde data door de gebruiker wordt gevalideert door bovenstaande
        $recipe->titel = $request->titel;      
        $recipe->bereidingswijze = $request->bereidingswijze;
        $recipe->voedingswaarde = $request->voedingswaarde;  

        $ingredient = new Ingredient;
        $ingredientenArray = $ingredient->ingredient = $request->ingredienten;


        //img toevoegen aan recept
        $image = $request->image;
        //verandert de filenaam naar de tijd en datum, zodat er nooit dezelfde afbeeldingen in de database komen te staan
        $filename = time() . '.' . $image->getClientOriginalExtension();
        //de locatie van de img
        $location = public_path('img/' . $filename);
        //maakt de img aan, verandert de grootte en slaat hem op
        Image::make($image)->resize(900, 250)->save($location);
        $recipe->image = $filename;

        //recept opslaan
        $recipe->save();

        foreach ($ingredientenArray as $requestIngredient) {
             $ingredient = New Ingredient;
             $ingredient->ingredient = $requestIngredient;
             $recipe->ingredients()->save($ingredient);     
         } 
        
       
        
    
        //koppel het recept aan een dieet als die zijn aangegeven
        if($request->foodrestrictions){
            $recipe->foodrestrictions()->sync($request->foodrestrictions, false);
        }

        return redirect()->route('recipes.show', $recipe->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //laat een recept zien zoals hij in de database staat
    public function show($id)
    {
        //zoek het recept die je hebt aangeklikt op in de database
        $recipe = Recipe::find($id);

        $ingredients = Ingredient::all();

        return view('recipes.show')->with('recipe', $recipe)->with('ingredients', $ingredients);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //geeft de mogelijkheid op een recept te bewerken
    public function edit($id)
    {
        //zoek het recept die je hebt aangeklikt op in de database
        $recipe = Recipe::find($id);
        $ingredients = Ingredient::all();
        $foodrestrictions = Foodrestriction::all();

        return view('recipes.edit')->with('recipe', $recipe)->with('foodrestrictions', $foodrestrictions)->with('ingredients', $ingredients);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //na het bewerken wordt het recept door middel van deze functie aangepast in de database
    public function update(Request $request, $id)
    {
        //valideert de data
        $this->validate($request, array(
            'titel' => 'required',
            'ingredienten' => 'required',
            'bereidingswijze' => 'required',
            'voedingswaarde' => 'required',
            'image' => 'image',
            ));

        //zoek het recept op in de database
        $recipe = Recipe::find($id);

        //ingevulde data door de gebruiker wordt gevalideert door bovenstaande
        $recipe->titel = $request->input('titel');
        $recipe->ingredienten = $request->input('ingredienten');
        $recipe->bereidingswijze = $request->input('bereidingswijze');
        $recipe->voedingswaarde = $request->input('voedingswaarde');   

        //wanneer de img wordt gewijzigd wordt het volgende uitgevoerd
        if ($request->hasFile('image')) {
            //nieuwe img toevoegen
            $image = $request->file('image');
            //verandert de filenaam naar de tijd en datum, zodat er nooit dezelfde afbeeldingen in de database komen te staan
            $filename = time() . '.' . $image->getClientOriginalExtension();
            //de locatie van de img
            $location = public_path('img/' . $filename);
            //maakt de img aan, verandert de grootte en slaat hem op
            Image::make($image)->resize(900, 250)->save($location);
            //de oude img
            $oldFilename = $recipe->image;
            //de nieuwe img
            $recipe->image = $filename;

            //verwijder de vorige foto
            Storage::delete($oldFilename);
        }

        //sla het recept opnieuw op
        $recipe->save();

    
             // $recipe->ingredients()->save($ingredient);     
         

        return redirect()->route('recipes.show', $recipe->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //geeft de mogelijkheid om het recept te verwijderen
    public function destroy($id)
    {
        //zoek het recept op in de database
        $recipe = Recipe::find($id);
        //verwijdert het recept
        $recipe->delete();
        return redirect()->route('recipes.index');
    }

    //genereer functie van het recept op de homepagina
    public function generate()
    {
        $clicked =  Input::get('genereer');
        $user = Auth::user();

        $ingredients = Ingredient::all();

        $historyRecipes = $user->histories()->pluck('history_id')->toArray();
        $userFoodrestrictionsIds = $user->foodrestrictions->pluck('id')->toArray(); 

        $allRecipes = Recipe::all()->pluck('id')->toArray();

        if($user->foodrestrictions->isEmpty()){

            $recipe = Recipe::findMany(array_diff($allRecipes, $historyRecipes))->random(1);

        }
        else{

            $recipess = Recipe::whereHas('foodrestrictions', function($q)
            {
                $user = Auth::user();
                $userFoodrestrictionsIds = $user->foodrestrictions->pluck('id')->toArray(); 
                
                $q->whereIn('foodrestriction_id', $userFoodrestrictionsIds);

            })->pluck('id')->toArray();

            $recipe = Recipe::findMany(array_diff($recipess, $historyRecipes))->random(1);

        }

        if($clicked){
            $generatedRecipe = $recipe->id;
            if ($user->histories()->count() <= 4) {
                $user->histories()->sync([$generatedRecipe], false);

                return view('/home')->with('recipe', $recipe)->with('clicked', $clicked)->with('user', $user)->with('ingredients', $ingredients);
            }
            if($user->histories()->count() >= 5){
                $lastRecipe = $user->histories()->first();
                $user->histories()->detach($lastRecipe);

                $user->histories()->sync([$generatedRecipe], false);

                return view('/home')->with('recipe', $recipe)->with('clicked', $clicked)->with('user', $user)->with('ingredients', $ingredients);
            }

        }

        return view('/home')->with('clicked', $clicked);
    }

    //geeft de mogelijkheid om het recept toe te voegen als favoriet
    public function favorite(request $request) 
    {
        $user = Auth::user();
        $recipe = $request->recipe_id;
        $user->recipes()->sync([$recipe], false);

        return redirect()->route('users.index');
    }


}
