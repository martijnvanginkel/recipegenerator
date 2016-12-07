@extends('main')

@section('content')

	<h1>Recepten toevoegen</h1>

	<form method="POST" action=" {{ route('recipes.store') }} ">
		@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
		@endif
		<label name="title">Titel</label>
		<br>
		<input type="text" name="titel" id="titel">
		<br>
		<label name="ingredienten" for="">Ingrediënten:</label>
		<br>
		<input type="text" name="ingredienten" id="ingredienten" value="">
		<br>
		<label name="bereidingswijze">Bereidingswijze:</label>
		<br>
		<input type="text" name="bereidingswijze" id="bereidingswijze">
		<br>
		<label name="voedingswaarde" for="">Voedingswaarde:</label>
		<br>
		<input name="voedingswaarde" id="voedingswaarde">
		<br>
		<label name="allergieen" for="">Allergieën:</label>
		<br>
		<input type="checkbox" name="allergy_1" value="">
		<input type="checkbox" name="allergy_2" value="">
		<input type="checkbox" name="allergy_3" value="">
		<input type="checkbox" name="allergy_4" value="">
		<input type="checkbox" name="allergy_5" value="">
		<input type="checkbox" name="allergy_6" value="">
		<br>
		<label name="dieet" for="">Dieet:</label>
		<br>

		<input type="checkbox" name="vegan" value="">
		<input type="checkbox" name="vegetarian" value="">
		<br>
		<input type="submit" value="Voeg recept toe">

		<input type="hidden" name="_token" value="{{ Session::token() }}">
	</form>

@endsection
