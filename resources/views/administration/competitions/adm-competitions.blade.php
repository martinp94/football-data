@extends('administration.administration')

@section('content')

@parent

@section ('adm-competitions')

<div class="options">
	<div class="option">
		<a href="{{ route('administration.leagues.all') }}"> Sva takmičenja </a>
	</div>

	<div class="option">
		<a href="{{ route('administration.leagues.add') }}"> Dodaj takmičenje </a>
	</div>
</div>

<div class="content">
	
	@yield('competitions-all')
	@yield('competitions-add')
	@yield('competitions-fixtures')
	@yield('competitions-standings-seasons')
	@yield('competitions-standings-season')

	@if(\Session::has('errorMsg'))
		<div class="alert alert-danger">
	        <p>{{ \Session::get('errorMsg') }}</p>
	    </div>
		
	@endif

	@if(\Session::has('successMsg'))
		<div class="alert alert-success">
	        <p>{{ \Session::get('successMsg') }}</p>
	    </div>
		
	@endif

	

</div>

@stop

@stop
