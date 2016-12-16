@extends('main')

@section('content')

	<p>Welkom op je profiel, {{ $user->name }}</p>

	<a href=" {{ route('users.edit', $user->id) }} ">Bewerk profiel</a>

	<h2>Dit zijn jouw dieeten</h2>

	@foreach($user->diets as $diet)
		<span>{{ $diet->titel }}</span>
	@endforeach



	<style>
  .slick-prev:before, .slick-next:before {
    color:red !important;
}
  </style>
  <section id="favorieten">
    <h1>Favorieten</h1>
    <div class="slide-favorieten">
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
      <div>
        <img src="http://placehold.it/400x200">
      </div>
    </div>
  </section>
  <section id="geschiedenis">
    <h1>Geschiedenis</h1>
    <div class="slide-favorieten">
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
      <div>
        <img src="http://placehold.it/400x200">
      </div>
    </div>
  </section>

@endsection