@extends('main')

@section('content')

	<h1> {{ $recipe->titel }} </h1>

	<p> {{ $recipe->ingredienten }} </p>

	<p> {{ $recipe->bereidingswijze }} </p>

	<p> {{ $recipe->voedingswaarde }} </p>
	
	<a href=" {{ route('recipes.index', $recipe->id) }} ">Terug</a>

@endsection