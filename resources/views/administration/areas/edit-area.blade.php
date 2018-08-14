@extends('administration.areas.adm-areas')

@section('adm-areas')

@parent

@section('edit-area')


<form method="POST" enctype="multipart/form-data" action="{{ route('area.update', $area->id) }}">

	@csrf
	@method('patch')

	<div class="form-group row text-center">
		<label for="country_name" class="col-md-2"> Naziv države </label>

		<input type="text" name="country_name" class="form-control col-md-6" value="{{ $area->name }}" />
	</div>

	<div class="form-group row text-center">
		<label for="country_code" class="col-md-2"> Kod države </label>

		<input type="text" name="country_code" class="form-control col-md-6" value="{{ $area->countryCode }}" />
	</div>

	<div class="form-group row text-center">
		<label for="country_area" class="col-md-2"> Oblast </label>

		<select name="country_area" class="form-control col-md-6">
			@php
				$continents = [
					2077 => 'Evropa',
					2220 => 'Južna Amerika',
					2159 => 'Sjeverna Amerika / Kanada',
					2014 => 'Azija',
					2175 => 'Okeanija',
					2001 => 'Afrika'
				];

				
				$continentsFiltered = collect($continents)->filter(function($continent, $key) use ($area) {
					return $key != $area->parentAreaId;
				})->all();


			@endphp

			<option selected="selected" value="{{ $area->parentAreaId }}"> {{ $continents[$area->parentAreaId] }} </option>

			@foreach($continentsFiltered as $id => $continent)
				<option value="{{ $id }}"> {{ $continent }} </option>
			@endforeach

		</select>

	</div>

	<div class="form-group row text-center">
		<label for="country_flag" class="col-md-2"> Zastava </label>

		<input type="file" name="country_flag" class="form-control col-md-6" />
	</div>

	<div class="form-group row text-center">

		<input type="submit" name="submit" class="form-control col-md-6 offset-2 btn btn-primary" value="Edituj" />

	</div>

</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@stop

@stop