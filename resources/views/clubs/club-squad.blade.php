@extends('clubs.club-page')


@section('content')

@parent




@section('club-results')

<div class="club-squad">

	<div class="club-squad-player-header">
		<div class="club-squad-player-fullname">
			Igrač
		</div>

		<div class="club-squad-player-age">
			Starost
		</div>

		<div class="club-squad-player-matches-played">
			Odigrane utakmice
		</div>

		<div class="club-squad-player-goals">
			<img width="20" src="{{ asset('images/icons/football.png') }}" title="Postignuti golovi">
		</div>

		<div class="club-squad-player-yellow-cards">
			<img width="20" src="{{ asset('images/icons/yellow_card.png') }}" title="Žuti kartoni">
		</div>

		<div class="club-squad-player-red-cards">
			<img width="20" src="{{ asset('images/icons/red_card.png') }}" title="Crveni kartoni">
		</div>
	</div>

	


	<div class="club-squad-attack">

		<div class="header"> Napad </div>

		<div class="club-squad-player">

			<div class="club-squad-player-fullname">
				<a href="index.php?player">Player Playerovic</a>
			</div>

			<div class="club-squad-player-age">
				22
			</div>

			<div class="club-squad-player-matches-played">
				16
			</div>

			<div class="club-squad-player-goals">
				3
			</div>

			<div class="club-squad-player-yellow-cards">
				2
			</div>

			<div class="club-squad-player-red-cards">
				0
			</div>
		</div>

		<div class="club-squad-player">

			<div class="club-squad-player-fullname">
				<a href="index.php?player">Player Playerovic</a>
			</div>

			<div class="club-squad-player-age">
				28
			</div>

			<div class="club-squad-player-matches-played">
				6
			</div>

			<div class="club-squad-player-goals">
				0
			</div>

			<div class="club-squad-player-yellow-cards">
				1
			</div>

			<div class="club-squad-player-red-cards">
				1
			</div>
		</div>
	</div>

	<div class="club-squad-center">
		<div class="header"> Centar </div>

		<div class="club-squad-player">

			<div class="club-squad-player-fullname">
				<a href="index.php?player">Player Playerovic</a>
			</div>

			<div class="club-squad-player-age">
				28
			</div>

			<div class="club-squad-player-matches-played">
				6
			</div>

			<div class="club-squad-player-goals">
				0
			</div>

			<div class="club-squad-player-yellow-cards">
				1
			</div>

			<div class="club-squad-player-red-cards">
				1
			</div>
		</div>

		<div class="club-squad-player">

			<div class="club-squad-player-fullname">
				<a href="index.php?player">Player Playerovic</a>
			</div>

			<div class="club-squad-player-age">
				17
			</div>

			<div class="club-squad-player-matches-played">
				3
			</div>

			<div class="club-squad-player-goals">
				0
			</div>

			<div class="club-squad-player-yellow-cards">
				0
			</div>

			<div class="club-squad-player-red-cards">
				0
			</div>
		</div>
	</div>

	<div class="club-squad-defense">
		<div class="header"> Odbrana </div>

		<div class="club-squad-player">

			<div class="club-squad-player-fullname">
				<a href="index.php?player">Player Playerovic</a>
			</div>

			<div class="club-squad-player-age">
				28
			</div>

			<div class="club-squad-player-matches-played">
				6
			</div>

			<div class="club-squad-player-goals">
				0
			</div>

			<div class="club-squad-player-yellow-cards">
				1
			</div>

			<div class="club-squad-player-red-cards">
				1
			</div>
		</div>

		<div class="club-squad-player">

			<div class="club-squad-player-fullname">
				<a href="index.php?player">Player Playerovic</a>
			</div>

			<div class="club-squad-player-age">
				28
			</div>

			<div class="club-squad-player-matches-played">
				6
			</div>

			<div class="club-squad-player-goals">
				0
			</div>

			<div class="club-squad-player-yellow-cards">
				1
			</div>

			<div class="club-squad-player-red-cards">
				1
			</div>
		</div>
	</div>

	<div class="club-squad-goalkeepers">
		<div class="header"> Golman </div>

		<div class="club-squad-player">

			<div class="club-squad-player-fullname">
				<a href="index.php?player">Player Playerovic</a>
			</div>

			<div class="club-squad-player-age">
				28
			</div>

			<div class="club-squad-player-matches-played">
				6
			</div>

			<div class="club-squad-player-goals">
				0
			</div>

			<div class="club-squad-player-yellow-cards">
				1
			</div>

			<div class="club-squad-player-red-cards">
				1
			</div>
		</div>

		<div class="club-squad-player">

			<div class="club-squad-player-fullname">
				<a href="index.php?player">Player Playerovic</a>
			</div>

			<div class="club-squad-player-age">
				28
			</div>

			<div class="club-squad-player-matches-played">
				6
			</div>

			<div class="club-squad-player-goals">
				0
			</div>

			<div class="club-squad-player-yellow-cards">
				1
			</div>

			<div class="club-squad-player-red-cards">
				1
			</div>
		</div>


	</div>

	<div class="club-squad-coach">
		<div class="header"> Trener </div>
		<h3 style="color: darkcyan;"> Zinedine Zidane </h3>
	</div>

</div>

@stop

@stop