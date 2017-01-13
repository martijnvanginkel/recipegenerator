@extends('main')

@section('content')
<section id="container_recept_fav">
	<img id="image_recipe" src="{{ asset('img/' . $recipe->image) }}" alt="" height="250px" width="900px"/>
	<a href=" {{ route('users.index') }} ">
		<button class="button back">
			<img src={{asset('img/icons/back.png')}} alt="Terug">
		</button>
	</a>
	<h1>{{ $recipe->titel }}</h1>
		<!-- vanuit PHP -->
	<ul id="ingredients">
      <h3>Ingrediënten</h3>
      <!-- vanuit PHP -->
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
