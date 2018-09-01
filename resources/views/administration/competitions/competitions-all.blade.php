@extends('administration.competitions.adm-competitions')

@section ('adm-competitions')

@parent

@section('competitions-all')

<table class="table table-hover">
  <thead class="text-center">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Naziv</th>
      <th scope="col">Skraćen naziv</th>
      <th scope="col">Država</th>
      <th scope="col">Ukupno klubova</th>
      <th scope="col">Ukupno sezona</th>
      <th scope="col">Utakmice</th>
      <th scope="col">Plasman</th>

    </tr>
  </thead>
  <tbody class="text-center">
  	@foreach($competitions as $index => $competition)

  	
  	<tr>

      <th scope="row">{{ $index + 1 }}</th>

      <td>{{ $competition->name }}</td>

      <td>{{ $competition->shortName }}</td>

      <td>{{ App\Area::find($competition->area)->name }}</td>

      <td> {{ $competition->teams_count }} </td>

      <td> {{ $competition->seasons_count }} </td>

      <td> 

        <a href="{{ route('administration.league.matches', $competition->shortName) }}" class="btn btn-primary" style="color: white;">Edituj</a> 

      </td>

      <td>
        
         <a href="{{ route('administration.league.table', $competition->shortName) }}" class="btn btn-primary" style="color: white;">Edituj</a> 

      </td>

	</tr>

  
    
    @endforeach
    
  </tbody>
</table>

@stop

@stop

