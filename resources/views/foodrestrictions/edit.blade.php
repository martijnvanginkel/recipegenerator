@extends('main')

@section('content')
<div id="container">

<div class="dropdown">

  <img class="dropbtn" src="img/icons/Profiel.png" alt="Profiel" width="80px">
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



<form id="forms" method="POST" action="{{ route('foodrestrictions.update', $foodrestriction->id) }}">
      
          <h1 id="head">Dieet of allergie wijzigen</h1>

    <label name="title">Titel:</label>
    

    <textarea placeholder="Typ hier de titel van dit gerecht" type="text" id="titel" name="titel" rows="1" style="resize:none;">{{ $foodrestriction->title }}</textarea>

  <button id="save-button" type="submit">Opslaan</button>
  
    
    <input type="hidden" name="_token" value="{{ Session::token() }}">
    {{ method_field('PUT') }}


<form method="POST" action="{{ route('foodrestrictions.destroy', $foodrestriction->id) }}">
    <input type="submit" value="Delete">
    <input type="hidden" name="_token" value="{{ Session::token() }}">
   {{ method_field('DELETE') }}

   <a href=" {{ route('foodrestrictions.index') }} ">Terug</a>
</form>﻿
</form>﻿

</div>





@endsection