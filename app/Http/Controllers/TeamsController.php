<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeamUpdateRequest;
use Illuminate\Support\Facades\DB;

use App\Team;
use App\Area;
use App\Competition;
use App\Season;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::whereNotNull('shortname')->where('shortname', '<>', '')->orderBy('shortname', 'asc')->paginate(30);
      
        return view('clubs.clubs-all', compact('teams'));
    }


    /**
     * Display a listing of the resource by attribute = name.
     *
     * @return \Illuminate\Http\Response
     */
    public function getByName(Request $request)
    {

        
        $club_name = $request->club_name;

        $teams = Team::where('name', 'like', '%' . $club_name . '%')->get();

        if($teams->count()) 
        {
            \Session::flash('successMsg', "Pronađeno {$teams->count()} timova");
            \Session::forget('errorMsg');
        }
        else 
        {
            \Session::flash('errorMsg', 'Nema rezultata');
            \Session::forget('successMsg');
        }

        if($request->from == 'admin')
            return view('administration.teams.teams-search-results')->with('teams', $teams);
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createByCountry()
    {
        return view('administration.teams.teams-create');
    }

    public function createBySeason()
    {

        $seasonsWithNoFixtures = DB::table('competitions')
        ->leftJoin('seasons', 'competitions.id', '=', 'seasons.competition')
        ->leftJoin('fixtures', 'seasons.id', '=', 'fixtures.season_id')
        ->groupBy('seasons.id', 'competitions.id')
        ->havingRaw('count(fixtures.id) = 0')
        ->select('competitions.id as comp_id', 'competitions.name as competition_name', 'seasons.id as season_id', 'seasons.startDate')
        ->get();

        return view('administration.teams.teams-create-by-season')->with('seasonsWithNoFixtures', $seasonsWithNoFixtures);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($teamsResult, $redirect_route, $area_id = null)
    {

        $teams_count = $teamsResult->count;

        $teams = $teamsResult->teams;

        if(!$teams_count)
        {
            \Session::flash('errorMsg', "Nije pronađen ni 1 klub.");
                return;
        }
    
        foreach ($teams as $key => $team) 
        {

            $area = empty($team->area->id) ? $area_id : $team->area->id;

            $tla = empty($team->tla) ? strtoupper(str_replace(' ', '', $team->name)) : $team->tla;
            $venue = empty($team->venue) ? $team->name . ' Stadium' : $team->venue;


            try {
                
                Team::insertIgnore([
                    'id' => $team->id,
                    'name' => $team->name, 
                    'area' => $area, 
                    'shortname' => $team->shortName, 
                    'tla' => $tla, 
                    'address' => $team->address, 
                    'phone' => $team->phone, 
                    'website' => $team->website, 
                    'email' => $team->email, 
                    'founded' => $team->founded, 
                    'club_colors' => $team->clubColors, 
                    'venue' => $venue, 
                    'image' => empty($team->shortName) ? null : $team->shortName . '.png',
                    'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'), 
                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')

                ]);

                

            } catch (\Illuminate\Database\QueryException $e) {
                \Session::flash('errorMsg', "Greška pri dodavanju timova.");
                    return redirect()->route($redirect_route);
            } catch (\PDOException $exception) {
                \Session::flash('errorMsg', "Greška pri dodavanju timova.");
                    return redirect()->route($redirect_route);
            } catch (\Exception $exception) {
                \Session::flash('errorMsg', "Greška pri dodavanju timova.");
                    return redirect()->route($redirect_route);
            }
        }
        
        \Session::flash('successMsg', "Timovi su uspješno dodani.");
        return redirect()->route($redirect_route);
    }

    public function storeBySeason(Request $request)
    {
        $season_year = $request->input('season_year');
        $competition_id = $request->input('competition_id');

        $area_id = Competition::find($competition_id)->area;

        $findTeams = \Football::getLeagueTeamsBySeason($competition_id, $season_year);

        $redirect_route = 'teams.create.by-season';

        $this->store($findTeams, $redirect_route, $area_id);

        return redirect()->route($redirect_route);


    }

    public function storeByCountry(Request $request) 
    {

        $findTeams = \Football::allTeamsForArea($request->country);
        
        $redirect_route = 'teams.create.by-country';

        $this->store($findTeams, $redirect_route);

        return redirect()->route($redirect_route);
    }

    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $team = Team::where('tla', $request['tla'])->first();
        return view('clubs.club-page')->with('team', $team);
    }


    public function info(Request $request)
    {
        $team = Team::where('tla', $request['tla'])->first();
        return view('clubs.club-info')->with('team', $team);
    }

    public function matches(Request $request)
    {
        $team = Team::where('tla', $request['tla'])->first();
        return view('clubs.club-matches')->with('team', $team);
    }

    public function squad(Request $request)
    {
        $team = Team::where('tla', $request['tla'])->first();

        return view('clubs.club-squad')->with([
            'team' => $team,
            'squad' => $team->persons
        ]);

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($tla)
    {
        $team = Team::where('tla', '=', $tla)->first();

        return view('administration.teams.team-edit')->with('team', $team);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamUpdateRequest $request, $tla)
    {


        $data = array_filter($request->all(), function($el, $key) {
            return $el != null && $key != '_token' && $key != '_method' && $key != 'image';
        }, ARRAY_FILTER_USE_BOTH);

        $imageFile = $request->file('image');
        $imageFilename = null;

        $team = Team::where('tla', '=', $tla)->first();

        if($imageFile)
        {
            $extension = $imageFile->getClientOriginalExtension();
            $imageFilename = $request->input('shortname') == null ? $request->input('name') . ".{$extension}" : $request->input('shortname') . ".{$extension}";
            $imageFile->move(public_path() . '/images/club_logos/', $imageFilename);
            $team->image = $imageFilename;

        }

        
        $team->update($request->only(array_keys($data)));

        return redirect()->route('team.edit', $team->tla);
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
