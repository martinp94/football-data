@extends('administration.teams.adm-teams')

@section ('adm-teams')

@parent

@section('teams-search')

<style type="text/css">
	
	#submit_search {
	    background-color: Transparent;
	    background-repeat:no-repeat;
	    border: none;
	    cursor:pointer;
	    overflow: hidden;
	    outline:none;
	}

</style>

<!-- Search form -->
<form class="form-inline md-form form-sm active-cyan-2" method="POST" action="{{ route('administration.teams.get-by-name') }}">

	@csrf

    <input class="form-control form-control-sm mr-3 w-75" name="club_name" type="text" placeholder="Unesi naziv kluba" aria-label="Search">

    <input type="hidden" name="from" value="admin">

    <button type="submit" id="submit_search" > <i class="fa fa-search" aria-hidden="true"></i> </button>
    
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


<br>

@yield('teams-search-results')


@stop


@stop