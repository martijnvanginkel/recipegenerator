@extends('main')
<!-- hoi -->
@section('content')
<section id=container_generator>
  <a href="/home"><img id="logo" src={{asset('img/Sjef_logo.png')}} alt="De Sjef Logo"></a>

 <div class="dropdown">

  <img class="dropbtn" src="img/icons/Menu.png" alt="Menu" width="50px">
  <div class="dropdown-content">
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

    <form id="generator" method="POST" action="{{ route('recipe-generate') }} ">
      {{ csrf_field() }}
      <input type="image" src="/img/rad.svg" name="genereer" value="Genereer" id="generateButton" alt="Submit" action="">

      <input type="hidden" name="_token" value="{{ Session::token() }}">
      {{ method_field('get') }}
    </form>

    <br>
  </section>
  @if($clicked)
  <section id="container_recept">
    <script type="text/javascript">
      $(document).ready(function(){
        $('html, body').delay(1300).animate({
          scrollTop: $("#recept").offset().top
        }, 1000);
      });
    </script>

    <section id="recept">
      <img id="image_recipe" src="{{ asset('img/' . $recipe->image) }}" alt="" height="250px" width="100%"/>

      <form method="POST" action="{{ route('recipe-favorite') }}">
       {{ csrf_field() }}
        <input type="hidden" name="recipe_id" id="favorited" value="{{ $recipe->id }}">
        <input type="submit" class="icon-favorite" name="favorited" value="Voeg {{$recipe->titel}} als Favoriet">
      </form>

      <h1>{{ $recipe->titel }}</h1>
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
        <ul class="nutritional_values">
            <li>Energie: {{ $recipe->energie }}</li>
            <li>Eiwit: {{ $recipe->eiwit }}</li>
            <li>Koolhydraten: {{ $recipe->koolhydraten }}</li>
            <li>Vet: {{ $recipe->vet }}</li>
            <li>Voedingsvezel: {{ $recipe->voedingsvezel }}</li>
            <li>Natrium: {{ $recipe->natrium }}</li>
        </ul>
      </div>


      <div id="social_media">
        <a href="#"><img class="icon" src="/img/icons/Twitter.png" alt="Twitter icon"></a>
        <a href="#"><img id="facebook" class="icon" src="/img/icons/Facebook.png" alt="Facebook icon"></a>
        <a href="#"><img class="icon" src="/img/icons/Mail.png" alt="Mail"></a>
      </div>
    </section>
  </section>
  <section id="comments">
    <form id="form_new_recipe" method="POST" action="/recipes/{{ $recipe->id }}/comments" enctype="multipart/form-data">

      @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
      @endif

      <h1>Reageren</h1>

      <textarea name="comment" id="comment"></textarea><br>

      <input class="button blue" type="submit" value="Reageer">

      <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>
  </section>
  <section class="comments">
    <div class="wrapper">
      <h1>Reactie's</h1>
        <ul>
          @foreach ($recipe->comments as $comment)
            <li class="name"><strong>{{ $user->name }}</strong></li>
            <li><strong>{{ date('d-m-Y ', strtotime($comment->updated_at)) }}</strong></li>
            <li>{{ $comment->comment }}</li>
            <hr>

          @endforeach
        </ul>
      </div>
  </section>
      @endif



@endsection
