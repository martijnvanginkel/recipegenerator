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


<form id="forms" method="POST" action="{{ route('foodrestrictions.update', $foodrestriction->id) }}">
      
     <a href="{{ route('users.index') }}">
    <button class="button back">
      <img src="img/icons/back.png" alt="Terug">
    </button>
  </a>



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

</form>﻿
</form>﻿

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