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
Route::get('/', array( 'uses' => 'HomeController@index', 'before' => 'guest'));
Route::get('/login', array( 'uses' => 'HomeController@login', 'before' => 'guest'));
Route::get('/logout', array( 'uses' => 'HomeController@logout', 'before' => 'auth'));
Route::post('/authenticate', array( 'uses' => 'HomeController@authenticate', 'before' => 'guest'));
Route::get('/main', array('uses' => 'HomeController@main', 'before' => 'auth'));

//Resource routes
Route::resource('user', 'UserController');
Route::resource('picture', 'PictureController', array('except' => array('edit','update')));
Route::resource('comment', 'CommentController', array('only' => array('store')));

/*		Operation Routes		*/
//Like/Unlike
Route::post('/like/{picture}/{user}', array('uses' => 'OperationsController@like', 'as' => 'ops.like', 'before' => 'auth|same-user-control'));
Route::delete('/unlike/{picture}/{user}', array('uses' => 'OperationsController@unlike', 'as' => 'ops.unlike', 'before' => 'auth'));
//Follow/Unfollow
Route::post('/follow/{follower}/{user}', array('uses' => 'OperationsController@follow_unfollow', 'as' => 'ops.follow', 'before' => 'auth|same-user-control'));
Route::delete('/unfollow/{follower}/{user}', array('uses' => 'OperationsController@follow_unfollow', 'as' => 'ops.unfollow', 'before' => 'auth|same-user-control'));
