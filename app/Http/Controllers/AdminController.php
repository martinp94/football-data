<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    

    public function __construct()
    {
    	//$this->middleware('auth:admin');
    }

    public function index()
    {
    	return view('administration.administration');
    }





    public function fixtures()
    {
    	return view('administration.fixtures.adm-fixtures');
    }

    public function competitions()
    {
    	return view('administration.competitions.adm-competitions');
    }

    public function teams()
    {
    	return view('administration.teams.adm-teams');
    }




    public function areas()
    {
    	return view('administration.areas.adm-areas');
    }






}
