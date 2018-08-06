@extends('layouts.app')

@section('content')

<div id="player59927134" class="player-info">

	<div class="player-nationality">
		<img src="http://icons.iconarchive.com/icons/iconscity/flags/128/argentina-icon.png" title="Argentina" alt="nationality_img" />
	</div>

	<div class="player-image">
		<!-- <img src="" width="200" > -->
		<img src="https://vignette.wikia.nocookie.net/the-football-database/images/f/f2/Lionel_Messi.png/revision/latest/scale-to-width-down/128?cb=20161019191955">
	</div>

	<div class="player-fullname-birthyear">
		<h1> <strong> Lionel Messi </strong> </h1>
		<h2>(24.6.1987)</h2>
	</div>

	<div class="player-position">


		<h1 style="color: darkred;"><strong>SS</strong></h1>
		<img src="{{ asset('images/positions/SS.png') }}">
		
	</div>

	<div class="player-club">
		<img width="128" src="{{ asset('images/club_logos/barcelona.jpg') }}">
	</div>

	
</div>

@endsection