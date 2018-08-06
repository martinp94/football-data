@extends('layouts.app')

@section('content')

<div class="clubs">

	<ul class="clubs-header">
		<li class="clubs-header-name">Klub</li>
		<li class="clubs-header-shortname">Kratko ime</li>
		<li class="clubs-header-country">Država</li>
		<li class="clubs-header-league">Liga</li>
		<li class="clubs-header-league-pos">Pozicija u Ligi</li>
	</ul>

	

	@foreach ($teams as $key => $team)
		
		<ul class="clubs-list">
			<li>

				<div class="clubs-list-club-name">
					<a href="{{ route('club', $team->tla) }}">
						
						{{ $team['name'] }} 

					</a>
				</div>

				<div class="clubs-list-club-image">
					<img width="32" src="{{ asset('images/club_logos') . '/' . $team->image }}" >
				</div>

				<div class="clubs-list-club-shortname">
					{{ $team['shortname'] }}
				</div>

				<div class="clubs-list-club-country">
					<img width="32" src="{{ asset('images/countries')  . '/' . $team->country->image}} ">
					
				</div>

				<div class="clubs-list-league">
					nema jos to
				</div>

				<div class="clubs-list-league-pos">
					nema jos ni ovo
				</div>

			</li>
		</ul> 
	@endforeach

</div>

@endsection