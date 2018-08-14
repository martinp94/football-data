<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// KORISNICKI NALOZI

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::prefix('administracija')->group(function() {

	Route::get('/', 'AdminController@index')->name('administration');

	Route::get('/utakmice', 'AdminController@fixtures')->name('administration.matches');
	Route::get('/utakmice/azuriranje', 'FixturesController@fixturesToBeUpdated')->name('administration.matches-to-be-updated');



	Route::get('/takmicenja', 'AdminController@competitions')->name('administration.competitions');
	Route::get('/timovi', 'AdminController@teams')->name('administration.teams');


	Route::get('/oblasti', 'AdminController@areas')->name('administration.areas');
	


	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('administration.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('administration.login.submit');

});






// UTAKMICE

Route::get('/utakmice', 'FixturesController@index')->name('matches.recent');

Route::get('/uzivo', 'FixturesController@live')->name('matches.live');

Route::patch('matches/{id}', 'FixturesController@update')->name('match.update');





// LIGE

Route::get('/lige', 'CompetitionsController@index')->name('leagues.all');

Route::get('/lige/{country}', 'CompetitionsController@showByCountry')->name('league.country');

Route::get('/liga/{shortName}', 'CompetitionsController@show')->name('league');

Route::get('/liga/{shortName}/tabela', 'CompetitionsController@table')->name('league.table');

Route::get('/liga/{shortName}/{season}/utakmice', 'CompetitionsController@matches')->name('league.matches');

Route::get('/liga/{shortName}/istorija', 'CompetitionsController@history')->name('league.history');

Route::get('/liga/{shortName}/{season}', 'CompetitionsController@show')->name('league.season');





// KLUBOVI

Route::get('/klubovi', 'TeamsController@index')->name('teams.all');


Route::get('/klub/{tla}', 'TeamsController@show')->name('club');


Route::get('/klub/{tla}/info/', 'TeamsController@info')->name('club.info');


Route::get('/klub/{tla}/rezultati/', 'TeamsController@matches')->name('club.matches');


Route::get('/klub/{tla}/postavka/', 'TeamsController@squad')->name('club.squad');






// IGRACI


Route::get('/igrac/{uriname}', 'PersonsController@show')->name('player');


// OBLASTI

Route::get('/oblasti', 'AreasController@index')->name('areas.all');
Route::get('/oblasti/{code}', 'AreasController@edit')->name('areas.edit');
Route::get('/oblasti/dodavanje', 'AreasController@create')->name('areas.create');


Route::post('/oblasti', 'AreasController@store')->name('area.store');
Route::patch('/oblasti/{id}', 'AreasController@update')->name('area.update');


