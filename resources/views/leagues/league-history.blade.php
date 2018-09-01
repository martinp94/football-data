@extends('leagues.league-page')

@section('content')

@parent

@section('league-history')



<div class="league-history">
	<ul>
		@foreach($competition->seasons as $season)

			
			@php 				
				$seasonStartYear = Carbon\Carbon::createFromFormat('Y-m-d', $season->startDate)->year;
				$seasonEndYear = Carbon\Carbon::createFromFormat('Y-m-d', $season->endDate)->year;

				$seasonYears = $seasonStartYear . '/' . $seasonEndYear;
			@endphp

			<li><a href="{{ route('competitions.season', ['season' => $season->startDate, 'shortName' => $competition->shortName]) }}"> Sezona {{ $seasonYears }} </a></li>
		@endforeach
	</ul>
</div>





@stop

@stop