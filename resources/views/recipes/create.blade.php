@extends('main')

@section('content')


  <div id="container">
    <form id="form_new_recipe" method="POST" action=" {{ route('recipes.store') }} " enctype="multipart/form-data">

      @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
      @endif
      <h1>Recepten toevoegen</h1>
      <label for="">Afbeelding:</label>
      <label class="afbeeldingknop" id="afbeeldingknop">
    Klik hier om een afbeelding te uploaden
    <input type="file" name="image" accept="image"/>
      </label>
      <label name="title">Titel:</label>
      <textarea placeholder="Typ hier de titel van dit gerecht" cols="30" rows="2" type="text" name="titel" id="titel"></textarea>
      <label name="ingredienten" for="">Ingrediënten:</label>
      <textarea placeholder="Typ hier de ingrediënten die zijn gebruikt voor dit gerecht" cols="30" rows="5" type="text" name="ingredienten" id="ingredienten" value=""></textarea>
      <label name="bereidingswijze">Bereidingswijze:</label>
      <textarea placeholder="Typ hier hoe dit gerecht klaargemaakt wordt" cols="30" rows="5" type="text" name="bereidingswijze" id="bereidingswijze"></textarea>
      <label name="voedingswaarde" for="">Voedingswaarden:</label>
      <textarea placeholder="Typ hier de voedingswaarden van dit gerecht" cols="30" rows="5" name="voedingswaarde" id="voedingswaarde"></textarea>

      <label name="diets[]" for="diets">Dit recept past binnen de volgende dieeten:</label>

        <ul>
      @foreach($diets as $diet)
        <li> <input name="diets[]" type="checkbox" id="{{$diet->titel}}" value="{{ $diet->id }}" ><label for="{{$diet->titel}}" >{{$diet->titel}}</label> </li>
        @endforeach
      </ul>

      <label name="allergies[]" for="allergies">Dit recept bevat: (en kan iemand met deze allergieën dus niet maken)</label>

        <ul>
      @foreach($allergies as $allergy)
        <li> <input name="allergies[]" type="checkbox" id="{{$allergy->titel}}" value="{{ $allergy->id }}" ><label for="{{$allergy->titel}}" >{{$allergy->titel}}</label> </li>
        @endforeach
      </ul>



      <input id="toevoegknop" type="submit" value="Klik hier om het recept toe te voegen">

      <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>
  </div>
@endsection
