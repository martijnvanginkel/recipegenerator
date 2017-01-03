@extends('main')

@section('content')

	<img id="image_recipe" src="{{ asset('img/' . $recipe->image) }}" alt="" height="250px" width="900px"/>
	
	<h1> {{ $recipe->titel }} </h1>

	<h1>Ingrediënten</h1>
	<p> {{ $recipe->ingredienten }} </p><br>

	<h1>Bereidingswijze</h1>
	<p> {{ $recipe->bereidingswijze }} </p><br>

	<h1>Voedingswaarde</h1>
	<p> {{ $recipe->voedingswaarde }} </p><br>

	
	<a href=" {{ route('users.index') }} ">Terug</a>


@endsection