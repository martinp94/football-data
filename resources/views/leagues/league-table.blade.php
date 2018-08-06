@extends('leagues.league-page')

@section('content')

@parent


@section('league-table')

<table class="table table-standings">
  <thead class="thead-dark table-standings-header">
    <tr>
      <th scope="col" style="width: 5%;" >Pozicija</th>
      <th scope="col" style="width: 20%;" >Klub</th>
      <th scope="col" style="width: 5%;" >Kolo</th>
      <th scope="col" style="width: 5%;" >Pobjede</th>
      <th scope="col" style="width: 5%;" >Neriješene</th>
      <th scope="col" style="width: 5%;" >Porazi</th>
      <th scope="col" style="width: 5%;" >Gol razlika</th>
      <th scope="col" style="width: 5%;" >Bodovi</th>
      <th scope="col" style="width: 45%;" class="table-standings-form-header">Forma</th>
    </tr>
  </thead>

  <tbody class="table-standings-body">

    <tr>
      <th class="table-standings-position ch-league-group" scope="row">1</th>
      <td class="table-standings-club"> <a href="?club=man_city">Manchester City</a> </td>
      <td class="table-standings-matches-played">38</td>
      <td class="table-standings-wins">32</td>
      <td class="table-standings-draws">4</td>
      <td class="table-standings-defeats">2</td>
      <td class="table-standings-goal-diff">106:27</td>
      <td class="table-standings-points">100</td>
      <td class="table-standings-form">

       <span class="table-standings-win">P</span> 
       <span class="table-standings-win">P</span> 
       <span class="table-standings-draw">N</span> 
       <span class="table-standings-win">P</span> 
       <span class="table-standings-win">P</span> 

      </td>
    </tr>
    
    <tr>
      <th class="table-standings-position ch-league-group" scope="row">2</th>
      <td class="table-standings-club"> <a href="?club=man_utd">Manchester United</a> </td>
      <td class="table-standings-matches-played">38</td>
      <td class="table-standings-wins">25</td>
      <td class="table-standings-draws">6</td>
      <td class="table-standings-defeats">7</td>
      <td class="table-standings-goal-diff">68:28</td>
      <td class="table-standings-points">81</td>
      <td class="table-standings-form">

       <span class="table-standings-win">P</span> 
       <span class="table-standings-draw">N</span> 
       <span class="table-standings-defeat">I</span> 
       <span class="table-standings-win">P</span> 
       <span class="table-standings-win">P</span>

      </td>
    </tr>

    <tr>
      <th class="table-standings-position" scope="row">.....</th>
      <td class="table-standings-club">.....</td>
      <td class="table-standings-matches-played">.....</td>
      <td class="table-standings-wins">.....</td>
      <td class="table-standings-draws">.....</td>
      <td class="table-standings-defeats">.....</td>
      <td class="table-standings-goal-diff">.....</td>
      <td class="table-standings-points">.....</td>
      <td class="table-standings-form">.....</td>
    </tr>

    <tr>
      <th class="table-standings-position" scope="row">.....</th>
      <td class="table-standings-club">.....</td>
      <td class="table-standings-matches-played">.....</td>
      <td class="table-standings-wins">.....</td>
      <td class="table-standings-draws">.....</td>
      <td class="table-standings-defeats">.....</td>
      <td class="table-standings-goal-diff">.....</td>
      <td class="table-standings-points">.....</td>
      <td class="table-standings-form">.....</td>
    </tr>

    <tr>
      <th class="table-standings-position" scope="row">11</th>
      <td class="table-standings-club"> <a href="?club=crystal_palace">Crystal Palace</a> </td>
      <td class="table-standings-matches-played">38</td>
      <td class="table-standings-wins">11</td>
      <td class="table-standings-draws">11</td>
      <td class="table-standings-defeats">16</td>
      <td class="table-standings-goal-diff">45:55</td>
      <td class="table-standings-points">44</td>
      <td class="table-standings-form">

       <span class="table-standings-win">P</span> 
       <span class="table-standings-win">P</span> 
       <span class="table-standings-win">P</span> 
       <span class="table-standings-draw">N</span> 
       <span class="table-standings-win">P</span>

      </td>
    </tr>

    <tr>
      <th class="table-standings-position relegation" scope="row">20</th>
      <td class="table-standings-club"> <a href="?club=wba"> WBA </a> </td>
      <td class="table-standings-matches-played">38</td>
      <td class="table-standings-wins">6</td>
      <td class="table-standings-draws">13</td>
      <td class="table-standings-defeats">19</td>
      <td class="table-standings-goal-diff">31:56</td>
      <td class="table-standings-points">31</td>
      <td class="table-standings-form">

       <span class="table-standings-defeat">I</span> 
       <span class="table-standings-win">P</span> 
       <span class="table-standings-win">P</span> 
       <span class="table-standings-draw">N</span> 
       <span class="table-standings-win">P</span>

      </td>
    </tr>
  </tbody>
</table>

@stop

@stop
