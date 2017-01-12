@extends('main')

@section('content')




<div class="dropdown">

  <img class="dropbtn" src="img/icons/Profiel.png" alt="Profiel" width="80px">
  <div class="dropdown-content">
    <a href="/Home">Home</a>
		@if (Auth::user()->admin == 1)
			<a href="{{ route('recipes.index') }}">Recepten</a>
			<a href="{{ route('foodrestrictions.index') }}">Allergieën en diëten</a>
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


	

</div>

	<header>
		<div class="wrapper">
  <a href="/home"><img id="logo" src={{asset('img/Sjef_logo.png')}} alt="De Sjef Logo"></a>
			<h1>Welkom op je profiel, <em>{{ ucfirst($user->name) }}</em>! </h1>

		  <table class="table table-bordered">
		    <h3>Dit zijn jouw diëten:</h3>
		      @foreach ($user->foodrestrictions->where('diet', true) as $foodrestriction)
		        <tr>
		        	<td>{{ $foodrestriction->title }}</td>
		          	<td>
				  		<form method="POST" action="{{ route('destroy-foodrestriction', $foodrestriction->id) }}">
						    <input type="submit" value="Verwijder">
						    <input type="hidden" name="_token" value="{{ Session::token() }}">
						    {{ method_field('DELETE') }}
					    </form>﻿
		          </td>
		        </tr>
		      @endforeach
		  </table>

		    <form id="form_new_recipe" method="POST" action=" {{ route('users.store') }} " enctype="multipart/form-data">

		      	@if (count($errors) > 0)
		            <div class="alert alert-danger">
		                <ul>
		                    @foreach ($errors->all() as $error)
		                        <li>{{ $error }}</li>
		                    @endforeach
		                </ul>
		            </div>
		      	@endif

		    	<select class="form-control" name="foodrestriction_id">
		    	<option selected disabled>Selecteer een dieet</option>
		      	@foreach($notChosenFoodrestrictions->where('diet', true) as $foodrestriction)
		        	<option value="{{ $foodrestriction->id }}"> {{ $foodrestriction->title }} </option>
		      	@endforeach
		   		</select>
		      	<input type="submit" value="Voeg toe">
		      	<input type="hidden" name="_token" value="{{ Session::token() }}">

		    </form>

		    <table class="table table-bordered">
		    <h3>Dit zijn jouw allergieën:</h3>
		      @foreach ($user->foodrestrictions->where('allergy', true) as $foodrestriction)
		        <tr>
		        	<td>{{ $foodrestriction->title }}</td>
		          	<td>
				  		<form method="POST" action="{{ route('destroy-foodrestriction', $foodrestriction->id) }}">
						    <input type="submit" value="Verwijder">
						    <input type="hidden" name="_token" value="{{ Session::token() }}">
						    {{ method_field('DELETE') }}
					    </form>﻿
		          </td>
		        </tr>
		      @endforeach
		  </table>

		  	<form id="form_new_recipe" method="POST" action=" {{ route('users.store') }} " enctype="multipart/form-data">

		      	@if (count($errors) > 0)
		            <div class="alert alert-danger">
		                <ul>
		                    @foreach ($errors->all() as $error)
		                        <li>{{ $error }}</li>
		                    @endforeach
		                </ul>
		            </div>
		      	@endif

		    	<select class="form-control" name="foodrestriction_id">
		    	<option selected disabled>Selecteer een allergie</option>
		      	@foreach($notChosenFoodrestrictions->where('allergy', true) as $foodrestriction)
		        	<option value="{{ $foodrestriction->id }}"> {{ $foodrestriction->title }} </option>
		      	@endforeach
		   		</select>
		      	<input type="submit" value="Voeg toe">
		      	<input type="hidden" name="_token" value="{{ Session::token() }}">

		    </form>

		</div>
	</header>

  <section id="favorieten">
    <h1>Favorieten</h1>
    <div class="slide-favorieten">

    @foreach($user->recipes->reverse() as $recipe)
      <div>
        <a href="{{ route('favorite-recipes', $recipe->id) }}"><img src="{{ asset('img/' . $recipe->image) }}"></a>
      </div>
    @endforeach

    </div>
  </section>
  <section id="geschiedenis">
    <h1>Recent bekeken</h1>
    <div class="slide-favorieten">

    @foreach($user->histories->reverse() as $recipe)
    	<a href="{{ route('history-recipes', $recipe->id) }}"><img src="{{ asset('img/' . $recipe->image) }}"></a>
    @endforeach

    </div>
  </section>

	<section class="comments user">
	  <div class="wrapper">
	    <h1>Jouw reactie's</h1>
	      <ul>
			@foreach ($user->comments as $comment)
			<li class="name">{{ $comment->recipe->titel }}</li>
			<li>{{ date('d-m-Y ', strtotime($comment->updated_at)) }}</li>
			<li>{{ $comment->comment}}</li>
			<li>
                <form method="POST" action="{{ route('destroy-comment', $comment->id ) }}">
                    <input class="button blue left" type="submit" value="Verwijder">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    {{ method_field('DELETE') }}
                </form>
            </li>
			<hr>
			@endforeach

	      </ul>
      </div>
    </section>

@endsection
