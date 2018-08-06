@extends('layouts.app')

@section('content')

<div class="leagues-all">
	
	<ul>
		@foreach($leagues as $league_key => $league)
			<li> 


				<div class="league-country-image">
					<img width="32" src="{{ asset('images/countries/') }}/{{ $league->country->image }}">
				</div>

				<div class="league-name">
					<a href="{{ route('league', $league->shortName) }}"> {{ $league->name }}  </a>
				</div>

				<div class="league-logo">
					<img width="128" src="{{ asset('images/league_logos/') }}/{{ $league->name }}.jpg">
				</div>

				


			</li>

		@endforeach
	</ul>

</div>

@endsection