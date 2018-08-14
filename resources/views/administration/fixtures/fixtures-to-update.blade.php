@extends('administration.fixtures.adm-fixtures')

@section('adm-fixtures')

@parent

@section('fixtures-to-update')



<table class="table table-hover">
  <thead class="text-center">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Parovi</th>
      <th scope="col">Takmičenje</th>
      <th scope="col">Kolo</th>
      <th scope="col">Datum i vrijeme</th>
      <th scope="col">Opcije</th>
    </tr>
  </thead>
  <tbody class="text-center">
  	@foreach($fixtures as $index => $fixture)

  	<form method="POST" action="{{ route('match.update', $fixture->id) }}">
  		@method('patch')
  		@csrf
  		<tr>
	      <th scope="row">{{ $index + 1 }}</th>

	      <td>
				<div> 
					{{ $fixture->homeTeam }} 
					<img width="20" src="{{ asset('images/club_logos') }}/{{ $fixture->homeTeamImage }}">
				</div>

				<div>
					{{ $fixture->awayTeam }} 
					<img width="20" src="{{ asset('images/club_logos') }}/{{ $fixture->awayTeamImage }}">
				</div>
	      </td>

	      <td>{{ $fixture->competition_name }}</td>

	      <td>{{ $fixture->matchday }}</td>

	      <td>{{ \Carbon\Carbon::parse($fixture->date)->addHours(2)->format('d.m.Y H:i') }}</td>

	      <td> 
	      	<button type="submit" class="btn btn-primary"> Ažuriraj </button> 
	      </td>

	    </tr>

  	</form>
    
    @endforeach
    
  </tbody>
</table>



@stop

@stop