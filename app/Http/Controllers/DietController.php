<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diet;
use App\User;
use Auth;

class DietController extends Controller
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
        $diets = Diet::all();
        return view('diets.index')->with('diets', $diets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array('titel' => 'required'));
        $diet = new Diet;
        $diet->titel = $request->titel;
        $diet->save();

        return redirect()->route('diets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $diet = Diet::find($id);

        return view('diets.edit')->with('diet', $diet);
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
        $this->validate($request, array('titel' => 'required'));
        $diet = Diet::find($id);
        $diet->titel = $request->titel;
        $diet->save();

        return redirect()->route('diets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $diet = Diet::find($id);
        $diet->delete();
        return redirect()->route('diets.index');
    }
}
