@extends('layouts.app')

@section('content')

<div id="player{{ $player->uriname }}" class="player-info">

	<div class="player-image">
		
		<img width="128" src="{{ asset('images/players') }}/{{ $player->image }}" alt="Not Found" onerror=this.src="{{ asset('images/players') }}/{{ 'default-avatar.png' }}">
	</div>

	<div class="player-fullname-birthyear">
		<h1> <strong> {{ $player->name }} ({{ $player->nationality }}) </strong> </h1>
		<h2>(24.6.1987)</h2>
	</div>

	<div class="player-position">


		<h1>
			<strong>
			
			@if($player->position == 'Attacker')
				<img width="128" src="{{ asset('images/positions/attacker.png') }}" title="{{ $player->position }}">
			@elseif($player->position == 'Midfielder')
				<img width="128" src="{{ asset('images/positions/midfielder.png') }}" title="{{ $player->position }}"> 
			@elseif($player->position == 'Defender')
				<img width="128" src="{{ asset('images/positions/defender.png') }}" title="{{ $player->position }}">
			@elseif($player->position == 'Goalkeeper')
				<img width="128" src="{{ asset('images/positions/goalkeeper.png') }}" title="{{ $player->position }}">
			@endif


			</strong>
		</h1>
		
	</div>

	<div class="player-club">
		
		@foreach ($player->teams as $team)
		
			<img width="128" src="{{ asset('images/club_logos/') . '/' . $team->image }}" title="{{ $team->name }}">
		
		@endforeach
		
	</div>

	
</div>

@endsection