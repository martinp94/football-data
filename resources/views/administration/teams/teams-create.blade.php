@extends('administration.teams.adm-teams')

@section ('adm-teams')

@parent

@section('teams-create')

<form method="POST" action="{{ route('teams.store.by-country') }}">
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

<br>

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