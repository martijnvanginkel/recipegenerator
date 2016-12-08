@extends('main')

@section('content')
  <section id="generator">
    <input type="text" name="" value="">
    <button type="button" name="button">GENEREER</button>
  </section>
  <section id="recept">
    <img id="image_recipe" src="http://placehold.it/800x250" alt="" />
    <h1>{{ $recipe->titel }}</h1>
    <ol id="ingredients">
      <h3>Ingrediënten</h3>
      <!-- vanuit PHP -->
      <p>{{ $recipe->ingredienten }}</p>
    </ol>
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
  </section>
@endsection
