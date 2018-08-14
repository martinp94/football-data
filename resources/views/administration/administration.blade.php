@extends('layouts.app')

@section('content')

<div id="administration">
	<div class="administration-header">
	
		<div class="options">
			
			<div class="option">
				<a href="{{ route('administration.matches') }}"> Utakmice </a>
			</div>

			<div class="option">
				<a href="{{ route('administration.competitions') }}"> Takmicenja </a> 
			</div>

			<div class="option">
				<a href="{{ route('administration.teams') }}"> Timovi </a> 
			</div>

			<div class="option">
				<a href="{{ route('administration.areas') }}"> Države i regije </a>
			</div>


		</div>

	</div>

	<br>
	
	<div class="administration-main">
		@yield('adm-fixtures')
		@yield('adm-competitions')
		@yield('adm-teams')
		@yield('adm-areas')
	</div>	
	

</div>

<script>
	
/*new Vue({
	el: '#administration',

	data: {
		options: ['Utakmice', 'Lige', 'Takmicenja'],
		option: null,
		matchesToBeUpdated: null
	},

	watch: {
		option: function(value) {
			
		}
	},

	methods: {
		getFixturesToBeUpdated: function() {
			fetch('/matchesToBeUpdated')
			.then(function(response) {
				return response.json();
			})
			.then((matchesToBeUpdatedJson) => {
				console.log(matchesToBeUpdatedJson);
				this.matchesToBeUpdated = matchesToBeUpdatedJson;
			});
		},
		update: function(id) {

			fetch(`http://api.football-data.org/v2/matches/${id}`, {
				headers: {
			        "X-Auth-Token": "e2f12665f0e743a0af8f158c513f57bf"
			    }
			})
			.then(function(response) {
				return response.json();
			})
			.then((fixtureJson) => {

				// Za fixtures

				const status = fixtureJson.status;

				const token = document.querySelector('meta[name=csrf-token]').getAttribute('content');

				fetch('matches/' + fixtureJson.id , {
				  method: 'post',
				  headers: {
				  	'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8',
				  	'X-CSRF-TOKEN': token
				  },
				  body: "_method=patch&status=" + status
				 
				}).then(res => res.json())
				.catch(error => console.error('Error:', error))
				.then(response => {
					console.log('Success:', response);

				});

				// Za fixute_details
				const winner = fixtureJson.score.winner;

				const scoreHomeTeamFT = fixtureJson.score.fullTime.homeTeam;
				const scoreAwayTeamFT = fixtureJson.score.fullTime.awayTeam;

				const scoreHomeTeamHT = fixtureJson.score.halfTime.homeTeam;
				const scoreAwayTeamHT = fixtureJson.score.halfTime.awayTeam;

				const scoreHomeTeamET = fixtureJson.score.extraTime.homeTeam;
				const scoreAwayTeamET = fixtureJson.score.extraTime.awayTeam;

				const scoreHomeTeamPTS = fixtureJson.score.penalties.homeTeam;
				const scoreAwayTeamPTS = fixtureJson.score.penalties.awayTeam;

				const body = {
					_method: 'patch'
				};

				fetch('matchDetails/' + fixtureJson.id , {
				  method: 'post',
				  headers: {
				  	'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8',
				  	'X-CSRF-TOKEN': token
				  },
				  body: body
				 
				}).then(res => res.json())
				.catch(error => console.error('Error:', error))
				.then(response => {
					console.log('Success:', response);

				});

			});
		}
	}
});*/

</script>

@stop