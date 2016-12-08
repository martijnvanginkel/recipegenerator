@extends('main')

@section('content')

	
	<h1> {{ $recipe->titel }} </h1>

	<h2>Ingrediënten</h2>
	<p> {{ $recipe->ingredienten }} </p><br>

	<h2>Bereidingswijze</h2>
	<p> {{ $recipe->bereidingswijze }} </p><br>

	<h2>Voedingswaarde</h2>
	<p> {{ $recipe->voedingswaarde }} </p><br>
	
	<a href=" {{ route('recipes.index', $recipe->id) }} ">Terug</a>

@endsection