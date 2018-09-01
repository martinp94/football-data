@extends('administration.teams.adm-teams')

@section('adm-teams')

@parent


@section('team-player')

<form method="POST" action="{{ route('persons.update', $person->id) }}" enctype="multipart/form-data">

  @method('PATCH')
  @csrf

  <div class="form-group">
    <label for="name"> Ime i prezime </label>
    <input type="text" name="name" class="form-control" value="{{ $person->name }}" >
    
  </div>

  <div class="form-group">
    <label for="position"> Pozicija </label>

    @php
    	$positions = collect(['Attacker', 'Midfielder', 'Defender', 'Goalkeeper'])->filter(function($pos) use($person) {
    		return $pos != $person->position;
    	});
    @endphp

    <select name="position" class="form-control">
    	<option value="{{ $person->position }}"> {{ $person->position }} </option>
    	@foreach($positions as $position)
    		<option value="{{ $position }}"> {{ $position }} </option>
    	@endforeach
    </select>

    
  </div>

  <div class="form-group">
    <label for="nationality"> Nacionalnost </label>
    <input type="text" name="nationality" class="form-control" value="{{ $person->nationality }}" >
    
  </div>

  <div class="form-group">
  	<img src="{{ asset("images/players/{$person->image}") }}" alt="">
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