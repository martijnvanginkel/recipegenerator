@extends('main')

@section('content')
<div class="container">
  <h1>Dieeten</h1>
  <div class="panel panel-default">
    <div class="panel-body">
    </div>
  </div>

  <table class="table table-bordered" style="background-color: white">
    <tr>
      <th>#</th>
      <th>Titel</th>
      <th></th>
    </tr>

      @foreach ($diets as $diet)
        <tr>
          <td>{{ $diet->id }}</td>
          <td>{{ $diet->titel }}</td>
        <td><a href=" {{ route('diets.edit', $diet->id) }} ">Wijzig</a></td>
        </tr>
      @endforeach

  </table>
</div>

  <div id="container">
    <form id="form_new_recipe" method="POST" action=" {{ route('diets.store') }} " enctype="multipart/form-data">

      @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
      @endif
      <h1>Dieet toevoegen!</h1>

      <label name="title">Titel</label>
      <input type="text" name="titel" id="titel"></textarea>

      <input type="submit" value="Voeg dieet toe"> 

      <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>
  </div>



@endsection