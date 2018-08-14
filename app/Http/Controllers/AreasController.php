<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AreaFormRequest;
use App\Area;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Area::whereNotNull('parentAreaId')->get();

        return view('administration.areas.all-areas')->with('countries', $countries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.areas.add-area');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaFormRequest $request)
    {

        $data = $request->all();

        $imageFile = $request->file('country_flag');
        $extension = $imageFile->getClientOriginalExtension();
        $imageFilename = $request->input('country_code') . '.png';
        $imageFile->move(public_path() . '/images/countries/', $imageFilename);

        $newArea = Area::create([
            'name' => $data['country_name'],
            'countryCode' => $data['country_code'],
            'parentAreaId' => $data['country_area'],
            'image' => $imageFilename
        ]);


        return view('administration.areas.adm-areas');
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
    public function edit(Request $request)
    {
        $area = Area::where('countryCode', '=', $request['code'])->first();
        return view('administration.areas.edit-area')->with('area', $area);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AreaFormRequest $request, $id)
    {
        $data = $request->all();

        $imageFile = $request->file('country_flag');
        $imageFilename = null;

        if($imageFile)
        {
            $extension = $imageFile->getClientOriginalExtension();
            $imageFilename = $request->input('country_code') . '.png';
            $imageFile->move(public_path() . '/images/countries/', $imageFilename);
        }
        
        
        $area = Area::find($id);

        $area->name = $data['country_name'];
        $area->countryCode = $data['country_code'];
        $area->parentAreaId = $data['country_area'];
        $area->image = $imageFilename == null ? null : $imageFilename;

        $area->save();

        return view('administration.areas.all-areas')->with('countries', Area::whereNotNull('parentAreaId')->get());
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
