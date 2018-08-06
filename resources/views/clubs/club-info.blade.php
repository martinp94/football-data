@extends('clubs.club-page')


@section('content')

@parent




@section('club-info')

<div class="club-info">
	
	<div class="club-image">
		<img width="256" src="{{ asset('images/club_logos') . '/' . $team->image}}">
	</div>

	<div class="club-name">
		<h1> {{ $team->name }} </h1>
	</div>

	<div class="club-league">

		<a href="index.php?league=la_liga1">
			La liga
		</a>
		<img width="32" src="{{ asset('images/league_logos/la-liga1.jpg') }}">
	</div>

	

	<div class="website">
		<a href="{{ $team->website }}"> Web sajt </a>
		
	</div>

	<div class="phone">
		{{ $team->phone }}
	</div>

	<div class="email">
		{{ $team->email }}
	</div>

	<div class="founded">
		Osnovan {{ $team->founded }}
	</div>

	<div class="club-address">
		{{ $team->address }}
	</div>

	
	

</div>

<iframe width="600" height="450" frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/place?q=place_id:{{ $team->place_id }}&key=AIzaSyD1zZzMiGCO1tIPeuMuMshBeLGqtNczNcY" allowfullscreen></iframe>



@stop



@stop