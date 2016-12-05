@extends('main')

@section('content')
<div class="container">
	<h1>Recepten</h1>
	<div class="panel panel-default">
		<div class="panel-heading">Acties</div>
		<div class="panel-body">
			<a href=" " class="btn btn-primary">
				<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Recept Toevoegen!!!
			</a>
		</div>
	</div>

	<table class="table table-bordered" style="background-color: white">
		<tr>
			<th>#</th>
			<th>titel</th>
			<th>ingredienten</th>
			<th>bereidingswijze</th>
			<th>voedingwaarde</th>
		</tr>

			@foreach ($recipes as $recipe)
				<tr>
					<td>{{ $recipe->id }}</td>
					<td>{{ $recipe->titel }}</td>
					<td>{{ $recipe->ingredienten }}</td>
					<td>{{ $recipe->bereidingswijze }}</td>
					<td>{{ $recipe->voedingswaarde }}</td>
				</tr>
			@endforeach
	</table>
</div>
@endsection