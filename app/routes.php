<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

//Home routes
Route::get('/', 'HomeController@index');
Route::get('/login', 'HomeController@login');
Route::get('/logout', 'HomeController@logout');
Route::post('/authenticate', 'HomeController@authenticate');
Route::get('/main', 'HomeController@main');