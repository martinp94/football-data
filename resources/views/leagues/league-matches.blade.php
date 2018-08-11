@extends('leagues.league-page')

@section('content')

@parent

@section('league-matches')

<h1>{{ $season->id }}</h1>

@php
	$fixturesByMatchday = [];
@endphp

@foreach ($season->fixtures as $key => $fixture)
	
	@php
		$fixturesByMatchday[$fixture['matchday']][] = $fixture;
	@endphp

@endforeach

@foreach ($fixturesByMatchday as $matchday => $fixtures)

<div class="league-matches">

	<div class="league-round">

		<div class="league-round-header">Kolo {{ $matchday }}</div>

		@foreach ($fixtures as $fixture)
			
			@php
				$result = "";

				if($fixture->status == 'FINISHED' || $fixture->status == null)
					$result = $fixture->details->homeTeamFT . " : " . $fixture->details->awayTeamFT;
				else if($fixture->status == 'SCHEDULED')
					$result = " - : - ";

				$date = " - ";
				$hours = " - ";

				if($fixture->date)
				{
					$date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $fixture->date)->format('d-m-Y');

					$hours = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $fixture->date)->addHours(2)->format('H:i');

					if($hours == '02:00')
						$hours = " - ";
				}

				

			@endphp

			<div class="league-fixture">
				<div class="league-fixture-team1"> <a href="{{ route('club', ['tla' => $fixture->teamHome->tla]) }}"> {{ $fixture->teamHome->name }} </a> <img width="20" src="{{ asset('images/club_logos') }}/{{ $fixture->teamHome->image }}"> </div>
				<div class="league-fixture-result"> <strong> {{ $result }} </strong>  </div>
				<div class="league-fixture-team2"> <a href="{{ route('club', ['tla' => $fixture->teamAway->tla]) }}"> {{ $fixture->teamAway->name }} </a> <img width="20" src="{{ asset('images/club_logos') }}/{{ $fixture->teamAway->image }}"> </div>
				<div class="league-fixture-date"> {{ $date }} </div>
				<div class="league-fixture-time"> {{ $hours }} </div>
			</div>


		@endforeach

		



	</div>

</div>

@endforeach


@stop

@stop
