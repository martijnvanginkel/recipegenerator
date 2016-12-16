@extends('main')

@section('content')

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



      <form id="form_new_recipe" method="POST" action=" {{ route('recipes.store') }} " enctype="multipart/form-data">

      @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
      @endif
  
      <label name="diets" for="diets">Dieet:</label>

      <select class="form-control select2-multi" name="diets[]" multiple="multiple">
        @foreach($diets as $diet)
          <option value="{{ $diet->id }}"> {{ $diet->titel }} </option>
        @endforeach
      </select>

      <input type="submit" value="Voeg recept toe">

      <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>

@endsection
