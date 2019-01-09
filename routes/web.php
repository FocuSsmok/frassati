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
Route::get('/api/posts', "Posts\PostController@getPosts");
Route::get('/api/post', "Posts\PostController@getSinglePost");

Route::post('/players/setplayers', "Players\SetPlayer@setPlayers");
