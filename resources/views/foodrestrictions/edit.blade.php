@extends('main')

@section('content')
<div id="container">
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

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-90330521-1', 'auto');
  ga('send', 'pageview');

</script>



@endsection