@extends('main')

@section('content')
<section id="container_recept_fav">
	<img id="image_recipe" src="{{ asset('img/' . $recipe->image) }}" alt="" height="250px" width="900px"/>
	<a href=" {{ route('users.index') }} ">Terug</a>
	<h1>{{ $recipe->titel }}</h1>
	<ul id="ingredients">
		<h3>Ingrediënten</h3>
		<!-- vanuit PHP -->
		<li>{{ $recipe->ingredienten }}</li>
	</ul>
	<div id="steps">
		<h3>Bereidingswijze</h3>
		<!-- vanuit PHP -->
		<p>{{ $recipe->bereidingswijze }}</p>
	</div>
	<div id="nutritional_values">
		<h3>Voedingswaarden</h3>
		<!-- vanuit PHP -->
		<p>{{ $recipe->voedingswaarde }}</p>
	</div>

	<form method="POST" action="{{ route('users.destroy', $recipe->id) }}">
	    <input type="submit" value="Verwijder favoriet">
	    <input type="hidden" name="_token" value="{{ Session::token() }}">
	   {{ method_field('DELETE') }}
	</form>﻿
</section>

@endsection
