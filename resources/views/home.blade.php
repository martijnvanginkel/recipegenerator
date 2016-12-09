@extends('main')

@section('content')
<section id=container_generator>
  <form id="generator" method="POST" action=" {{ route('recipe-generate') }} ">
  {{ csrf_field() }}
    <input type="submit" name="genereer" value="Genereer" id="generateButton" action="">

    <input type="hidden" name="_token" value="{{ Session::token() }}">
    {{ method_field('get') }}
  </form>
  <br>
</section>
<section id="container_recept">

@if($clicked)
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
    <div id="social_media">

    </div>
  </section>
  @endif
</section>
@endsection
