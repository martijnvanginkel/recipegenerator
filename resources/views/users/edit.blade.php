@extends('main')

@section('content')

  <div id="container">
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
      <h1>Jouw recepten</h1>


  		<label name="diets[]" for="diets">Dieet:</label>

        <ul>
      @foreach($diets as $diet)
        <li> <input name="diets[]" type="checkbox" id="{{$diet->titel}}" value="{{ $diet->id }}" ><label for="{{$diet->titel}}" >{{$diet->titel}}</label> </li>
        @endforeach
      </ul>

  		<input type="submit" value="Voeg dieet toe">

  		<input type="hidden" name="_token" value="{{ Session::token() }}">

      <p>{{ $recipes->titel }}</p>
      {{-- <h1>Jouw favo's</h1>


      <label name="recipes[]" for="recipes">Dieet:</label>

        <ul>
      @foreach($recipes as $recipe)
        <li> <input name="recipes[]" type="checkbox" id="{{$recipe->titel}}" value="{{ $recipe->id }}" ><label for="{{$recipe->titel}}" >{{$recipe->titel}}</label> </li>
        @endforeach
      </ul>

      <input type="submit" value="Voeg favoriet toe">

      <input type="hidden" name="_token" value="{{ Session::token() }}"> --}}
  	</form>
  </div>


@endsection