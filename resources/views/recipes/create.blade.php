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
      <input id="afbeeldingknop" type="file" name="image" accept="image/*"></textarea>
      <label name="title">Titel:</label>
      <input placeholder="Typ hier de titel van dit gerecht" cols="30" rows="5" type="text" name="titel" id="titel"></textarea>
      <label name="ingredienten" for="">Ingrediënten:</label>
      <textarea placeholder="Typ hier de ingrediënten die zijn gebruikt voor dit gerecht" cols="30" rows="5" type="text" name="ingredienten" id="ingredienten" value=""></textarea>
      <label name="bereidingswijze">Bereidingswijze:</label>
      <textarea placeholder="Typ hier hoe dit gerecht klaargemaakt wordt" cols="30" rows="5" type="text" name="bereidingswijze" id="bereidingswijze"></textarea>
      <label name="voedingswaarden" for="">Voedingswaarden:</label>
      <textarea placeholder="Typ hier de voedingswaarden van dit gerecht" cols="30" rows="5" name="voedingswaarden" id="voedingswaarden"></textarea>

      <!-- <label name="allergieen" for="">Allergieën:</label>
      <input type="checkbox" name="allergy_1" value="">
      <input type="checkbox" name="allergy_2" value="">
      <input type="checkbox" name="allergy_3" value="">
      <input type="checkbox" name="allergy_4" value="">
      <input type="checkbox" name="allergy_5" value="">
      <input type="checkbox" name="allergy_6" value=""> -->

      <label name="diet" for="">Dieet:</label>
      @foreach($diets as $diet)
      <input type="checkbox" id="{{$diet->titel}}" value="{{ $diet->id }}" ><label for="{{$diet->titel}}" >{{$diet->titel}}</label>  


  @endforeach

      <input id="toevoegknop" type="submit" value="Voeg recept toe">

      <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>
  </div>
@endsection
