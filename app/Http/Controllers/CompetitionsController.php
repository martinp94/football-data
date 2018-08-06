<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competition;
use App\Area;

class CompetitionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leagues = Competition::all();

        return view('leagues.leagues-all', compact('leagues'));
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
    public function show(Request $request)
    {
        
        $competition = Competition::where('shortName', $request['shortName'])->first();
        return view('leagues.league-page')->with('competition', $competition);
    }

    public function showByCountry(Request $request)
    {
        $leagues = Area::where('countryCode', $request['country'])->first()->competitions;
        return view('leagues.leagues-all', compact('leagues'));
    }

    public function table(Request $request)
    {
        $competition = Competition::where('shortName', $request['shortName'])->first();
        return view('leagues.league-table')->with('competition', $competition);;
    }

    public function matches(Request $request)
    {
        $competition = Competition::where('shortName', $request['shortName'])->first();
        return view('leagues.league-matches')->with('competition', $competition);;
    }

    public function history(Request $request)
    {
        $competition = Competition::where('shortName', $request['shortName'])->first();
        return view('leagues.league-history')->with('competition', $competition);;
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
