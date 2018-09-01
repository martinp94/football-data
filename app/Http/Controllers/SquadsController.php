<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Team;
use App\Squad;
use App\Person;

class SquadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $tla
     * @return \Illuminate\Http\Response
     */

    public function showByTeam($tla)
    {
        $teamId = Team::where('tla', '=', $tla)->first()->id;

        $squad = DB::table('squads')
            ->join('persons', 'squads.person_id', '=', 'persons.id')
            ->where('squads.team_id', '=', $teamId)
            ->whereNotNull('persons.position')
            ->select('squads.person_id', 'persons.name', 'persons.position', 'persons.image')
            ->get();

        return view('administration.teams.team-squad')->with([
            'squad' => $squad,
            'team_id' => $teamId
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $team_id)
    {
        $squad = \Football::findTeam($team_id)->squad;

        // if there are players, then update, othervise, send message to admin that there is no squad
        if(count($squad))
        {   
            // delete old squads
            $deletedRows = Squad::where('team_id', '=', $team_id)->delete();

            // insert new squads

            foreach ($squad as $key => $person) {

                // create new person if not exists
                
                if(!Person::find($person->id))
                {
                    $uriname = mb_strtolower(str_replace(' ', '', $person->name) . str_random(6));
                    $position = $person->position == "" ? null : $person->position;

                    Person::create([
                        'id' => $person->id,
                        'name' => $person->name,
                        'uriname' => $uriname,
                        'position' => $position,
                        'dateOfBirth' => \Carbon\Carbon::parse($person->dateOfBirth)->format('Y-m-d'),
                        'nationality' => $person->nationality,
                        'role' => $person->role

                    ]);
                }

                // create new row in squads table

                Squad::create([
                    'team_id' => $team_id,
                    'person_id' => $person->id
                ]);


            }

            \Session::flash('successMsg', "Postavke ažurirane uspješno.");
                        \Session::forget('errorMsg');

        }
        else
        {
            \Session::flash('errorMsg', "Nisu pronađeni igrači za ovaj klub.");
                        \Session::forget('successMsg');
        }

        return view('administration.teams.team-squad')->with([
            'squad' => DB::table('squads')
                ->join('persons', 'squads.person_id', '=', 'persons.id')
                ->where('squads.team_id', '=', $team_id)
                ->select('squads.person_id', 'persons.name', 'persons.position', 'persons.image')
                ->get(),
            'team_id' => $team_id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
