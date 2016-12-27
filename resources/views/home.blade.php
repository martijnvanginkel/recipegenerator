@extends('main')

@section('content')
<section id=container_generator>
  <a href="/home"><img id="logo" src={{asset('img/Sjef_logo.png')}} alt="De Sjef Logo"></a>
  <a href="/users"><img id="profile" src="img/icons/Profiel.png" alt="Profiel" width="50px" heigt="50px"></a>

  <form id="generator" method="POST" action=" {{ route('recipe-generate') }} ">
    {{ csrf_field() }}
    <input type="image" src="/img/rad.svg" name="genereer" value="Genereer" id="generateButton" alt="Submit" action="">

    <input type="hidden" name="_token" value="{{ Session::token() }}">
    {{ method_field('get') }}
  </form>

  <br>
</section>

<section id="container_recept">

@if($clicked)

  <script type="text/javascript">
    $(document).ready(function(){
      $('html, body').animate({
        scrollTop: $("#recept").offset().top
      }, 1000);
    });
  </script>
  
  <section id="recept">
    <img id="image_recipe" src="{{ asset('img/' . $recipe->image) }}" alt="" height="250px" width="900px"/>

    <form method="POST" action="{{ route('recipe-favorite') }}">
     {{ csrf_field() }}
      <input type="hidden" name="recipe_id" id="favorited" value="{{ $recipe->id }}">
      <input type="submit" class="icon-favorite" name="favorited" value="Voeg {{$recipe->titel}} als Favoriet">

    </form>

    <h1>{{ $recipe->titel }}</h1>
    <ul id="ingredients">
      <h3>Ingrediënten</h3>
      <!-- vanuit PHP -->
      <p>{{ $recipe->ingredienten }}</p>
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

{{-- <script type="text/javascript">
    $('#favorite').click(function(){
      $.ajax({
        type:"POST",
        url: "{{route ('recipe-favorite')}}",
        data: {id:1},
      });
    });

    </script>  --}}

    <div id="social_media">
      <a href="#"><img class="icon" src="/img/icons/Twitter.png" alt="Twitter icon"></a>
      <a href="#"><img id="facebook" class="icon" src="/img/icons/Facebook.png" alt="Facebook icon"></a>
      <a href="#"><img class="icon" src="/img/icons/Mail.png" alt="Mail"></a>
    </div>

  </section>
  @endif
</section>
@endsection
