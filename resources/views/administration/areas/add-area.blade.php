@extends('administration.areas.adm-areas')

@section('adm-areas')

@parent

@section('new-area-form')


<form method="POST" enctype="multipart/form-data" action="{{ route('area.store') }}">
	@csrf

	<div class="form-group row text-center">
		<label for="country_name" class="col-md-2"> Naziv države </label>

		<input type="text" name="country_name" class="form-control col-md-6" />
	</div>

	<div class="form-group row text-center">
		<label for="country_code" class="col-md-2"> Kod države </label>

		<input type="text" name="country_code" class="form-control col-md-6" />
	</div>

	<div class="form-group row text-center">
		
		<label for="country_area" class="col-md-2"> Oblast </label>

		<select name="country_area" class="form-control col-md-6">
			<option value="2077"> Evropa </option>
			<option value="2220"> Južna Amerika </option>
			<option value="2159"> Sjeverna Amerika / Kanada </option>
			<option value="2014"> Azija </option>
			<option value="2175"> Okeanija </option>
			<option value="2001"> Afrika </option>
		</select>

	</div>

	<div class="form-group row text-center">
		<label for="country_flag" class="col-md-2"> Zastava </label>

		<input type="file" name="country_flag" class="form-control col-md-6" />
	</div>

	<div class="form-group row text-center">

		<input type="submit" name="submit" class="form-control col-md-6 offset-2 btn btn-primary" value="Dodaj" />
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