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

	Route::get('/timovi/pretraga', 'AdminController@searchTeams')->name('administration.search-teams');


	Route::get('/oblasti', 'AdminController@areas')->name('administration.areas');
	


	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('administration.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('administration.login.submit');

});






// UTAKMICE

Route::get('/utakmice', 'FixturesController@index')->name('matches.recent');

Route::get('/uzivo', 'FixturesController@live')->name('matches.live');

Route::patch('matches/{id}', 'FixturesController@update')->name('match.update');

Route::post('/administracija/utakmice/{season_id}', 'FixturesController@storeBySeason')->name('matches.storeBySeason');







// LIGE

Route::get('/lige', 'CompetitionsController@index')->name('competitions.all');

Route::get('/lige/{country}', 'CompetitionsController@showByCountry')->name('competitions.country');

Route::get('/liga/{shortName}', 'CompetitionsController@show')->name('competition');

Route::get('/liga/{shortName}/tabela', 'CompetitionsController@standings')->name('competitions.standings');

Route::get('/liga/{shortName}/{season}/utakmice', 'CompetitionsController@matches')->name('competitions.matches');

Route::get('/liga/{shortName}/istorija', 'CompetitionsController@history')->name('competitions.history');

Route::get('/liga/{shortName}/{season}', 'CompetitionsController@show')->name('competitions.season');


Route::get('/administracija/lige', 'CompetitionsController@administrationIndex')->name('administration.leagues.all');
Route::get('/administracija/lige/dodavanje', 'CompetitionsController@create')->name('administration.leagues.add');

Route::get('/administracija/lige/{shortName}/utakmice', 'CompetitionsController@matchesAll')->name('administration.league.matches');

Route::get('/administracija/lige/{shortName}/plasman', 'CompetitionsController@editStandings')->name('administration.league.table');

Route::post('/administracija/lige/', 'CompetitionsController@store')->name('administration.leagues.store');


// PLASMANI

Route::get('/administracija/lige/{shortName}/{year}/plasman', 'StandingsController@show')->name('administration.standings.show');

Route::put('/administracija/lige/{competition_id}/ažuriranje', 'StandingsController@update')->name('administration.standings.update');


// KLUBOVI

Route::get('/klubovi', 'TeamsController@index')->name('teams.all');


Route::get('/klub/{tla}', 'TeamsController@show')->name('club');


Route::get('/klub/{tla}/info/', 'TeamsController@info')->name('club.info');


Route::get('/klub/{tla}/rezultati/', 'TeamsController@matches')->name('club.matches');


Route::get('/klub/{tla}/postavka/', 'TeamsController@squad')->name('club.squad');

Route::post('/administracija/timovi/pretraga/rezultati', 'TeamsController@getByName')->name('administration.teams.get-by-name');

Route::post('/klubovi/pretraga/rezultati', 'TeamsController@getByName')->name('teams.get-by-name');


Route::get('/administracija/timovi/{tla}/editovanje', 'TeamsController@edit')->name('team.edit');
Route::patch('/administracija/timovi/{tla}', 'TeamsController@update')->name('team.update');

Route::get('/administracija/timoviPoOblastima/dodavanje', 'TeamsController@createByCountry')->name('teams.create.by-country');
Route::get('/administracija/timoviPoSezonama/dodavanje', 'TeamsController@createBySeason')->name('teams.create.by-season');

Route::post('/administracija/timoviPoOblastima', 'TeamsController@storeByCountry')->name('teams.store.by-country');
Route::post('/administracija/timoviPoSezonama', 'TeamsController@storeBySeason')->name('teams.store.by-season');

// IGRACI, persons


Route::get('/igrac/{uriname}', 'PersonsController@show')->name('player');

Route::get('administracija/igraci/{id}/editovanje', 'PersonsController@edit')->name('persons.edit');
Route::patch('administracija/igraci/{id}', 'PersonsController@update')->name('persons.update');

// POSTAVKE-SQUADS

Route::get('/administracija/timovi/{tla}/postavke', 'SquadsController@showByTeam')->name('squad.by-team');
Route::put('/administracija/timovi/{team_id}/postavke/azuriranje', 'SquadsController@update')->name('squad.update');


// OBLASTI

Route::get('/administracija/oblasti/lista', 'AreasController@index')->name('areas.all');

Route::get('/administracija/oblasti/dodavanje', 'AreasController@create')->name('areas.create');
Route::get('/administracija/oblasti/{code}', 'AreasController@edit')->name('areas.edit');



Route::post('/oblasti', 'AreasController@store')->name('area.store');
Route::patch('/oblasti/{id}', 'AreasController@update')->name('area.update');


