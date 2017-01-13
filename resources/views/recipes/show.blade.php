@extends('main')

@section('content')
<section id="container_recept_fav">
	<img id="image_recipe" src="{{ asset('img/' . $recipe->image) }}" alt="" height="250px" width="900px"/>
	<a href=" {{ route('recipes.index', $recipe->id) }} ">
		<button class="button back">
			<img src={{asset('img/icons/back.png')}} alt="Terug">
		</button>
	</a>
	<h1>{{ $recipe->titel }}</h1>
	<ul id="ingredients">
		<h3>Ingrediënten</h3>
		@foreach($ingredients->where('recipe_id', $recipe->id) as $ingredient)
			<li>{{ $ingredient->ingredient }}</li>	
		@endforeach	
	</ul>
	<div id="steps">
		<h3>Bereidingswijze</h3>
		<!-- vanuit PHP -->
		<p>{{ $recipe->bereidingswijze }}</p>
	</div>
	<div id="nutritional_values">
		<h3>Voedingswaarden</h3>
		<!-- vanuit PHP -->

	<ul>
		<li>Energie: {{ $recipe->energie }}</li>
		<li>Eiwit: {{ $recipe->eiwit }}</li>
		<li>Koolhydraten: {{ $recipe->koolhydraten }}</li>
		<li>Vet: {{ $recipe->vet }}</li>
		<li>Voedingsvezel: {{ $recipe->voedingsvezel }}</li>
		<li>Natrium: {{ $recipe->natrium }}</li>
	</ul>

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

	</div>
</section>

@endsection
