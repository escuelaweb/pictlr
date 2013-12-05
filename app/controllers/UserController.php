<?php

class UserController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth', array('except' => array('create', 'store')));
		$this->beforeFilter('guest', array('only' => array('create', 'store')));
		$this->beforeFilter('same-user-control', array('only' => array('edit','update', 'destroy')));
		$this->beforeFilter('csrf', array('only' => array('store', 'update','destroy')));
		$this->afterFilter('user-view-count', array('only' => array('show')));
	}

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
		$user = User::with('pictures')->find($id);

		if($user !== null)
		{
			return View::make('user.show')->with('user', $user);
		}
		else
		{
			App::abort(404);
		}
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
		//Loading the user record
		$user = User::find($id);

		//If the user exists
		if($user != null)
		{			
			//If the current password matches the actual user password
			if(Hash::check(Input::get('current_password'), $user->password))
			{				
				//Create validation rules
				$rules = array(
					'name' 											=> 'required',
					'new_password'							=> 'confirmed|min:8',
					'new_password_confirmation'	=> 'same:new_password'
				);
				if( Input::has('username') && Input::get('username') !== $user->username )
				{
					$rules['username'] = 'required|max:50|unique:users,username';
				}
				else
				{
					$rules['username'] = 'required|max:50';
				}
				$validator = Validator::make(Input::all(), $rules);

				//If form validates correctly
				if(! $validator->fails())
				{					
					//Update user record
					$user->name 		= Input::get('name');
					$user->username	= Input::get('username');
					if( Input::has('new_password') && Input::get('new_password') !== '' )
					{
						$user->password	= Hash::make(Input::get('new_password'));
					}

					try
					{
						$user->save();
						return Redirect::route('user.edit', $user->id);
					}
					catch(Exception $e)
					{
						return Redirect::route('user.edit', $user->id)->with('message', 'Se produjo un error');
					}
				}
				//Validator fails
				else
				{
					//Return to user.edit with message and validation errors
					return Redirect::route('user.edit', $user->id)->withErrors($validator);
				}
			}
			//Wrong Password
			else
			{
				//Return to user.edit, with message
				return Redirect::route('user.edit', $user->id)->with('message', 'Contraseña incorrecta');
			}
		}
		//User is null
		else
		{
			return Redirect::to('/main');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);		

		if($user != null)
		{
			try
			{
				$user->delete();
				return Redirect::to('/')->with('message', 'Usuario borrado exitosaente');
			}
			catch(Exception $e)
			{
				return Redirect::to('/main')->with('message', $e->getMessage());
			}
		}
		else
		{
			return Redirect::to('/main');
		}		
	}
}