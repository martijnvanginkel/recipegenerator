@extends('main')

@section('content')

<h1>edit pagina</h1>
<form method="POST" action="{{ route('comments-update', $comment->id) }}" enctype="multipart/form-data">

	<textarea name="comment" id="comment" rows="8" cols="80">{{ $comment->comment }}</textarea><br>

	<button type="submit">Opslaan</button>
	<br>

	<input type="hidden" name="_token" value="{{ Session::token() }}">
    {{ method_field('put') }}
</form>﻿

@endsection