<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\StandingTable;
use App\Standing;
use App\Competition;
use App\Season;

class StandingsController extends Controller
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
     * @param  int  $season_id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $shortName, $year)
    {
        $competition_id = Competition::where('shortName', '=', $shortName)->first()->id;

        $season = Season::where('competition', '=', $competition_id)->where('startDate', 'like', "{$year}%")->first();

        $standings = Standing::where('season_id', '=', $season->id)->where('type', '=', 'TOTAL')->first();

        if($standings)
            return view('administration.competitions.competitions-standings-season')->with('standings', $standings->table->sortBy('position'));

        \Session::flash('errorMsg', "Greška: Nema plasmana za ovu sezonu.");
        \Session::forget('successMsg');
        
        return redirect()->back();
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
     * @param  int  $competition_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $competition_id)
    {

        // GET RESULTS FROM API
        $standingsResult = \Football::findStandings($competition_id);

        // IF THERE IS NO RESULTS, REDIRECT TO PREVIOUS PAGE WITH MESSAGE
        if(!$standingsResult->standings)
        {
            \Session::flash('errorMsg', "Greška: Nema plasmana za ovo takmičenje.");
            \Session::forget('successMsg');
            return redirect()->back();
        }
        
        // STORE SEASON FOR STANDINGS
        $season = $standingsResult->season;


        // BEFORE UPDATING, DELETE ALL FROM STANDINGS TABLE AND STANDINGS_TABLE TABLE (CASCADE DELETE)

        Standing::where('season_id', '=', $season->id)->delete();

        // INSERT NEW VALUES IN BOTH TABLES

        foreach ($standingsResult->standings as $standing) {

            try {

                $newStanding = Standing::create([
                    'season_id' => $season->id,
                    'stage' => $standing->stage,
                    'type' => $standing->type,
                    'group' => $standing->group
                ]);

                foreach ($standing->table as $tableEntry) {

                    try {

                        StandingTable::create([
                            'standing_id' => $newStanding->id, 
                            'team_id' => $tableEntry->team->id, 
                            'position' => $tableEntry->position, 
                            'playedGames' => $tableEntry->playedGames, 
                            'won' => $tableEntry->won, 
                            'draw' => $tableEntry->draw, 
                            'lost' => $tableEntry->lost, 
                            'points' => $tableEntry->points, 
                            'goalsFor' => $tableEntry->goalsFor, 
                            'goalsAgainst' => $tableEntry->goalsAgainst, 
                            'goalsDifference' => $tableEntry->goalDifference
                        ]);

                        \Session::flash('successMsg', "Plasman je ažuriran uspješno.");
                        \Session::forget('errorMsg');

                    } catch (\Illuminate\Database\QueryException $e) {
                        \Session::flash('errorMsg', "Greška: Ažuriraranje nije uspjelo.");
                        \Session::forget('successMsg');
                    }
                }

            } catch (\Illuminate\Database\QueryException $e) {
                \Session::flash('errorMsg', "Greška: Ažuriraranje nije uspjelo.");
                \Session::forget('successMsg');
            }
        } 

        // REDIRECT TO PREVIOUS PAGE
        return redirect()->back();
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
