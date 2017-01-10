<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Foodrestriction;
use App\User;
use Auth;

class FoodrestrictionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foodrestrictions = Foodrestriction::all();
        return view('foodrestrictions.index')->with('foodrestrictions', $foodrestrictions);
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
        $this->validate($request, array('title' => 'required',
            'allergy' => 'required_without_all:diet',
            'diet' => 'required_without_all:allergy'
            ));
        $foodrestriction = new Foodrestriction;
        $foodrestriction->title = $request->title;
        $foodrestriction->allergy = $request->has('allergy');
        $foodrestriction->diet = $request->has('diet');
        $foodrestriction->save();

        return redirect()->route('foodrestrictions.index');
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
        $foodrestriction = Foodrestriction::find($id);
        return view('foodrestrictions.edit')->with('foodrestriction', $foodrestriction);
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
        $this->validate($request, array('title' => 'required'));
        $foodrestriction = Foodrestriction::find($id);
        $foodrestriction->title = $request->title;
        $foodrestriction->save();

        return redirect()->route('foodrestrictions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foodrestriction = Foodrestriction::find($id);
        $foodrestriction->delete();
        return redirect()->route('foodrestrictions.index');
    }
}
