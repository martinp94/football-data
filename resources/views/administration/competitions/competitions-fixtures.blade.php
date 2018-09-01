@extends('administration.competitions.adm-competitions')

@section ('adm-competitions')

@parent

@section('competitions-fixtures')



@php
	$fixturesBySeason = $fixtures->mapToGroups(function ($fixture, $key) {
	    return [$fixture->season => $fixture];
	});

@endphp

@foreach($fixturesBySeason as $key => $fixtures)

	@if($fixtures->count() > 1)
	
	@include('administration.competitions.competitions-fixtures-table')

	@else
		<h1> Sezona {{ \Carbon\Carbon::parse(App\Season::find($key)->startDate)->format('Y') }}/{{ \Carbon\Carbon::parse(App\Season::find($key)->endDate)->format('Y') }} </h1>	
		<p>Za ovu sezonu nema utakmica. </p>

		<form method="POST" action="{{ route('matches.storeBySeason', $key) }}">
			
			@csrf

			<button type="submit" class="btn btn-primary"> Preuzmi utakmice </button>
		</form>
		
	@endif

@endforeach

@stop 

@stop