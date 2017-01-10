@extends('main')

@section('content')

<form method="POST" action="{{ route('foodrestrictions.update', $foodrestriction->id) }}">
      
    <label for="title">Titel</label>
    <br>
    <textarea type="text" id="title" name="title" rows="1" style="resize:none;">{{ $foodrestriction->title }}</textarea>

  <button type="submit">Opslaan</button>
  
    
    <input type="hidden" name="_token" value="{{ Session::token() }}">
    {{ method_field('PUT') }}

</form>﻿


<form method="POST" action="{{ route('foodrestrictions.destroy', $foodrestriction->id) }}">
    <input type="submit" value="Delete">
    <input type="hidden" name="_token" value="{{ Session::token() }}">
   {{ method_field('DELETE') }}

   <a href=" {{ route('foodrestrictions.index') }} ">Terug</a>
</form>﻿



@endsection