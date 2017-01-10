@extends('main')

@section('content')
<div id="container">
<div id="login-screen" class="panel-body">
	<div class="panel panel-default">
		<div class="panel-body">
		</div>
	</div>

	<form id="form_new_recipe" method="POST" action=" {{ route('foodrestrictions.store') }} " enctype="multipart/form-data">

  		@if (count($errors) > 0)
  			    <div class="alert alert-danger">
  			        <ul>
  			            @foreach ($errors->all() as $error)
  			                <li>{{ $error }}</li>
  			            @endforeach
  			        </ul>
  			    </div>
  		@endif

      <h1>Allergie of Dieet toevoegen</h1>

  		<label name="title">Titel:</label>
  		<input type="text" name="title" id="title">
  		<input name="allergy" type="checkbox" id="allergy" ><label for="allergy" >Allergie</label>
  		<input name="diet" type="checkbox" id="diet" ><label for="diet" >Dieet</label>

  		<input type="submit" value="Voeg toe">

  		<input type="hidden" name="_token" value="{{ Session::token() }}">
  	</form>

  	<a href="{{ route('users.index') }}">Terug</a>

	<table class="table table-bordered" >
		<tr>
			<th>#</th>
			<th>Allergieën</th>
		</tr>

			@foreach ($foodrestrictions->where('allergy', true) as $foodrestriction)
				<tr>
					<td>{{ $foodrestriction->id }}</td>
					<td>{{ $foodrestriction->title }}</td>
					<td><a href="{{ route('foodrestrictions.edit', $foodrestriction->id) }}">Wijzig</a></td>
				</tr>
			@endforeach
	</table>

	<table class="table table-bordered" >
		<tr>
			<th>#</th>
			<th>Diëten</th>
		</tr>

			@foreach ($foodrestrictions->where('diet', true) as $foodrestriction)
				<tr>
					<td>{{ $foodrestriction->id }}</td>
					<td>{{ $foodrestriction->title }}</td>
					<td><a href="{{ route('foodrestrictions.edit', $foodrestriction->id) }}">Wijzig</a></td>
				</tr>
			@endforeach
	</table>



</div>
</div>

@endsection