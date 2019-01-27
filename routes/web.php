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
// End dahsboard

Auth::routes();

// Route::post('/login')
Route::post('/players/setplayers', "Players\SetPlayer@setPlayers");

Route::get('/{vue_capture?}', function () {
    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');
