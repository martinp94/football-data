@extends('clubs.club-page')


@section('content')

@parent




@section('club-squad')

@php

	$goalkeepers = $squad->filter(function ($person, $key) {
	    return $person->position == 'Goalkeeper';
	});

	$defenders = $squad->filter(function ($person, $key) {
	    return $person->position == 'Defender';
	});

	$midfielders = $squad->filter(function ($person, $key) {
	    return $person->position == 'Midfielder';
	});

	$forwards = $squad->filter(function ($person, $key) {
	    return $person->position == 'Attacker';
	});

	$coaches = $squad->filter(function ($person, $key) {
	    return $person->role == 'COACH';
	});

@endphp

<div class="club-squad">

	<div class="club-squad-player-header">
		<div class="club-squad-header-fullname">
			Igrač
		</div>

		<div class="club-squad-header-image">
			Slika
		</div>

		<div class="club-squad-header-nationality">
			Nacionalnost
		</div>

		<div class="club-squad-header-dateOfBirth">
			Datum rođenja
		</div>

		<div class="club-squad-header-age">
			Starost
		</div>

		<div class="club-squad-header-matches-played">
			Odigrane utakmice
		</div>

		<div class="club-squad-header-goals">
			<img width="20" src="{{ asset('images/icons/football.png') }}" title="Postignuti golovi">
		</div>

		<div class="club-squad-header-yellow-cards">
			<img width="20" src="{{ asset('images/icons/yellow_card.png') }}" title="Žuti kartoni">
		</div>

		<div class="club-squad-header-red-cards">
			<img width="20" src="{{ asset('images/icons/red_card.png') }}" title="Crveni kartoni">
		</div>
	</div>

	
	<div class="club-squad-forward">

		<div class="header"> Napad </div>

		@foreach ($forwards as $player)

			<div class="club-squad-player">

				<div class="club-squad-player-fullname">
					<a href="{{ route('player', $player->uriname) }}"> {{ $player->name }} </a>
				</div>

				<div class="club-squad-player-image">
					
					<img width="32" src="{{ asset('images/players') }}/{{ $player->image }}" alt="Not Found" onerror=this.src="{{ asset('images/players') }}/{{ 'default-avatar.png' }}">
				</div>

				<div class="club-squad-player-nationality">
					{{ $player->nationality }}
				</div>

				<div class="club-squad-player-dateOfBirth">
					{{ $player->dateOfBirth }}
				</div>

				<div class="club-squad-player-age">
					{{ Carbon\Carbon::parse($player->dateOfBirth)->age }}
				</div>

				<div class="club-squad-player-matches-played">
					nepoznato
				</div>

				<div class="club-squad-player-goals">
					nepoznato
				</div>

				<div class="club-squad-player-yellow-cards">
					nepoznato
				</div>

				<div class="club-squad-player-red-cards">
					nepoznato
				</div>
			</div>

		@endforeach
		
	</div>

	<div class="club-squad-midfield">
		<div class="header"> Sredina terena </div>

		@foreach ($midfielders as $player)

			<div class="club-squad-player">

				<div class="club-squad-player-fullname">
					<a href="{{ route('player', $player->uriname) }}"> {{ $player->name }} </a>
				</div>

				<div class="club-squad-player-image">
					
					<img width="32" src="{{ asset('images/players') }}/{{ $player->image }}" alt="Not Found" onerror=this.src="{{ asset('images/players') }}/{{ 'default-avatar.png' }}">
				</div>

				<div class="club-squad-player-nationality">
					{{ $player->nationality }}
				</div>

				<div class="club-squad-player-dateOfBirth">
					{{ $player->dateOfBirth }}
				</div>

				<div class="club-squad-player-age">
					{{ Carbon\Carbon::parse($player->dateOfBirth)->age }}
				</div>

				<div class="club-squad-player-matches-played">
					nepoznato
				</div>

				<div class="club-squad-player-goals">
					nepoznato
				</div>

				<div class="club-squad-player-yellow-cards">
					nepoznato
				</div>

				<div class="club-squad-player-red-cards">
					nepoznato
				</div>
			</div>

		@endforeach
		
	</div>

	<div class="club-squad-defense">
		<div class="header"> Odbrana </div>

		@foreach ($defenders as $player)

			<div class="club-squad-player">

				<div class="club-squad-player-fullname">
					<a href="{{ route('player', $player->uriname) }}"> {{ $player->name }} </a>
				</div>

				<div class="club-squad-player-image">
					
					<img width="32" src="{{ asset('images/players') }}/{{ $player->image }}" alt="Not Found" onerror=this.src="{{ asset('images/players') }}/{{ 'default-avatar.png' }}">
				</div>

				<div class="club-squad-player-nationality">
					{{ $player->nationality }}
				</div>

				<div class="club-squad-player-dateOfBirth">
					{{ $player->dateOfBirth }}
				</div>

				<div class="club-squad-player-age">
					{{ Carbon\Carbon::parse($player->dateOfBirth)->age }}
				</div>

				<div class="club-squad-player-matches-played">
					nepoznato
				</div>

				<div class="club-squad-player-goals">
					nepoznato
				</div>

				<div class="club-squad-player-yellow-cards">
					nepoznato
				</div>

				<div class="club-squad-player-red-cards">
					nepoznato
				</div>
			</div>

		@endforeach

	</div>

	<div class="club-squad-goalkeepers">
		<div class="header"> Golmani </div>

		@foreach ($goalkeepers as $player)

			<div class="club-squad-player">

				<div class="club-squad-player-fullname">
					<a href="{{ route('player', $player->uriname) }}"> {{ $player->name }} </a>
				</div>

				<div class="club-squad-player-image">
					
					<img width="32" src="{{ asset('images/players') }}/{{ $player->image }}" alt="Not Found" onerror=this.src="{{ asset('images/players') }}/{{ 'default-avatar.png' }}">
				</div>

				<div class="club-squad-player-nationality">
					{{ $player->nationality }}
				</div>

				<div class="club-squad-player-dateOfBirth">
					{{ $player->dateOfBirth }}
				</div>

				<div class="club-squad-player-age">
					{{ Carbon\Carbon::parse($player->dateOfBirth)->age }}
				</div>

				<div class="club-squad-player-matches-played">
					nepoznato
				</div>

				<div class="club-squad-player-goals">
					nepoznato
				</div>

				<div class="club-squad-player-yellow-cards">
					nepoznato
				</div>

				<div class="club-squad-player-red-cards">
					nepoznato
				</div>
			</div>

		@endforeach


	</div>

	<div class="club-squad-coach">
		<div class="header"> Treneri </div>

		@foreach ($coaches as $coach)

			<h3 style="color: darkcyan;"> {{ $coach->name }} ({{ $coach->nationality }})</h3>
			

		@endforeach

	</div>

</div>

@stop

@stop