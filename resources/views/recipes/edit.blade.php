@extends('main')

@section('content')

<div id="container">



 <div class="dropdown">

  <img class="dropbtn" src="img/icons/Menu.png" alt="Menu" width="50px">
  <div class="dropdown-content">
    <a href="/home">Home</a>
    <a href="/users">Profiel</a>
    @if (Auth::user()->admin == 1)
      <a href="{{ route('recipes.index') }}">Recepten</a>
      <a href="{{ route('foodrestrictions.index') }}">Diëten en allergieën</a>
    @endif
    <a href="{{ url('/logout') }}"
        onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
            Uitloggen
    </a>

     <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
         {{ csrf_field() }}
     </form>
  </div>
</div>
    
<form id="forms" method="POST" action="{{ route('recipes.update', $recipe->id) }}" enctype="multipart/form-data">
    <a href="{{ route('users.index') }}">
    <button class="button back">
      <img src="img/icons/back.png" alt="Terug">
    </button>
  </a>
    <h1 id="head">Recept wijzigen</h1>

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

      <label name="energie" for="">Energie:</label>
    <textarea placeholder="Typ hier de voedingswaarden van dit gerecht" rows="5" name="energie" id="energie"> {{ $recipe->energie }} </textarea>

      <label name="eiwit" for="">Eiwit:</label>
    <textarea placeholder="Typ hier de voedingswaarden van dit gerecht" rows="5" name="eiwit" id="eiwit"> {{ $recipe->eiwit }} </textarea>

      <label name="koolhydraten" for="">Koolhydraten:</label>
    <textarea placeholder="Typ hier de voedingswaarden van dit gerecht" rows="5" name="koolhydraten" id="koolhydraten"> {{ $recipe->koolhydraten }} </textarea>

      <label name="vet" for="">Vet:</label>
    <textarea placeholder="Typ hier de voedingswaarden van dit gerecht" rows="5" name="vet" id="vet"> {{ $recipe->vet }} </textarea>

      <label name="voedingsvezel" for="">Voedingsvezel:</label>
    <textarea placeholder="Typ hier de voedingswaarden van dit gerecht" rows="5" name="voedingsvezel" id="voedingsvezel"> {{ $recipe->voedingsvezel }} </textarea>

      <label name="natrium" for="">Natrium:</label>
    <textarea placeholder="Typ hier de voedingswaarden van dit gerecht" rows="5" name="natrium" id="natrium"> {{ $recipe->natrium }} </textarea>

  <label name="foodrestrictions[]" for="foodrestrictions">Dit recept past binnen de volgende allergieën:</label>
    <ul>
  @foreach($foodrestrictions->where('allergy', true) as $foodrestriction)
      <li> <input name="foodrestrictions[]" type="checkbox" 

      @foreach($recipeWithRestrictions as $recipeWithRestriction)
          @if ($foodrestriction->id === $recipeWithRestriction)
            {{ "checked" }}
          @endif
      @endforeach

      id="{{$foodrestriction->title}}" value="{{ $foodrestriction->id }}" ><label for="{{$foodrestriction->title}}" >
      {{$foodrestriction->title}}
       </label> 
      
      </li>
      @endforeach
    </ul>

    <label name="foodrestrictions[]" for="foodrestrictions">Dit recept past binnen de volgende diëten:</label>

    <ul>
  @foreach($foodrestrictions->where('diet', true) as $foodrestriction)
      <li> <input name="foodrestrictions[]" type="checkbox" 

      @foreach($recipeWithRestrictions as $recipeWithRestriction)
          @if ($foodrestriction->id === $recipeWithRestriction)
            {{ "checked" }}
          @endif
      @endforeach

      id="{{$foodrestriction->title}}" value="{{ $foodrestriction->id }}" ><label for="{{$foodrestriction->title}}" >{{$foodrestriction->title}}</label> </li>
  @endforeach
    </ul>

	<button id="save-button" type="submit">Opslaan</button>
    
    <input type="hidden" name="_token" value="{{ Session::token() }}">
    {{ method_field('PUT') }}

<form method="POST" action="{{ route('recipes.destroy', $recipe->id) }}">
    <input type="submit" value="Delete">
    <input type="hidden" name="_token" value="{{ Session::token() }}">
   {{ method_field('DELETE') }}
   </form>﻿



</form>﻿
</div>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-90330521-1', 'auto');
  ga('send', 'pageview');

</script>


@endsection