<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PersonUpdateRequest;
use App\Person;

class PersonsController extends Controller
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
    public function show(Request $request)
    {
        $person = Person::where('uriname', $request['uriname'])->first();
        return view('players.player-info')->with('player', $person);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $person = Person::find($id);

        return view('administration.teams.team-player')->with('person', $person);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonUpdateRequest $request, $id)
    {

        $data = array_filter($request->all(), function($el, $key) {
            return $el != null && $key != '_token' && $key != '_method' && $key != 'image';
        }, ARRAY_FILTER_USE_BOTH);

        $imageFile = $request->file('image');
        $imageFilename = null;

        $person = Person::find($id);

        if($imageFile)
        {
            $extension = $imageFile->getClientOriginalExtension();
            $imageFilename = $person->uriname . ".{$extension}";
            $imageFile->move(public_path() . '/images/players/', $imageFilename);
            $person->image = $imageFilename;
        }

        $person->update($request->only(array_keys($data)));


        return redirect()->route('persons.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

    }
}
