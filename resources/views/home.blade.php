@extends('main')

@section('content')
  <section id="generator">
    <input type="text" name="" value="">
    <button type="button" name="button">GENEREER</button>
  </section>
  <section id="recept">
    <img id="image_recipe" src="http://placehold.it/800x250" alt="" />
    <ol id="ingredients">
      <!-- vanuit PHP -->
      <li>Lorem</li>
      <li>Ipsum</li>
      <li>dolor</li>
    </ol>
    <div id="steps">
      <!-- vanuit PHP -->
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur elementum, lorem id dictum egestas, ex lacus euismod neque, a scelerisque felis est vitae ex. Mauris placerat pulvinar auctor. Morbi purus neque, molestie at fringilla quis, ultricies eu nibh. Mauris ullamcorper aliquet eros ac interdum. Nunc sit amet vulputate leo. Nam lacinia varius tempor. Vivamus sem arcu, aliquam non enim a, facilisis aliquet nunc. In posuere fringilla tempus. Curabitur accumsan neque enim, vestibulum viverra est hendrerit nec. Cras hendrerit lectus vitae turpis mattis dictum. Aliquam cursus quam mi. Proin ullamcorper, sem nec ultrices lacinia, elit nunc facilisis neque, ut molestie nunc est et nunc. Phasellus auctor nibh nec tortor maximus dapibus.

Vestibulum fringilla enim sed mauris accumsan varius. Phasellus commodo leo at sagittis tristique. Curabitur quis ipsum nisl. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus faucibus pharetra erat id placerat. Nulla facilisi. Integer non sagittis purus.</p>
    </div>
    <div id="nutritional_values">
      <!-- vanuit PHP -->
      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
    </div>
  </section>
@endsection
