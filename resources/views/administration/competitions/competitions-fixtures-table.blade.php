<h1> Sezona {{ \Carbon\Carbon::parse(App\Season::find($key)->startDate)->format('Y') }}/{{ \Carbon\Carbon::parse(App\Season::find($key)->endDate)->format('Y') }} </h1>	
	
<table class="table table-hover">
  <thead class="text-center">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Parovi</th>
      <th scope="col">Kolo</th>
      <th scope="col">Datum i vrijeme</th>
    </tr>
  </thead>
  <tbody class="text-center">
  	@foreach($fixtures as $index => $fixture)

  	
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

	      <td>{{ $fixture->matchday }}</td>

	      <td>{{ \Carbon\Carbon::parse($fixture->fixture_date)->addHours(2)->format('d.m.Y H:i') }}</td>

	  

	    </tr>
    
    @endforeach
    
  </tbody>
</table>