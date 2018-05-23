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

Route::get('/project','ProjectController@index')->name("project");
Route::get('/project/{id}','ProjectController@detail')->name("projectDetail");
Route::post("/create",'ProjectController@create')->name("newProject");
Route::get("/createProject",'ProjectController@createView')->name("newProjectView");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
