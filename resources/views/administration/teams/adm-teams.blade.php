@extends('administration.administration')

@section('content')

@parent

@section('adm-teams')



<div class="options">
	<div class="option">
		<a href="{{ route('teams.create.by-country') }}"> Automatsko dodavanje timova po oblastima </a>
	</div>
	<br>
	<div class="option">
		<a href="{{ route('teams.create.by-season') }}"> Automatsko dodavanje timova po takmičenjima i sezonama </a>
	</div>
	<br>
	<div class="option">
		<a href="{{ route('administration.search-teams') }}"> Editovanje timova </a>
	</div>
</div>

<div class="content">
	
	@yield('teams-create')
	@yield('teams-create-by-season')
	@yield('teams-search')
	@yield('team-edit')
	@yield('team-squad')
	@yield('team-player')

</div>

@stop

@stop
