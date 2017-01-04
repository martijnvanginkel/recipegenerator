<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Diet;
use App\Recipe;
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
        $allDiets = Diet::all();
        //dieeten van de gebruiker 
        $userDiets = $user->diets()->get();
        //zet de id's in arrays
        $allDietsArray = $allDiets->pluck('id')->toArray();
        $userDietsArray = $userDiets->pluck('id')->toArray();
        //vergelijk arrays en zoek naar verschillen in id's
        $dietsDifference = array_diff($allDietsArray, $userDietsArray);
        //zoek de dieeten die bij de verschillende id's horen
        $diets = Diet::findMany($dietsDifference);

        return view ('users.index')->with('user', $user)->with('diets', $diets);
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
        $diets = Diet::all();
        $diet = $request->diet_id;

        if(empty($diet)){
            return redirect()->route('users.index', $diet);
        }else{
            $user->diets()->sync([$diet], false);
            return redirect()->route('users.index', $diet);
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
        $user = Auth::user();
       
        $diets = Diet::all();

        $userDiets = $user->diets()->get();

        return view('users.edit')->with('diets', $diets)->with('user', $user)->with('userDiets', $userDiets);
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

    public function destroyDiet($id)
    {
        $user = Auth::user();
        $diet = Diet::find($id);
        $user->diets()->detach($diet);
        return redirect()->route('users.index');
    }

    public function favorite($id)
    {

    }

    public function history($id)
    {
        $recipe = Recipe::find($id);
        return view('pages.history')->with('recipe', $recipe);
    }
}
