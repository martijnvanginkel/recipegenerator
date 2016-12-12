@extends('main')

@section('content')
<div class="container">
	<h1>Recepten</h1>
	<div class="panel panel-default">
		<div class="panel-heading">Acties</div>
		<div class="panel-body">
			<a href="{{route('recipes.create')}}" class="btn btn-primary">
				<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Recept Toevoegen!
			</a>
		</div>
	</div>

	<table class="table table-bordered" style="background-color: white">
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
					<td>{{ substr($recipe->ingredienten, 0, 30) }} {{ strlen($recipe->ingredienten) > 30 ? "..." : "" }} </td>
					<td>{{ substr($recipe->bereidingswijze, 0, 30) }} {{ strlen($recipe->bereidingswijze) > 30 ? "..." : "" }}</td>
					<td>{{ substr($recipe->voedingwaarde, 0, 30) }} {{ strlen($recipe->voedingwaarde) > 30 ? "..." : "" }}</td>
					<td><a href=" {{ route('recipes.show', $recipe->id) }} ">Bekijk</a>  </td>
					<td><a href=" {{ route('recipes.edit', $recipe->id) }} ">Wijzig</a></td>
				</tr>
			@endforeach
	</table>
</div>
@endsection