@extends('layouts.app')

@section('content')

<div class="club-page">

	<nav class="navbar navbar-expand-lg navbar-light">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse">
			<ul class="navbar-nav">
			  
			  <li class="nav-item">
			    <a class="nav-link" href="{{ route('club-info', [$team->tla]) }}">Pregled</a>
			  </li>

			  <li class="nav-item">
			    <a class="nav-link" href="{{ route('club-results', [$team->name]) }}">Rezultati</a>
			  </li>

			  <li class="nav-item">
			    <a class="nav-link" href="{{ route('club-squad', [$team->name]) }}">Sastav</a>
			  </li>

			</ul>
		</div>
	</nav>

	@yield('club-info')
	@yield('club-results')
	@yield('club-squad')


</div


@stop