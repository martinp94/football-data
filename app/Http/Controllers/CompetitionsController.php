<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\CompetitionFormRequest;
use App\Competition;
use App\Area;
use App\Season;

class CompetitionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $leagues = Competition::where('id', '!=', 2001)->get();
        return view('leagues.leagues-all', compact('leagues'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function administrationIndex()
    {

        $competitions = DB::table('competitions')
            ->leftJoin('seasons', 'competitions.id', '=', 'seasons.competition')
            ->leftJoin('fixtures', 'seasons.id', '=', 'fixtures.season_id')
            ->select('competitions.*', DB::raw('count(DISTINCT fixtures.homeTeam) as teams_count'), DB::raw('count(DISTINCT seasons.id) as seasons_count'))
            ->groupBy('competitions.id')
            ->get();

        return view('administration.competitions.competitions-all')->with('competitions', $competitions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.competitions.competitions-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompetitionFormRequest $request)
    {

        
        // Za competition-e

        $competition_id = $request->input('competition_id');
        $competition_name = $request->input('competition_name');
        $competition_country_id = $request->input('competition_country_id');
        $competition_plan = $request->input('competition_plan');
        $competition_shortName = mb_convert_case(str_replace(' ', '', $competition_name), MB_CASE_LOWER, "UTF-8");

        $competition_image = $request->file('competition_image');
        $imageFilename = $competition_name . '.jpg';
        $competition_image->move(public_path() . '/images/league_logos/', $imageFilename);

        $data = [$competition_id, $competition_name, $competition_country_id, $competition_image, $competition_plan, $competition_shortName];

        Competition::create([
            'id' => $competition_id,
            'name' => $competition_name,
            'shortName' => $competition_shortName,
            'area' => $competition_country_id,
            'plan' => $competition_plan
        ]);

        

        // Za sezone

        $seasons = \Football::findCompetition($competition_id)->seasons;

        foreach ($seasons as $season) {

            Season::create([
                'id' => $season->id,
                'startDate' => $season->startDate,
                'endDate' => $season->endDate,
                'competition' => $competition_id
            ]);
        }

        return view('administration.competitions.adm-competitions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
        
        $competition = Competition::where('shortName', $request['shortName'])->first();
        $season = $request['season'] == null ? 
            Season::where('competition', '=', $competition->id)->orderBy('startDate', 'desc')->first() :
            Season::where('competition', '=', $competition->id)->where('startDate', '=', $request['season'])->first();
            

        return view('leagues.league-page')->with([
            'competition' => $competition,
            'season' => $season
        ]);
    }

    public function showByCountry(Request $request)
    {
        $leagues = Area::where('countryCode', $request['country'])->first()->competitions;
        return view('leagues.leagues-all', compact('leagues'));
    }


    public function editStandings(Request $request, $shortName)
    {   
        // Return view with seasons for this competition

        $competition = Competition::where('shortName', '=', $shortName)->first();

        $seasons = Season::where('competition', '=', $competition->id)->get();

        return view('administration.competitions.competitions-standings-seasons')->with([
            'seasons' => $seasons,
            'competition_id' => $competition->id
        ]);
    }

    public function matches(Request $request)
    {
        $competition = Competition::where('shortName', $request['shortName'])->first();
        $season = $request['season'] == null ? 
            Season::where('competition', '=', $competition->id)->orderBy('startDate', 'desc')->first() :
            Season::where('competition', '=', $competition->id)->where('startDate', '=', $request['season'])->first();
      
        return view('leagues.league-matches')->with([
            'competition' => $competition,
            'season' => $season
        ]);
    }

    public function matchesAll(Request $request) 
    {

        $shortName = $request['shortName'];

        $matches = DB::table('fixtures')
            ->rightJoin('seasons', 'fixtures.season_id', '=', 'seasons.id')
            ->leftJoin('competitions', 'seasons.competition', '=', 'competitions.id')
            ->leftJoin('teams as th', 'fixtures.homeTeam', '=', 'th.id')
            ->leftJoin('teams as ta', 'fixtures.awayTeam', '=', 'ta.id')
            ->where('competitions.shortName', '=', $shortName)
            ->select('competitions.name', 'th.name as homeTeam', 'ta.name as awayTeam', 'seasons.startDate', 'seasons.id as season', 'fixtures.matchday', 'fixtures.date as fixture_date',
                        'th.image as homeTeamImage', 'ta.image as awayTeamImage')
            ->get();
            //dd($matches);
        return view('administration.competitions.competitions-fixtures')->with('fixtures', $matches);

    }

    public function history(Request $request)
    {
        $competition = Competition::where('shortName', $request['shortName'])->first();
        return view('leagues.league-history')->with('competition', $competition);;
    }

    public function standings(Request $request) 
    {
        dd($request);
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
