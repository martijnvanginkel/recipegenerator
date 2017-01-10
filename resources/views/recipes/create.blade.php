@extends('main')

@section('content')


<div id="container">
  <form id="forms" method="POST" action=" {{ route('recipes.store') }} " enctype="multipart/form-data">

  @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
  @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
  @endforeach
      </ul>
    </div>
  @endif


<h1 id="head">Recepten toevoegen</h1>
  <label for="">Afbeelding:</label>
    <label class="afbeeldingknop" id="afbeeldingknop">
    Afbeelding uploaden
      <input type="file" name="image" accept="image"/>
    </label>

  <label name="title">Titel:</label>
    <textarea placeholder="Typ hier de titel van dit gerecht" rows="2" type="text" name="titel" id="titel"></textarea>

  <label name="ingredienten" for="">Ingrediënten:</label>
    <textarea placeholder="Typ hier de ingrediënten die zijn gebruikt voor dit gerecht" rows="5" type="text" name="ingredienten" id="ingredienten" value=""></textarea>

  <label name="bereidingswijze">Bereidingswijze:</label>
    <textarea placeholder="Typ hier hoe dit gerecht klaargemaakt wordt" rows="5" type="text" name="bereidingswijze" id="bereidingswijze"></textarea>

  <label name="voedingswaarde" for="">Voedingswaarden:</label>
    <textarea placeholder="Typ hier de voedingswaarden van dit gerecht" rows="5" name="voedingswaarde" id="voedingswaarde"></textarea>

  <label name="foodrestrictions[]" for="foodrestrictions">Dit recept past binnen de volgende allergieën:</label>

    <ul>
  @foreach($foodrestrictions->where('allergy', true) as $foodrestriction)
      <li> <input name="foodrestrictions[]" type="checkbox" id="{{$foodrestriction->title}}" value="{{ $foodrestriction->id }}" ><label for="{{$foodrestriction->title}}" >{{$foodrestriction->title}}</label> </li>
  @endforeach
    </ul>

    <label name="foodrestrictions[]" for="foodrestrictions">Dit recept past binnen de volgende diëten:</label>

    <ul>
  @foreach($foodrestrictions->where('diet', true) as $foodrestriction)
      <li> <input name="foodrestrictions[]" type="checkbox" id="{{$foodrestriction->title}}" value="{{ $foodrestriction->id }}" ><label for="{{$foodrestriction->title}}" >{{$foodrestriction->title}}</label> </li>
  @endforeach
    </ul>

    <input id="toevoegknop" type="submit" value="Voeg toe">

    <input type="hidden" name="_token" value="{{ Session::token() }}">
  </form>
</div>

      <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>

    <a href=" {{ route('recipes.index') }} ">Terug</a>
  </div>

@endsection
