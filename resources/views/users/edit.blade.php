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
      <h1>Jouw dieeten</h1>


  		<label name="diets" for="diets">Dieet:</label>

      <select class="form-control select2-multi" name="diets[]" multiple="multiple">
        @foreach($diets as $diet)
          <option value="{{ $diet->id }}"> {{ $diet->titel }} </option>
        @endforeach
      </select>

  		<input type="submit" value="Voeg dieet toe">

  		<input type="hidden" name="_token" value="{{ Session::token() }}">
  	</form>
  </div>


@endsection