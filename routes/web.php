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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/team', "PlayersController@getPlayers");
Route::get('/api/team/allPlayers', "PlayersController@getAllPlayers");
Route::post('/api/team/addPlayer/{player_id?}', "PlayersController@addPlayer");
Route::post('/api/team/updatePlayer/{team}/{player_id}', "PlayersController@updatePlayer");
Route::post('/api/game/addTeam/{age_group}', "Admin\Games\GamesController@addTeam");
Route::post('/api/game/editTeam/{age_group}/{team_id}', "Admin\Games\GamesController@editTeam");
Route::post('/api/game/deleteTeam/{age_group}/{team_id}', "Admin\Games\GamesController@deleteTeam");
Route::get('/api/game/getTeams/{age_group}', "Admin\Games\GamesController@getTeams");
Route::post('/api/game/addFixture/{age_group}', "Admin\Games\GamesController@addFixture");
Route::post('/api/game/updateFixture/{age_group}', "Admin\Games\GamesController@updateFixture");
Route::get('/api/game/table/{age_group}', "Admin\Games\GamesController@generateTable");
Route::get('/api/game/allFixture/{age_group}', "Admin\Games\GamesController@allFixture");
Route::get('/api/game/recentlyFixture', "Admin\Games\GamesController@recentlyFixture");
Route::get('/api/posts', "Posts\PostController@getPosts");
Route::get('/api/post', "Posts\PostController@getSinglePost");
Route::get('/api/positions', "PositionController@getPositions");
// Auth
Route::get('/admin', "AdminController@index");
// End Auth

// Dashborad
// Posts
Route::get('/admin/posts', "Admin\Posts\PostController@allPosts");
Route::get('/admin/post/{post_id}/edit', "Admin\Posts\PostController@editPost");
Route::get('/admin/post/add', "Admin\Posts\PostController@addPost");
Route::post('/admin/post/save', "Admin\Posts\PostController@createPost");
Route::post('/admin/post/{post_id}/update', "Admin\Posts\PostController@updatePost");
// EndPosts

// Teams
Route::get("/admin/teams", "Admin\Teams\TeamsController@allTeams");
Route::get("/admin/teams/{team}", "Admin\Teams\TeamsController@editTeam");
// EndTeams

// Games
Route::get("/admin/games", "Admin\Games\GamesController@games");
Route::get("/admin/games/{team}", "Admin\Games\GamesController@teamGames");
// End Games
// End dahsboard

Auth::routes();

// Route::post('/login')
Route::post('/players/setplayers', "Players\SetPlayer@setPlayers");

Route::get('/{vue_capture?}', function () {
    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');
