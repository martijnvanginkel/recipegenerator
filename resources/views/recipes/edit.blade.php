@extends('main')

@section('content')



<form method="POST" action="{{ route('recipes.update', $recipe->id) }}">
      
    <label for="titel">Titel</label>
    <br>
    <textarea type="text" id="titel" name="titel" rows="1" style="resize:none;">{{ $recipe->titel }}</textarea>
    <br>
    <label for="ingredienten">Ingredienten</label>
    <br>
    <textarea type="text" id="ingredienten" name="ingredienten" rows="10">{{ $recipe->ingredienten }}</textarea>
    <br>
    <label for="bereidingswijze">Bereidingswijze</label>
    <br>
    <textarea type="text" id="bereidingswijze" name="bereidingswijze" rows="10">{{ $recipe->bereidingswijze }}</textarea>
    <br>
    <label for="voedingswaarde">Voedingswaarde</label>
    <br>
    <textarea type="text" id="voedingswaarde" name="voedingswaarde" rows="10">{{ $recipe->voedingswaarde }}</textarea>
    <br>

	<button type="submit">Opslaan</button>
	<br>
    
    <input type="hidden" name="_token" value="{{ Session::token() }}">
    {{ method_field('PUT') }}

</form>﻿

<form method="POST" action="{{ route('recipes.destroy', $recipe->id) }}">
    <input type="submit" value="Delete">
    <input type="hidden" name="_token" value="{{ Session::token() }}">
   {{ method_field('DELETE') }}

   <a href=" {{ route('recipes.show', $recipe->id) }} ">Terug</a>
</form>﻿



@endsection