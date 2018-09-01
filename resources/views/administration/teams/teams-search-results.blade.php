@extends('administration.teams.teams-search')

@section('teams-search')

@parent

@section('teams-search-results')

<ul class="list-group">
	@foreach($teams as $team)

		
	  <li class="list-group-item"> 

	  	<div class="row">

	  		<div class="col-md-4">{{ $team->name }} <img width="32" src="{{ asset("images/club_logos/{$team->image}") }}" alt=""></div>

	  		<div class="offset-4">
		  		<span class="badge"> <a href="{{ route('squad.by-team', $team->tla) }}">Postavke</a> </span>
		  	</div>

		  	<div class="offset-1">
		  		<span class="badge"> <a href="{{ route('team.edit', $team->tla) }}">Edituj podatke</a> </span>
		  	</div>

	  	</div>
	  	

	  </li> 


	@endforeach
</ul>

@stop 

@stop