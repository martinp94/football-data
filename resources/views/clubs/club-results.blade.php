@extends('clubs.club-page')


@section('content')

@parent




@section('club-results')

<div class="club-matches">
	
	<div class="club-matches-competition">
		<div class="club-matches-competition-header"> La Liga 1 </div>

		@for($i = 1; $i <= 4; $i++)

		<div class="competition-fixture league">
			<div class="fixture-team1">

				<a href="{{ route('club', [$club_name]) }}">Real Madrid</a>
				<img width="16" src="{{ asset('images/club_logos/real_madrid.jpg') }}">
			</div>

			<div class="fixture-result">X:X</div>
			<div class="fixture-team2">Klub X</div>
			<div class="fixture-date">XX.XX.2016(17)</div>
			<div class="fixture-time">16:00</div>
			<div class="fixture-league">

				<a href="#">

					La Liga 1

				</a>
				
					
			</div>
			<div class="fixture-season">Sezona 2016-17</div>
			<div class="fixture-round">Kolo {{ $i }}</div>
		</div>

		@endfor


	</div>

	<div class="club-matches-competition">
		<div class="club-matches-competition-header"> La Liga 1 </div>

		@for($i = 1; $i <= 4; $i++)

		<div class="competition-fixture league">
			<div class="fixture-team1">

				<a href="{{ route('club', [$club_name]) }}">Real Madrid</a>
				<img width="16" src="{{ asset('images/club_logos/real_madrid.jpg') }}">
			</div>

			<div class="fixture-result">X:X</div>
			<div class="fixture-team2">Klub X</div>
			<div class="fixture-date">XX.XX.2016(17)</div>
			<div class="fixture-time">16:00</div>
			<div class="fixture-league">

				<a href="#">

					La Liga 1

				</a>
				
					
			</div>
			<div class="fixture-season">Sezona 2016-17</div>
			<div class="fixture-round">Kolo {{ $i }}</div>
		</div>

		@endfor


	</div>

	<div class="club-matches-competition">
		<div class="club-matches-competition-header"> La Liga 1 </div>

		@for($i = 1; $i <= 4; $i++)

		<div class="competition-fixture league">
			<div class="fixture-team1">

				<a href="{{ route('club', [$club_name]) }}">Real Madrid</a>
				<img width="16" src="{{ asset('images/club_logos/real_madrid.jpg') }}">
			</div>

			<div class="fixture-result">X:X</div>
			<div class="fixture-team2">Klub X</div>
			<div class="fixture-date">XX.XX.2016(17)</div>
			<div class="fixture-time">16:00</div>
			<div class="fixture-league">

				<a href="#">

					La Liga 1

				</a>
				
					
			</div>
			<div class="fixture-season">Sezona 2016-17</div>
			<div class="fixture-round">Kolo {{ $i }}</div>
		</div>

		@endfor


	</div>
</div>

@stop

@stop