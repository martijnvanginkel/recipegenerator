@extends('main')

@section('content')
<div id="container">
	

<div class="dropdown">

  <img class="dropbtn" src="img/icons/Profiel.png" alt="Profiel" width="80px">
  <div class="dropdown-content">
    <a href="/home">Home</a>
    <a href="/users">Profiel</a>
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

 <h1>Toegevoegde diëten en allergrieën</h1>
 
	<table class="table table-bordered" >
		<tr>
			<th class="number_table">#</th>
			<th class="diet_allergy_table">Allergieën</th>
			<th></th>
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
			<th></th>
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