<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name'									=> 'required',
			'username'							=> 'required|max:50|unique:users,username',
			'email'									=> 'required|email|unique:users,email',
			'password'							=> 'required|confirmed|min:8',
			'password_confirmation'	=> 'same:password'
		);

		$validator = Validator::make(Input::all(), $rules);

		if(! $validator->fails())
		{
			$user 						= new User();
			$user->name 			= Input::get('name');
			$user->username		= Input::get('username');
			$user->email			= Input::get('email');
			$user->password		= Hash::make( Input::get('password') );

			try
			{
				$user->save();
				Auth::login($user);
				return Redirect::to('/main');
			}
			catch(Exception $e)
			{
				return Redirect::route('user.create')->with('message', 'Se produjo un error')->withInput();
			}
		}
		else
		{
			return Redirect::route('user.create')->with('message', 'Ola k ase? Mete mal los datos o k ase?')->withInput()->withErrors($validator);
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);

		if($user !== null)
		{
			return View::make('user.edit')->with('user', $user);
		}
		else
		{
			return Redirect::to('/main')->with('message', 'El perfil solicitado no existe');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}