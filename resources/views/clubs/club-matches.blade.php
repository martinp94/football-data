@extends('clubs.club-page')


@section('content')

@parent




@section('club-results')

<div class="club-matches">
	
	<div class="club-matches-competition">

		<div class="club-matches-competition-header"> {{ $team->currentCompetition()['name'] }} </div>

		{{-- SCHEDULED --}}

		@php

			$scheduledHome = $team->homeFixtures->filter(function($fixture) {
				return $fixture->status == 'SCHEDULED';
			});

			$scheduledAway = $team->awayFixtures->filter(function($fixture) {
				return $fixture->status == 'SCHEDULED';
			});

			$finishedHome = $team->homeFixtures->filter(function($fixture) {
				return $fixture->status == null || $fixture->status == "FINISHED";
			});

			$finishedAway = $team->awayFixtures->filter(function($fixture) {
				return $fixture->status == null || $fixture->status == "FINISHED";
			});

		@endphp

		

		@include('clubs.club-matches-scheduled-home')
		@include('clubs.club-matches-scheduled-away')
		@include('clubs.club-matches-finished-home')
		@include('clubs.club-matches-finished-away')
		


	</div>
	
</div>

@stop

@stop