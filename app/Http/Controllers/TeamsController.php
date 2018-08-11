<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::orderBy('name', 'asc')->paginate(30);
      
        return view('clubs.clubs-all', compact('teams'));
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
