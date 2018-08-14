@extends('administration.administration')

@section('content')

@parent

@section('adm-areas')

<div class="options">
	<div class="option">
		<a href="{{ route('areas.create') }}"> Dodaj državu </a>
	</div>

	<div class="option">
		<a href="{{ route('areas.all') }}"> Lista država i oblasti </a>
	</div>
</div>

<div class="content">
	
	@yield('new-area-form')
	@yield('all-areas')
	@yield('edit-area')

</div>

@stop


@stop
