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

// Auth
Route::get('/admin', "AdminController@index");
Auth::routes();
// End Auth

// Dashborad
// Posts
Route::get('/admin/posts', "Admin\Posts\PostController@allPosts");
Route::get('/admin/post/{post_id}/edit', "Admin\Posts\PostController@editPost");
// EndPosts
// End dahsboard

// Route::post('/login')
Route::post('/players/setplayers', "Players\SetPlayer@setPlayers");

Route::get('/{vue_capture?}', function () {
    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');
