@extends('main')

@section('content')


<div id="container">

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
    <textarea placeholder="Typ hier de titel van dit gerecht" rows="1" type="text" name="titel" id="titel"></textarea>

  <label>Ingrediënten:</label>
  <textarea name="ingredienten[]"" placeholder="Ingrediënt 1" rows="1" type="text" name="energie" id="energie"></textarea> 
  <textarea name="ingredienten[]"" placeholder="Ingrediënt 2" rows="1" type="text" name="energie" id="energie"></textarea> 
  <textarea name="ingredienten[]"" placeholder="Ingrediënt 3" rows="1" type="text" name="energie" id="energie"></textarea> 
  <textarea name="ingredienten[]"" placeholder="Ingrediënt 4" rows="1" type="text" name="energie" id="energie"></textarea> 
  <textarea name="ingredienten[]"" placeholder="Ingrediënt 5" rows="1" type="text" name="energie" id="energie"></textarea> 
  <textarea name="ingredienten[]"" placeholder="Ingrediënt 6" rows="1" type="text" name="energie" id="energie"></textarea> 
  <textarea name="ingredienten[]"" placeholder="Ingrediënt 7" rows="1" type="text" name="energie" id="energie"></textarea> 
  <textarea name="ingredienten[]"" placeholder="Ingrediënt 8" rows="1" type="text" name="energie" id="energie"></textarea> 
  <textarea name="ingredienten[]"" placeholder="Ingrediënt 9" rows="1" type="text" name="energie" id="energie"></textarea> 
  <textarea name="ingredienten[]"" placeholder="Ingrediënt 10" rows="1" type="text" name="energie" id="energie"></textarea> 
  <textarea name="ingredienten[]"" placeholder="Ingrediënt 11" rows="1" type="text" name="energie" id="energie"></textarea> 
  <textarea name="ingredienten[]"" placeholder="Ingrediënt 12" rows="1" type="text" name="energie" id="energie"></textarea> 
  <textarea name="ingredienten[]"" placeholder="Ingrediënt 13" rows="1" type="text" name="energie" id="energie"></textarea> 
  <textarea name="ingredienten[]"" placeholder="Ingrediënt 14" rows="1" type="text" name="energie" id="energie"></textarea> 


  <label name="bereidingswijze">Bereidingswijze:</label>
    <textarea placeholder="Ingrediënt 14" rows="1" type="text" name="energie" id="energie"></textarea> 

  <label name="energie" for="">Energie:</label>
    <textarea placeholder="Typ hier de voedingswaarden van dit gerecht" rows="5" name="energie" id="energie"></textarea>

      <label name="eiwit" for="">Eiwit:</label>
    <textarea placeholder="Typ hier de voedingswaarden van dit gerecht" rows="5" name="eiwit" id="eiwit"></textarea>

      <label name="koolhydraten" for="">Koolhydraten:</label>
    <textarea placeholder="Typ hier de voedingswaarden van dit gerecht" rows="5" name="koolhydraten" id="koolhydraten"></textarea>

      <label name="vet" for="">Vet:</label>
    <textarea placeholder="Typ hier de voedingswaarden van dit gerecht" rows="5" name="vet" id="vet"></textarea>

      <label name="voedingsvezel" for="">Voedingsvezel:</label>
    <textarea placeholder="Typ hier de voedingswaarden van dit gerecht" rows="5" name="voedingsvezel" id="voedingsvezel"></textarea>

      <label name="natrium" for="">Natrium:</label>
    <textarea placeholder="Typ hier de voedingswaarden van dit gerecht" rows="5" name="natrium" id="natrium"></textarea>

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


    <a href=" {{ route('recipes.index') }} ">Terug</a>
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
