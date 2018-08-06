@extends('layouts.app')

@section('content')

<?php

$leagues = [
	'ger-bundesliga1' => ['Bundesliga', 'Germany'],
	'en-premier-league' => ['Premier League', 'England'],
	'la-liga1' => ['La Liga', 'Spain'],
	'srb-super-liga' => ['Super Liga', 'Serbia'],
	'mne-telekom-league' => ['Crnogorska Telekom Liga', 'Montenegro'],
	'ligue-1' => ['Ligue 1', 'France'],
	'prva-mkd' => ['Makedonska 1. Liga', 'Fyrom'],
	'hnl-1' => ['1. HNL', 'Croatia'],
	'serie-A' => ['Serie A' , 'Italy']
];

$champions_league = ['champions_league', 'name' => 'Liga Šampiona'];

$europa_league = ['key' => 'europa_league', 'name' => 'Liga Evrope'];

$friendly_matches = ['key' => 'friendly_matches', 'name' => 'Prijateljske utakmice'];

$clubs = [

    'real_madrid' => [
        'club_name' => 'Real Madrid',
        'league' => ["la-liga1", $leagues["la-liga1"]],
        'league-pos' => 1
    ],
    'barcelona' => [
        'club_name' => 'FC Barcelona',
        'league' => ["la-liga1", $leagues["la-liga1"]],
        'league-pos' => 2
    ],
    'psg' => [
        'club_name' => 'PSG',
        'league' => ["ligue-1", $leagues["ligue-1"]],
        'league-pos' => 1
    ],
    'man_city' => [
        'club_name' => 'Manchester City',
        'league' => ["en-premier-league", $leagues["en-premier-league"]],
        'league-pos' => 1

    ],
    'juventus' => [
        'club_name' => 'Juventus',
        'league' => ["serie-A", $leagues["serie-A"]],
        'league-pos' => 1
    ],
    'bayern_munich' => [
        'club_name' => 'Bayern Munich',
        'league' => ["ger-bundesliga1", $leagues["ger-bundesliga1"]],
        'league-pos' => 1
    ],
    'crvena_stijena' => [
        'club_name' => 'Crvena Stijena',
        'league' => ["mne-telekom-league", $leagues["mne-telekom-league"]],
        'league-pos' => 5
    ],
    'bokelj' => [
        'club_name' => 'FK Bokelj',
        'league' => ["mne-telekom-league", $leagues["mne-telekom-league"]],
        'league-pos' => 9
    ],
    'sindjelic_beograd' => [
        'club_name' => 'Sindjelic Beograd',
        'league' => ["srb-super-liga", $leagues["srb-super-liga"]],
        'league-pos' => 7
    ],
    'turnovo' => [
        'club_name' => 'Turnovo',
        'league' => ["prva-mkd", $leagues["prva-mkd"]],
        'league-pos' => 6
    ],
    'novigrad' => [
        'club_name' => 'Novigrad',
        'league' => ["hnl-1", $leagues["hnl-1"]],
        'league-pos' => 10
    ]
];
    
?>



<div class="matches-today">

	<div class="matches-competition">
		<div class="matches-competition-header">
			{{ $champions_league["name"] }}
		</div>

		<div class="competition-fixture live">
			<div class="fixture-team1">

				<a href="klub/real_madrid">

					{{ $clubs["real_madrid"]["club_name"] }}

				</a>
				
				<img width="16" src="images/club_logos/real_madrid.jpg">
			</div>

			<div class="fixture-result"> - : - </div>
			
			<div class="fixture-team1">

				<a href="index.php?club=bayern_munich">
					{{ $clubs["bayern_munich"]["club_name"] }}
				</a>

				<img width="16" src="{{ asset('images/club_logos/bayern_munich.jpg') }}">
			</div>

			<div class="fixture-time">20:45</div>
			<div class="fixture-description">Grupna faza</div>
		</div>

	</div>

	<div class="matches-competition">
		<div class="matches-competition-header">
			<?= $europa_league["name"]; ?>
		</div>

		<div class="competition-fixture">
			<div class="fixture-team1">
				<?= $clubs["juventus"]["club_name"]; ?> 
				<img width="16" src="images/club_logos/juventus.jpg">
			</div>

			<div class="fixture-result"> - : - </div>
			
			<div class="fixture-team1">
				<?= $clubs["man_city"]["club_name"]; ?> 
				<img width="16" src="images/club_logos/man_city.jpg">
			</div>

			<div class="fixture-time">20:45</div>
			<div class="fixture-description">Grupna faza</div>
		</div>

		<div class="competition-fixture">
			<div class="fixture-team1">
				<?= $clubs["barcelona"]["club_name"]; ?> 
				<img width="16" src="images/club_logos/barcelona.jpg">
			</div>

			<div class="fixture-result"> - : - </div>
			
			<div class="fixture-team1">
				<?= $clubs["psg"]["club_name"]; ?> 
				<img width="16" src="images/club_logos/psg.jpg">
			</div>

			<div class="fixture-time">20:45</div>
			<div class="fixture-description">Grupna faza</div>
		</div>

	</div>

	<div class="matches-competition">
		<div class="matches-competition-header">
			<?= $friendly_matches["name"]; ?>
		</div>

		<div class="competition-fixture">
			<div class="fixture-team1">
				<?= $clubs["novigrad"]["club_name"]; ?> 
				<img width="16" src="images/club_logos/novigrad.jpg">
			</div>

			<div class="fixture-result"> - : - </div>
			
			<div class="fixture-team1">
				<?= $clubs["novigrad"]["club_name"]; ?> 
				<img width="16" src="images/club_logos/novigrad.jpg">
			</div>

			<div class="fixture-time">21:00</div>
			<div class="fixture-description">Prijateljska utakmica</div>
		</div>

		<div class="competition-fixture live">
			<div class="fixture-team1">
				<?= $clubs["bokelj"]["club_name"]; ?> 
				<img width="16" src="images/club_logos/bokelj.jpg">
			</div>

			<div class="fixture-result"> - : - </div>
			
			<div class="fixture-team1">
				<?= $clubs["crvena_stijena"]["club_name"]; ?> 
				<img width="16" src="images/club_logos/crvena_stijena.jpg">
			</div>

			<div class="fixture-time"> 11:00 </div>
			<div class="fixture-description">Prijateljska utakmica</div>
		</div>


		<div class="competition-fixture">
			<div class="fixture-team1">
				<?= $clubs["turnovo"]["club_name"]; ?> 
				<img width="16" src="images/club_logos/turnovo.jpg">
			</div>

			<div class="fixture-result"> - : - </div>
			
			<div class="fixture-team1">
				<?= $clubs["sindjelic_beograd"]["club_name"]; ?> 
				<img width="16" src="images/club_logos/sindjelic_beograd.jpg">
			</div>

			<div class="fixture-time">17:15</div>
			<div class="fixture-description">Prijateljska utakmica</div>
		</div>

		
	</div>




</div>

@endsection