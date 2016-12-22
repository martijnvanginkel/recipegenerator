@extends('main')

@section('content')

	<p>Welkom op je profiel, {{ $user->name }} </p>

	<a href=" {{ route('users.edit', $user->id) }} ">Bewerk profiel</a>

	<h2>Dit zijn jouw dieeten</h2>

  <ul>
	@foreach($user->diets as $diet)
		<li>{{ $diet->titel }}</li>
	@endforeach
  </ul>

	<style>
  .slick-prev:before, .slick-next:before {
    color:red !important;
}
  </style>
  <section id="favorieten">
    <h1>Favorieten</h1>
    <div class="slide-favorieten">


    @foreach($user->recipes as $recipe)
      <div>
        <a href="{{ route('favorites', $recipe->id) }}"><img src="{{ asset('img/' . $recipe->image) }}"></a>
      </div>
    @endforeach

    </div>
  </section>
  <section id="geschiedenis">
    <h1>Geschiedenis</h1>
    <div class="slide-favorieten">
      <div>
        <a href="{{ route('history') }}"><img src="http://placehold.it/400x200"></a>
      </div>
      <div>
        <img src="http://placehold.it/400x200">
      </div>
      <div>
        <img src="http://placehold.it/400x200">
      </div>
      <div>
        <img src="http://placehold.it/400x200">
      </div>
      <div>
        <img src="http://placehold.it/400x200">
      </div>
      <div>
        <img src="http://placehold.it/400x200">
      </div>
      <div>
        <img src="http://placehold.it/400x200">
      </div>
    </div>
  </section>

@endsection