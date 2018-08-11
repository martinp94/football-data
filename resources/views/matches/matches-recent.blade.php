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


				<div class="competition-fixture">
					<div class="fixture-homeTeam">

						<a href="#">

							{{ App\Team::find($match['homeTeam'])->name }}

						</a>
						
						<img width="20" src="{{ asset('images/club_logos') }}/{{ App\Team::find($match['homeTeam'])->image }}">

					</div>

					<div class="fixture-result"> - : - </div>
					
					<div class="fixture-awayTeam">

						<a href="index.php?club=bayern_munich">
							
							{{ App\Team::find($match['awayTeam'])->name }}

						</a>

						<img width="20" src="{{ asset('images/club_logos') }}/{{ App\Team::find($match['awayTeam'])->image }}">

					</div>

					<div class="fixture-time"> {{ \Carbon\Carbon::parse($match['matchDate'])->addHours(2)->format('H:i')  }} </div>
					<div class="fixture-description"> {{ $match['status'] }}  </div>
				</div>

			@endforeach

		</div>

	@endforeach

</div>

@endsection