<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Fixture;
use App\FixtureDetails;
use \Carbon\Carbon;

class FixturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::now(2);

        $scheduledAll = DB::table('fixtures')
            ->join('seasons', 'fixtures.season_id', '=', 'seasons.id')
            ->join('competitions', 'seasons.competition', '=', 'competitions.id')
            ->whereNotNull('fixtures.date')
            ->where(function($query) {
                $query->where('fixtures.status', '=', 'SCHEDULED');
                $query->orWhere('fixtures.status', '=', 'FINISHED');
                $query->orWhere('fixtures.status', '=', 'IN_PLAY');
            })
            ->orderBy('fixtures.date')
            ->select('fixtures.id', 'fixtures.homeTeam', 'fixtures.awayTeam', 'fixtures.date', 'fixtures.status', 'seasons.startDate', 'seasons.endDate', 'competitions.name as competition_name')
            ->get();

        $todayMatches = $scheduledAll->filter(function($fixture) use($today) {
            return $today->isSameDay(Carbon::parse($fixture->date));
            /*return $today->lt(Carbon::parse($fixture->date)) && $today->diffInDays(Carbon::parse($fixture->date)) < 7;*/
        });

        return view('matches.matches-recent')->with('matches', $todayMatches);
    }

    public function live()
    {
        $today = Carbon::now(2);

        $scheduledAll = DB::table('fixtures')
            ->join('seasons', 'fixtures.season_id', '=', 'seasons.id')
            ->join('competitions', 'seasons.competition', '=', 'competitions.id')
            ->where('fixtures.status', '=', 'IN_PLAY')
            ->whereNotNull('fixtures.date')
            ->orderBy('fixtures.date')
            ->select('fixtures.id', 'fixtures.homeTeam', 'fixtures.awayTeam', 'fixtures.date', 'fixtures.status', 'seasons.startDate', 'seasons.endDate', 'competitions.name as competition_name')
            ->get();

        $liveMatches = $scheduledAll->filter(function($fixture) use($today) {
            return $today->isSameDay(Carbon::parse($fixture->date));
            /*return $today->lt(Carbon::parse($fixture->date)) && $today->diffInDays(Carbon::parse($fixture->date)) < 7;*/
        });

        return view('matches.matches-live')->with('matches', $liveMatches);
    }

    public function getFixturesToBeUpdated() 
    {
        $today = Carbon::now(2);

        $fixturesToBeUpdatedAll = DB::table('fixtures')
            ->join('seasons', 'fixtures.season_id', '=', 'seasons.id')
            ->join('competitions', 'seasons.competition', '=', 'competitions.id')
            ->join('teams as t1', 't1.id', '=', 'fixtures.homeTeam')
            ->join('teams as t2', 't2.id', '=', 'fixtures.awayTeam')
            ->whereNotNull('fixtures.date')
            ->where('fixtures.status', '=', 'SCHEDULED')
            ->orderBy('fixtures.date')
            ->select('fixtures.id', 't1.name as homeTeam', 't2.name as awayTeam', 't1.image as homeTeamImage', 't2.image as awayTeamImage', 'fixtures.matchday', 'fixtures.date', 'fixtures.status', 'seasons.startDate', 'seasons.endDate', 'competitions.name as competition_name')
            ->get();

        $fixturesToBeUpdatedAll = $fixturesToBeUpdatedAll->filter(function($fixture) use($today) {
            return $today->gt(Carbon::parse($fixture->date));
        });

        return $fixturesToBeUpdatedAll;
    }

    public function fixturesToBeUpdated()
    {
        
        $fixtures = $this->getFixturesToBeUpdated();

        return view('administration.fixtures.fixtures-to-update')->with('fixtures', $fixtures);
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
    public function update(Request $request, $id)
    {

        $matchDataNew = \Football::findMatch($id);

        // update za fixtures tabelu
        $status = $matchDataNew->status;

        $fixture = Fixture::find($id);

        $fixture->status = $status;

        $fixture->save();

        // update za fixture_details tabelu
        $winner = $matchDataNew->score->winner;

        $homeTeamFT = $matchDataNew->score->fullTime->homeTeam;
        $awayTeamFT = $matchDataNew->score->fullTime->awayTeam;

        $homeTeamHT = $matchDataNew->score->halfTime->homeTeam;
        $awayTeamHT = $matchDataNew->score->halfTime->awayTeam;

        $homeTeamET = $matchDataNew->score->extraTime->homeTeam;
        $awayTeamET = $matchDataNew->score->extraTime->awayTeam;

        $homeTeamPTS = $matchDataNew->score->penalties->homeTeam;
        $awayTeamPTS = $matchDataNew->score->penalties->awayTeam;

        $fixture_details = FixtureDetails::where('fixture_id', '=', $id)->first();

        $fixture_details->winner = $winner;

        $fixture_details->homeTeamFT = $homeTeamFT;
        $fixture_details->awayTeamFT = $awayTeamFT;

        $fixture_details->homeTeamHT = $homeTeamHT;
        $fixture_details->awayTeamHT = $awayTeamHT;

        $fixture_details->homeTeamET = $homeTeamET;
        $fixture_details->awayTeamET = $awayTeamET;

        $fixture_details->homeTeamPTS = $homeTeamPTS;
        $fixture_details->awayTeamPTS = $awayTeamPTS;

        $fixture_details->save();

        return view('administration.fixtures.fixtures-to-update')->with('fixtures', $this->getFixturesToBeUpdated());

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
