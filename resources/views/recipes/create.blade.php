@extends('main')

@section('content')

	<h1>Recepten toevoegen</h1>

	<form id="form_new_recipe">
		<label>Titel</label>
		<input type="text" name="title"><br>
		<label for="">Ingrediënten</label>
		<input type="text" name="ingredients" value="">
		<label>Bereidingswijze</label>
		<input type="text" name="steps"><br>
		<label for="">Voedingswaarden</label>
		<input type="submit" name="nutritional_values">
		<label for="">Allergieën</label>
		<input type="checkbox" name="allergy_1" value="">
		<input type="checkbox" name="allergy_2" value="">
		<input type="checkbox" name="allergy_3" value="">
		<input type="checkbox" name="allergy_4" value="">
		<input type="checkbox" name="allergy_5" value="">
		<input type="checkbox" name="allergy_6" value="">
		<label for="">Dieet</label>
		<input type="checkbox" name="vegan" value="">
		<input type="checkbox" name="vegetarian" value="">
	</form>

@endsection
