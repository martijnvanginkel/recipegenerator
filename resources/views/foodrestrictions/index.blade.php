@extends('main')

@section('content')
<div id="container">
	

<div class="dropdown">

  <img class="dropbtn" src="img/icons/Menu.png" alt="Profiel" width="50px">
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


  		<input type="hidden" name="_token" value="{{ Session::token() }}">
  	 	<a href="{{ route('users.index') }}"><img src={{asset('img/icons/back.png')}}  class="go_back_button" ></a>


      <h1>Dieet of allergie toevoegen</h1>

  		<label name="title">Titel:</label>
  		<input placeholder="Typ hier het dieet of de allergie" type="text" name="title" id="title"></input>
  		<input name="allergy" type="checkbox" id="allergy" ><label for="allergy" >Allergie</label>
  		<input name="diet" type="checkbox" id="diet" ><label for="diet" >Dieet</label>

  		<input id="toevoegknop" type="submit" value="Voeg toe">


  	 	</form>

 


<div class="container_index_diet_or_allergy">

 <h1>Toegevoegde diëten en allergieën</h1>

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

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-90330521-1', 'auto');
  ga('send', 'pageview');

</script>

@endsection