@extends('layouts.app')

@section('content')

<h1>{{ $competition->name }} <img width="64" src="{{ asset('images/league_logos') }}/{{ $competition->name }}.jpg"> </h1> 

<div class="league-page">
	<div class="league-page-navigation">
		<a href="{{ route('league.table', ['shortName' => $competition->shortName]) }}">
			<div class="league-page-navigation-table" rel="tabela">

				
					<img width="32" src="{{ asset('images/icons/table.png') }}">
				
				
			</div>
		</a>

		<a href="{{ route('league.matches', ['shortName' => $competition->shortName, 'season' => $season->startDate]) }}">
			<div class="league-page-navigation-matches" rel="matches">

				
					<img width="32" src="{{ asset('images/icons/matches.png') }}">
				

				
			</div>
		</a>

		<a href="{{ route('league.history', ['shortName' => $competition->shortName]) }}">
			<div class="league-page-navigation-history" rel="history">

				
					<img width="32" src="{{ asset('images/icons/history.png') }}">
				

			</div>
		</a>
		
	</div>

	<h1>sezona {{ $season->id }}</h1>

	<div class="league-page-display">
		
		@yield('league-table')
		@yield('league-matches')
		@yield('league-history')

	</div>
</div>

@stop

