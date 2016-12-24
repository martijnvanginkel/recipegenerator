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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::User();

        return view ('users.index')->with('user', $user);
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
        $diet = $request->diet_id;
        $user->diets()->sync([$diet], false);

        return view('users.index')->with('user', $user)->with('diet', $diet);
        //return redirect()->route('users.index', $user->id);

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

        $checked = "checked";

        //laat alle dieeten van de gebruiker zien
        $userDiets = $user->diets()->get();


        return view('users.edit')->with('diets', $diets)->with('user', $user)->with('userDiets', $userDiets)->with('checked', $checked);
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
        // $user = Auth::user();
        // $recipe = Recipe::find($id);
        // $user->recipes()->detach($recipe);
        // return redirect()->route('users.index');
    }

    public function history()
    {
        $recipe = Recipe::find(13);
        return view('pages.history')->with('recipe', $recipe);
    }
}
