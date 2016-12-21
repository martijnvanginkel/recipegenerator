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

  		<label name="diets[]" for="diets">Dieet:</label>

      <ul>
      @foreach($diets as $diet)
        <li> <input {{ $checked }} name="diets[]" type="checkbox" id="{{$diet->titel}}" value="{{ $diet->id }}" ><label for="{{$diet->titel}}" >{{$diet->titel}}</label> </li>
      @endforeach
      </ul>

      


  		<input type="submit" value="Opslaan">

  		<input type="hidden" name="_token" value="{{ Session::token() }}">


  	</form>
  </div>


@endsection