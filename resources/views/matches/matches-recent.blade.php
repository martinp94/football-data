@extends('layouts.app')

@section('content')


<div class="matches-recent">

	<div class="matches-header">
		@php

			/*$days = [];

			$today = \Carbon\Carbon::today();*/
				
			/*$days[] = $today;

			$temp = [$today];

			for($i = 0; $i < 7; $i ++)
			{
				echo $temp[$i]->format('d.m') . '<br>';
				$temp[] = $temp[$i]->addDay();
			}*/

		@endphp
	</div>

	@php
		
		$matchesByLeagues = $matches->mapToGroups(function ($match, $key) {
		    return [$match->competition_name => [
		    	'id' => $match->id,
		    	'homeTeam' => $match->homeTeam,
	    		'awayTeam' => $match->awayTeam,
	    		'matchDate' => $match->date,
	    		'status' => $match->status
		    	
		    ]];
		});

	@endphp
	
	@foreach($matchesByLeagues as $competitionName => $matches)

		
		<div class="matches-competition">
			<div class="matches-competition-header">
				{{ $competitionName }}
			</div>

			@foreach($matches as $match)

				@php 
					$matchDetails = App\FixtureDetails::where('fixture_id', '=', $match['id'])->first();
					$homeTeam = App\Team::find($match['homeTeam']);
					$awayTeam = App\Team::find($match['awayTeam']);
				@endphp

				<div id="{{ $match['id'] }}" class="competition-fixture">

					<div class="minute">
						{{ \Carbon\Carbon::parse($match['matchDate'])->addHours(2)->format('H:i') }}
					</div>

					<div class="fixture-homeTeam">

						<a href="{{ route('club', ['tla' => $homeTeam->tla]) }}">

							{{ $homeTeam->name }}

						</a>
						
						<img width="20" src="{{ asset('images/club_logos') }}/{{ App\Team::find($match['homeTeam'])->image }}">

					</div>

					<div class="fixture-result"> {{ $matchDetails->homeTeamFT }} : {{ $matchDetails->awayTeamFT }} </div>
					
					<div class="fixture-awayTeam">

						<a href="{{ route('club', ['tla' => $awayTeam->tla]) }}">
							
							{{ $awayTeam->name }}

						</a>

						<img width="20" src="{{ asset('images/club_logos') }}/{{ App\Team::find($match['awayTeam'])->image }}">

					</div>

					<div class="fixture-time"> {{ \Carbon\Carbon::parse($match['matchDate'])->addHours(2)->format('d.m.Y') }} </div>
					<div class="fixture-description"> {{ $match['status'] }}  </div>
				</div>

			@endforeach

		</div>

	@endforeach

<script src="{{ asset('js/fixtures.js') }}"></script>

</div>

@endsection