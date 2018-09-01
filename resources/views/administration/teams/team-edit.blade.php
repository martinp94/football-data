@extends('administration.teams.adm-teams')

@section('adm-teams')

@parent


@section('team-edit')

<form method="POST" action="{{ route('team.update', $team->tla) }}" enctype="multipart/form-data">

  @method('PATCH')
  @csrf

  <div class="form-group">
    <label for="name"> Naziv </label>
    <input type="text" name="name" class="form-control" value="{{ $team->name }}" >
    
  </div>

  <div class="form-group">
    <label for="shortname"> Skraćeni naziv </label>
    <input type="text" name="shortname" class="form-control" value="{{ $team->shortname }}" >
  </div>

  <div class="form-group">
    <label for="tla"> TLA </label>
    <input type="text" name="tla" class="form-control" value="{{ $team->tla }}" >
  </div>

  <div class="form-group">
    <label for="address"> Adresa </label>
    <input type="text" name="address" class="form-control" value="{{ $team->address }}" >
  </div>

  <div class="form-group">
    <label for="phone"> Telefon </label>
    <input type="text" name="phone" class="form-control" value="{{ $team->phone }}" >
  </div>

  <div class="form-group">
    <label for="website"> Web sajt </label>
    <input type="text" name="website" class="form-control" value="{{ $team->website }}" >
  </div>

  <div class="form-group">
    <label for="email"> Email </label>
    <input type="email" name="email" class="form-control" value="{{ $team->email }}" >
  </div>

  <div class="form-group">
    <label for="venue"> Stadion </label>
    <input type="text" name="venue" class="form-control" value="{{ $team->venue }}" >
  </div>

  <div class="form-group">
    <label for="founded"> Godina osnivanja </label>
    <input type="text" name="founded" class="form-control" value="{{ $team->founded }}" >
  </div>

  <div class="form-group">
  	<img src="{{ asset("images/club_logos/{$team->image}") }}" alt="">
  </div>
  
  <div class="form-group">
    <label for="image">Promjeni sliku</label>
    <input type="file" name="image" class="form-control-file" />
    <small id="fileHelp" class="form-text text-muted">Dozvoljeni formati: jpg, jpeg, png, bmp</small>
  </div>
  
  <button type="submit" class="btn btn-primary"> Sačuvaj izmjene </button>

</form>

<br>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@stop

@stop