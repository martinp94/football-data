@extends('leagues.league-page')

@section('content')

@parent

@section('league-matches')

<div class="league-matches">

	<div class="league-round">
		<div class="league-round-header">Kolo 1</div>

		<div class="league-fixture">
			<div class="league-fixture-team1">

				<a href="index.php?club=chelsea">
					Chelsea
				</a>
			
			</div>
			<div class="league-fixture-result">2:1</div>
			<div class="league-fixture-team2">

				<a href="index.php?club=tottenham">
					Tottenham
				</a>

			</div>
			<div class="league-fixture-date">21.08.2016</div>
			<div class="league-fixture-time">16:00</div>
		</div>

		<div class="league-fixture">
			<div class="league-fixture-team1">Liverpool</div>
			<div class="league-fixture-result">4:1</div>
			<div class="league-fixture-team2">Sunderland</div>
			<div class="league-fixture-date">22.08.2016</div>
			<div class="league-fixture-time">16:00</div>
		</div>

		<div class="league-fixture">
			<div class="league-fixture-team1">Manchester Utd</div>
			<div class="league-fixture-result">5:3</div>
			<div class="league-fixture-team2">Newcastle</div>
			<div class="league-fixture-date">22.08.2016</div>
			<div class="league-fixture-time">16:00</div>
		</div>
	</div>

	<div class="league-round">
		<div class="league-round-header">Kolo 2</div>

		<div class="league-fixture">
			<div class="league-fixture-team1">Stoke</div>
			<div class="league-fixture-result">0:0</div>
			<div class="league-fixture-team2">Crystal Palace</div>
			<div class="league-fixture-date">29.08.2016</div>
			<div class="league-fixture-time">16:00</div>
		</div>

		<div class="league-fixture">
			<div class="league-fixture-team1">Wolwes</div>
			<div class="league-fixture-result">1:4</div>
			<div class="league-fixture-team2">West Ham</div>
			<div class="league-fixture-date">31.08.2016</div>
			<div class="league-fixture-time">16:00</div>
		</div>

		<div class="league-fixture">
			<div class="league-fixture-team1">Arsenal</div>
			<div class="league-fixture-result">2:3</div>
			<div class="league-fixture-team2">Leicester</div>
			<div class="league-fixture-date">31.08.2016</div>
			<div class="league-fixture-time">16:00</div>
		</div>
	</div>

	<div class="league-round">
		<div class="league-round-header">Kolo n</div>

		<div class="league-fixture">
			<div class="league-fixture-team1">Klub 1</div>
			<div class="league-fixture-result">0:0</div>
			<div class="league-fixture-team2">Klub 2</div>
			<div class="league-fixture-date">.....</div>
			<div class="league-fixture-time">16:00</div>
		</div>

		<div class="league-fixture">
			<div class="league-fixture-team1">Klub 3</div>
			<div class="league-fixture-result">0:1</div>
			<div class="league-fixture-team2">Klub 4</div>
			<div class="league-fixture-date">.....</div>
			<div class="league-fixture-time">16:00</div>
		</div>

		<div class="league-fixture">
			<div class="league-fixture-team1">Klub 5</div>
			<div class="league-fixture-result">1:0</div>
			<div class="league-fixture-team2">Klub 6</div>
			<div class="league-fixture-date">.....</div>
			<div class="league-fixture-time">16:00</div>
		</div>
	</div>

	<div class="league-round">
		<div class="league-round-header">Kolo 38</div>

		<div class="league-fixture">
			<div class="league-fixture-team1">Tottenham</div>
			<div class="league-fixture-result">1:1</div>
			<div class="league-fixture-team2">Chelsea</div>
			<div class="league-fixture-date">21.05.2017</div>
			<div class="league-fixture-time">16:00</div>
		</div>

		<div class="league-fixture">
			<div class="league-fixture-team1">Bournemouth</div>
			<div class="league-fixture-result">1:0</div>
			<div class="league-fixture-team2">Stoke</div>
			<div class="league-fixture-date">22.05.2017</div>
			<div class="league-fixture-time">16:00</div>
		</div>

		<div class="league-fixture">
			<div class="league-fixture-team1">West Ham</div>
			<div class="league-fixture-result">4:3</div>
			<div class="league-fixture-team2">Arsenal</div>
			<div class="league-fixture-date">22.05.2017</div>
			<div class="league-fixture-time">16:00</div>
		</div>
	</div>
</div>

@stop

@stop
