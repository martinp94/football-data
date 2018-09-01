@extends('administration.competitions.adm-competitions')

@section ('adm-competitions')

@parent

@section('competitions-standings-season')

<table class="table table-hover">

	<thead class="text-center">
	<tr>
	  <th scope="col">Pozicija</th>
	  <th scope="col">Klub</th>
	  <th scope="col">Ukupno poena</th>
	  <th scope="col">Odigrane utakmice</th>
	  <th scope="col">Pobjede</th>
	  <th scope="col">Neriješene</th>
	  <th scope="col">Porazi</th>
	  <th scope="col">Postignuti golovi</th>
	  <th scope="col">Primljeni golovi</th>
	  <th scope="col">Gol razlika</th>

	</tr>
	</thead>

	<tbody class="text-center">

@foreach($standings as $standing)

  	<tr>

      <th scope="row">{{ $standing->position }}</th>

      <td style="width: 100%;"> {{ App\Team::find($standing->team_id)->name }} <img width="32" src="{{ asset('images/club_logos') }}/{{ App\Team::find($standing->team_id)->image }}" alt=""> </td>

      <td>{{ $standing->points }}</td>

      <td>{{ $standing->playedGames }}</td>

      <td>{{ $standing->won }}</td>

      <td>{{ $standing->draw }}</td>

      <td>{{ $standing->lost }}</td>

      <td>{{ $standing->goalsFor }}</td>

      <td>{{ $standing->goalsAgainst }}</td>

      <td>{{ $standing->goalsDifference }}</td>

	</tr>
  
@endforeach

	</tbody>

</table>

@stop 

@stop