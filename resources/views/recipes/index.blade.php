@extends('main')

@section('content')
<div class="container_index">
	<h1>Recepten</h1>

	<a href="{{ route('users.index') }}">
		<button class="button back">
			<img src="img/icons/back.png" alt="Terug">
		</button>
	</a>

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
					<td>{{ substr($recipe->voedingwaarde, 0, 30) }} {{ strlen($recipe->voedingwaarde) > 30 ? "..." : "" }}</td>
					<td><a href=" {{ route('recipes.show', $recipe->id) }} ">Bekijk</a>  </td>
					<td><a href=" {{ route('recipes.edit', $recipe->id) }} ">Wijzig</a></td>
				</tr>
			@endforeach
	</table>
</div>
@endsection
