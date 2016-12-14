@extends('main')

@section('content')

<form method="POST" action="{{ route('diets.update', $diet->id) }}">
      
    <label for="titel">Titel</label>
    <br>
    <textarea type="text" id="titel" name="titel" rows="1" style="resize:none;">{{ $diet->titel }}</textarea>
    <br>
    
	<button type="submit">Opslaan</button>
	<br>
    
    <input type="hidden" name="_token" value="{{ Session::token() }}">
    {{ method_field('PUT') }}

</form>﻿

<form method="POST" action="{{ route('diets.destroy', $diet->id) }}">
    <input type="submit" value="Delete">
    <input type="hidden" name="_token" value="{{ Session::token() }}">
   {{ method_field('DELETE') }}

   <a href=" {{ route('diets.index', $diet->id) }} ">Terug</a>
</form>﻿

@endsection