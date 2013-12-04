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
Route::get('/login', array( 'uses' => 'HomeController@login', 'before' => 'guest'));
Route::get('/logout', array( 'uses' => 'HomeController@logout', 'before' => 'auth'));
Route::post('/authenticate', array( 'uses' => 'HomeController@authenticate', 'before' => 'guest'));
Route::get('/main', array('uses' => 'HomeController@main', 'before' => 'auth'));

//Resource routes
Route::resource('user', 'UserController');
Route::resource('picture', 'PictureController', array('except' => array('edit','delete')));