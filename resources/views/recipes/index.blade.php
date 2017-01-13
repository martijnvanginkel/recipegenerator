@extends('main')

@section('content')
<div class="container_index">
		<a href="{{ route('users.index') }}">
		<button class="button back">
			<img src="img/icons/back.png" alt="Terug">
		</button>
	</a>

 <div class="dropdown">

  <img class="dropbtn" src="img/icons/Menu.png" alt="Menu" width="50px">
  <div class="dropdown-content">
    <a href="/home">Home</a>
    <a href="/users">Profiel</a>
    @if (Auth::user()->admin == 1)
      <a href="{{ route('recipes.index') }}">Recepten</a>
      <a href="{{ route('foodrestrictions.index') }}">Diëten en allergieën</a>
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
	<h1>Recepten</h1>



	<a href="{{route('recipes.create')}}">
		<button class="button" value="Recept toevoegen">Recept toevoegen</button>
	</a>


	<table class="table table-bordered">
		<tr>
			<th>#</th>
			<th>Titel</th>
			<th>Ingrediënten</th>
			<th>Bereidingswijze</th>
			<th>Voedingswaarde</th>
			<th></th>
			<th></th>
		</tr>

			@foreach ($recipes as $recipe)

				<tr>
					<td>{{ $recipe->id }}</td>
					<td>{{ substr($recipe->titel, 0, 30) }} {{ strlen($recipe->titel) > 30 ? "..." : "" }}</td>
					<td> 
						<ul>
						@foreach($ingredients->where('recipe_id', $recipe->id) as $ingredient)
							<li>
								{{ $ingredient->ingredient }}  {{ strlen($ingredient->ingredient) > 30 ? "..." : "" }}
							</li>
						@endforeach
						</ul>
					</td>		
					<td>{{ substr($recipe->bereidingswijze, 0, 30) }} {{ strlen($recipe->bereidingswijze) > 30 ? "..." : "" }}</td>
					<td> 
						<ul>
							<li>Energie: {{ $recipe->energie }}</li>
							<li>Eiwit: {{ $recipe->eiwit }}</li>
							<li>Koolhydraten: {{ $recipe->Koolhydraten }}</li>
							<li>Vet: {{ $recipe->vet }}</li>
							<li>Voedingsvezel: {{ $recipe->voedingsvezel }}</li>
							<li>Natrium: {{ $recipe->natrium }} </li>
						</ul> 
					</td>
					<td><a href=" {{ route('recipes.show', $recipe->id) }} ">Bekijk</a>  </td>
					<td><a href=" {{ route('recipes.edit', $recipe->id) }} ">Wijzig</a></td>
				</tr>
			@endforeach
	</table>
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
