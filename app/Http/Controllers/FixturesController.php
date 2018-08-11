<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Fixture;
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
            ->where('fixtures.status', '=', 'SCHEDULED')
            ->orderBy('fixtures.date')
            ->select('fixtures.homeTeam', 'fixtures.awayTeam', 'fixtures.date', 'fixtures.status', 'seasons.startDate', 'seasons.endDate', 'competitions.name as competition_name')
            ->get();

        $todayMatches = $scheduledAll->filter(function($fixture) use($today) {
            return $today->isSameDay(Carbon::parse($fixture->date));
        });

        return view('matches.matches-recent')->with('matches', $todayMatches);
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
        //
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
