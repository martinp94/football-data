@extends('administration.areas.adm-areas')

@section('adm-areas')

@parent

@section ('all-areas')

@foreach($countries as $country)

<div style="padding: 1em; border: 0.01em solid black; margin: 1em;">
	
	<a href="#"> {{ $country->name }} </a>
	<img width="32" src="{{ asset('images/countries') }}/{{ $country->image }}">
	<a class="btn btn-primary" style="margin-left: 90%; margin-top: -3%; color: white;" href="{{ route('areas.edit', $country->countryCode) }}"> Edituj </a>
</div>


@endforeach

@stop

@stop