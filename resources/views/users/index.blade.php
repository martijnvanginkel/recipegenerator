@extends('main')

@section('content')

	<div class="logout">
		<a href="{{ url('/logout') }}"
	    	onclick="event.preventDefault();
	             document.getElementById('logout-form').submit();">
	    			Uitloggen
		</a>

	   <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
	       {{ csrf_field() }}
	   </form>
	</div>

	<div class="admin_menu">
		@if (Auth::user()->admin == 1)
			<a href="{{ route('recipes.index') }}">Recepten</a>
			<a href="{{ route('diets.index') }}">Diëten</a>
		@endif
	</div>

	<header>
		<a href="/home"><img id="logo" src={{asset('img/Sjef_logo.png')}} alt="De Sjef Logo"></a>
		<div class="wrapper">

			<h1>Welkom op je profiel, <em>{{ ucfirst($user->name) }}</em>! </h1>

		    <table class="table table-bordered">
		    <h3>Dit zijn jouw diëten:</h3>
		      @foreach ($user->diets as $diet)
		        <tr>
		        	<td>{{ $diet->titel }}</td>
		          	<td>
				  		<form method="POST" action="{{ route('destroy-diet', $diet->id) }}">
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

		    	<select class="form-control" name="diet_id">
		    	<option selected disabled>Selecteer een dieet</option>
		      	@foreach($notChosenDiets as $diet)
		        	<option value="{{ $diet->id }}"> {{ $diet->titel }} </option>
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

	<section>
	   <div class="comments">
	    <h1>Reactie's</h1>
	      <ul>

	      </ul>
      </div>
    </section>

@endsection
