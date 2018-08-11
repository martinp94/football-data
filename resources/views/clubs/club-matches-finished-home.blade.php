@foreach($finishedHome as $fixture)

	@php
		$date = " - ";
		$hours = " - ";

		if($fixture->date)
		{
			$date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $fixture->date)->format('d-m-Y');

			$hours = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $fixture->date)->addHours(2)->format('H:i');

			if($hours == '02:00')
				$hours = " - ";
		}

		$seasonStartYear = Carbon\Carbon::createFromFormat('Y-m-d', $fixture->season->startDate)->year;
			$seasonEndYear = Carbon\Carbon::createFromFormat('Y-m-d', $fixture->season->endDate)->year;

			$seasonYears = $seasonStartYear . '/' . $seasonEndYear;

		$result = $fixture->details->homeTeamFT . " : " . $fixture->details->awayTeamFT;

	@endphp

	<div class="competition-fixture league">
		<div class="fixture-team1">

			<a href="#">{{ $fixture->teamHome->name }}</a>
			<img width="32" src="{{ asset('images/club_logos/') . '/' . $fixture->teamHome->image }}" alt="Not Found" onerror=this.src="{{ asset('images/club_logos/unknown.png') }}">
		</div>

		<div class="fixture-result"> {{ $result }} </div>

		<div class="fixture-team2">
			
			<a href="#">{{ $fixture->teamAway->name }}</a>
			<img width="32" src="{{ asset('images/club_logos/') . '/' . $fixture->teamAway->image }}" alt="Not Found" onerror=this.src="{{ asset('images/club_logos/unknown.png') }}">
		</div>
		<div class="fixture-date"> {{ $date }} </div>
		<div class="fixture-time"> {{ $hours }} </div>
		<div class="fixture-league">

			<a href="#">

				{{ $fixture->season->competitionLeague->name }}

			</a>
			
				
		</div>
		<div class="fixture-season"> {{ $seasonYears }} </div>
		<div class="fixture-round">Kolo {{ $fixture->matchday }} </div>
	</div>

@endforeach