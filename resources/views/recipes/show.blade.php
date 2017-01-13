@extends('main')

@section('content')



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
      <li> 

      @foreach($recipeWithRestrictions as $recipeWithRestriction)
          @if ($foodrestriction->id === $recipeWithRestriction)
           		{{ $foodrestriction->title }}
          @endif
    @endforeach

     
      
      
      </li>
      @endforeach
    </ul>

	<label name="foodrestrictions[]" for="foodrestrictions">Dit recept past binnen de volgende diëten:</label>
    <ul>
  	@foreach($foodrestrictions->where('diet', true) as $foodrestriction)
      <li> 

      @foreach($recipeWithRestrictions as $recipeWithRestriction)
          @if ($foodrestriction->id === $recipeWithRestriction)
           		{{ $foodrestriction->title }}
          @endif
    @endforeach
      </li>
      @endforeach
    </ul>

	</div>
</section>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-90330521-1', 'auto');
  ga('send', 'pageview');

</script>

@endsection
