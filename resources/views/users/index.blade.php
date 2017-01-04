@extends('main')

@section('content')

	<header>

		<a href="/home"><img id="logo" src={{asset('img/Sjef_logo.png')}} alt="De Sjef Logo"></a>
		<div class="wrapper">
			<h1>Welkom op je profiel, <em>{{ ucfirst($user->name) }}</em>! </h1>
			<!-- <a href=" {{ route('users.edit', $user->id) }} ">Hier kan je je instellingen wijzigen</a> -->

	    <table class="table table-bordered">

	    <h3>Dit zijn jouw dieeten:</h3>

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

	      @foreach($diets as $diet)

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


    @foreach($user->recipes as $recipe)
      <div>
        <a href="{{ route('favorites', $recipe->id) }}"><img src="{{ asset('img/' . $recipe->image) }}"></a>
      </div>
    @endforeach

    </div>
  </section>
  <section id="geschiedenis">
    <h1>Recent bekeken</h1>
    <div class="slide-favorieten">

    @foreach($user->histories->reverse() as $history)
    	<a href=""><img src="{{ asset('img/' . $history->image) }}"></a>
    @endforeach
 
    </div>
  </section>

@endsection
