@extends('administration.administration')

@section('content')

@parent

@section('adm-fixtures')



<div class="options">
	<div class="option">
		<a href="{{ route('administration.matches-to-be-updated') }}"> Ažuriranje utakmica </a>
	</div>
</div>

<div class="content">
	
	@yield('fixtures-to-update')

</div>




@stop

@stop
