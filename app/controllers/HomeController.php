<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function index()
	{
		return View::make('home.index');
	}

	public function login()
	{
		return View::make('home.login');
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

	public function authenticate()
	{
		//Create validation rules
		$rules = array(
			'email' 		=> 'required|email',
			'password'	=> 'required|min:8'
		);
		$validator = Validator::make(Input::all(), $rules);

		//If form validates
		if(! $validator->fails())
		{
			//If user is correctly authenticated
			if(Auth::attempt(array('email' => Input::get('email'), 'password'	=> Input::get('password'))))
			{
				return Redirect::intended('/main');
			}
			else
			{
				//Redirect to login form with error message
				return Redirect::to('/login')->with('message', 'Ola k ase? Ce olbido su usuario y klave o ke ase?')->withInput();
			}
		}
		else
		{
			//Redirect to login form with validation messages
			return Redirect::to('/login')->withErrors($validator)->withInput();
		}
	}

	public function main()
	{		
		return View::make('home.main')->with('pictures', Auth::user()->getTimelinePictures());		
	}

}