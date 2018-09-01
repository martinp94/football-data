@extends('administration.teams.adm-teams')

@section ('adm-teams')

@parent

@section('teams-create-by-season')


@php

$seasonsWithNoFixturesByCompetition = $seasonsWithNoFixtures->mapToGroups(function ($season, $key) {
    return [$season->competition_name => $season];
});

@endphp



@foreach($seasonsWithNoFixturesByCompetition as $competition => $seasons)

	<form method="POST" action="{{ route('teams.store.by-season') }}">

		@csrf

		<h1> {{ $competition }} </h1>

		<select name="season_year">
			
			@foreach($seasons as $season)

				@php
					$season_year = \Carbon\Carbon::parse($season->startDate)->format('Y');
				@endphp

				<option value="{{ $season_year }}"> Sezona {{ $season_year }} </option>

			@endforeach
			
		</select>

		<input type="hidden" name="competition_id" value="{{ $season->comp_id }}">
		<button type="submit" class="btn btn-primary"> Dodaj timove </button>

	</form>

	

@endforeach


{{-- @endforeach

<form method="POST" action="{{ route('teams.store.by-season') }}">
	@csrf

	<div class="form-group">
		<label for="country"> Odaberite državu </label>

		<select name="country">
			@foreach(App\Area::all() as $country)
				<option value="{{ $country->id }}"> {{ $country->name }} </option>
			@endforeach
		</select>
	</div>

	<button type="submit" class="btn btn-primary"> Potvrdi </button>

</form>

<br> --}}

@if(\Session::has('errorMsg'))
	<div class="container-fluid alert alert-danger">
        <p>{{ \Session::get('errorMsg') }}</p>
    </div>
	
@endif

@if(\Session::has('successMsg'))
	<div class="container-fluid alert alert-success">
        <p>{{ \Session::get('successMsg') }}</p>
    </div>
	
@endif

@stop


@stop