@extends('administration.teams.adm-teams')

@section('adm-teams')

@parent


@section('team-squad')

<form method="POST" action="{{ route('squad.update', $team_id) }}">

	@csrf
	@method('put')
	
	<button class="btn btn-primary"> Automatsko ažuriranje igrača </button>
</form>

<br>
<br>

<table class="table table-hover">
  <thead class="text-center">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Igrač</th>
      <th scope="col">Pozicija</th>
      <th scope="col">Opcije</th>
    </tr>
  </thead>
  <tbody class="text-center">
  	@foreach($squad as $index => $player)

  	
  	<tr>

      <th scope="row">{{ $index + 1 }}</th>

      <td>{{ $player->name }} <img width="32" src="{{ asset('images/players') }}/{{ $player->image }}" alt="" onerror=this.src="{{ asset('images/players') }}/{{ 'default-avatar.png' }}"></td>

      <td>{{ $player->position }}</td>

      <td> <a href="{{ route('persons.edit', $player->person_id) }}"> Edituj </a> </td>

	</tr>

  
    
    @endforeach
    
  </tbody>
</table>

@if(\Session::has('errorMsg'))
	<div class="container-fluid alert alert-danger">
        <p>{{ \Session::get('errorMsg') }}</p>
    </div>
	
@endif

@if(\Session::has('successMsg'))
	<div class="container-fluid alert alert-success">
        <p>{{ \Session::get('successMsg') }}</p>
    </div>
	
@endif

@stop

@stop