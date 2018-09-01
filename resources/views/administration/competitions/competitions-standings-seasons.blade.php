@extends('administration.competitions.adm-competitions')

@section ('adm-competitions')

@parent

@section('competitions-standings-seasons')


<form method="POST" action="{{ route('administration.standings.update', $competition_id) }}">

	@method('PUT')
	@csrf

	<button class="btn btn-primary" type="submit"> Automatsko ažuriranje tabele </button>
</form>


<br>
<br>

@foreach($seasons as $season)

	@php 
		$startDate = \Carbon\Carbon::parse($season->startDate)->format('Y');
		$endDate = \Carbon\Carbon::parse($season->endDate)->format('Y');
		$shortName = App\Competition::find($competition_id)->shortName;
	@endphp

	<a href="{{ route('administration.standings.show', [$shortName, $startDate]) }}">
		<h2> Plasman za sezonu 
			{{ $startDate }}/ 
			{{ $endDate }}
		</h2>
	</a>

@endforeach

<br>

@if(\Session::has('errorMsg'))
	<div class="alert alert-danger">
        <p>{{ \Session::get('errorMsg') }}</p>
    </div>
    {{ \Session::forget('errorMsg') }}
	
@endif

@if(\Session::has('successMsg'))
	<div class="alert alert-success">
        <p>{{ \Session::get('successMsg') }}</p>
    </div>
    {{ \Session::forget('successMsg') }}
@endif

@stop 

@stop