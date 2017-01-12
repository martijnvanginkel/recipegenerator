@extends('main')

@section('content')
<div id="container">
	<div class="panel panel-default">
		<div class="panel-body">
		</div>
	</div>


	<form class="forms" method="POST" action=" {{ route('foodrestrictions.store') }} " enctype="multipart/form-data">

  		@if (count($errors) > 0)
  			    <div class="alert alert-danger">
  			        <ul>
  			            @foreach ($errors->all() as $error)
  			                <li>{{ $error }}</li>
  			            @endforeach
  			        </ul>
  			    </div>
  		@endif

      <h1>Dieet of allergie toevoegen</h1>

  		<label name="title">Titel:</label>
  		<input placeholder="Typ hier het dieet of de allergie" type="text" name="title" id="title"></input>
  		<input name="allergy" type="checkbox" id="allergy" ><label for="allergy" >Allergie</label>
  		<input name="diet" type="checkbox" id="diet" ><label for="diet" >Dieet</label>

  		<input id="toevoegknop" type="submit" value="Voeg toe">

  		<input type="hidden" name="_token" value="{{ Session::token() }}">
  	 	<a href="{{ route('users.index') }}">Terug</a>

  	 	</form>

 

<div class="container_index_diet_or_allergy">

	<table class="table table-bordered" >
		<tr>
			<th class="number_table">#</th>
			<th class="diet_allergy_table">Allergieën</th>
		</tr>

			@foreach ($foodrestrictions->where('allergy', true) as $foodrestriction)
				<tr>
					<td>{{ $foodrestriction->id }}</td>
					<td>{{ $foodrestriction->title }}</td>
					<td class="edit_table"><a href="{{ route('foodrestrictions.edit', $foodrestriction->id) }}">Wijzig</a></td>
				</tr>
			@endforeach
	</table>
</div>

<div class="container_index_diet_or_allergy">
	<table class="table table-bordered" >
		<tr>
			<th class="number_table">#</th>
			<th class="diet_allergy_table">Diëten</th>
		</tr>

			@foreach ($foodrestrictions->where('diet', true) as $foodrestriction)
				<tr>
					<td>{{ $foodrestriction->id }}</td>
					<td>{{ $foodrestriction->title }}</td>
					<td class="edit_table"><a href="{{ route('foodrestrictions.edit', $foodrestriction->id) }}">Wijzig</a></td>
				</tr>
			@endforeach
	</table>
</div>

</div>


@endsection