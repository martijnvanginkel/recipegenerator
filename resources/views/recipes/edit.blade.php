@extends('main')

@section('content')

<div id="container">
    
<form id="forms" method="POST" action="{{ route('recipes.update', $recipe->id) }}" enctype="multipart/form-data">
    <h1 id="head">Recept wijzigen</h1>
     <!-- <label name="title">Titel:</label>
     <textarea placeholder="Typ hier de titel van dit gerecht" cols="30" rows="2" type="text" name="titel" id="titel"></textarea>
      <label name="ingredienten" for="">Ingrediënten:</label>
      <textarea placeholder="Typ hier de ingrediënten die zijn gebruikt voor dit gerecht" cols="30" rows="5" type="text" name="ingredienten" id="ingredienten" value=""></textarea>
      <label name="bereidingswijze">Bereidingswijze:</label>
      <textarea placeholder="Typ hier hoe dit gerecht klaargemaakt wordt" cols="30" rows="5" type="text" name="bereidingswijze" id="bereidingswijze"></textarea>
      <label name="voedingswaarde" for="">Voedingswaarden:</label>
      <textarea placeholder="Typ hier de voedingswaarden van dit gerecht" cols="30" rows="5" name="voedingswaarde" id="voedingswaarde"></textarea>
 -->

    <label for="">Afbeelding:</label>
    <label class="afbeeldingknop" id="afbeeldingknop"> 
    Klik hier om een afbeelding te uploaden
    <input type="file" name="image" accept="image/*"></label> 
    <label for="titel">Titel:</label>
    <textarea placeholder="Typ hier de titel van dit gerecht" type="text" id="titel" name="titel" rows="2" style="resize:none;">{{ $recipe->titel }}</textarea>
    <label for="ingredienten">Ingrediënten:</label>

    @foreach($ingredients->where('recipe_id', $recipe->id) as $ingredient)
      <textarea>{{ $ingredient->ingredient }}</textarea> 
    @endforeach

    <label for="bereidingswijze">Bereidingswijze:</label>
    <textarea placeholder="Typ hier hoe dit gerecht klaargemaakt wordt" type="text" id="bereidingswijze" name="bereidingswijze" rows="10">{{ $recipe->bereidingswijze }}</textarea>
    <label for="voedingswaarde">Voedingswaarden:</label>
    <textarea placeholder="Typ hier de voedingswaarden van dit gerecht" type="text" id="voedingswaarde" name="voedingswaarde" rows="10">{{ $recipe->voedingswaarde }}</textarea>

    <label name="foodrestrictions[]" for="foodrestrictions">Dit recept past binnen de volgende diëten:</label>

    <ul>
  @foreach($foodrestrictions->where('diet', true) as $foodrestriction)
      <li> <input name="foodrestrictions[]" type="checkbox" id="{{$foodrestriction->title}}" value="{{ $foodrestriction->id }}" ><label for="{{$foodrestriction->title}}" >{{$foodrestriction->title}}</label> </li>
      <li> <input name="foodrestrictions[]" type="checkbox" {{$foodrestriction}}  id="{{$foodrestriction->title}}" value="{{ $foodrestriction->id }}" ><label for="{{$foodrestriction->title}}" >{{$foodrestriction->title}}</label> </li>
  @endforeach
    </ul>

	<button id="save-button" type="submit">Opslaan</button>
    
    <input type="hidden" name="_token" value="{{ Session::token() }}">
    {{ method_field('PUT') }}

</form>﻿

<form method="POST" action="{{ route('recipes.destroy', $recipe->id) }}">
    <input type="submit" value="Delete">
    <input type="hidden" name="_token" value="{{ Session::token() }}">
   {{ method_field('DELETE') }}

   <a href=" {{ route('recipes.index', $recipe->id) }} ">Terug</a>
</form>﻿
</div>


@endsection