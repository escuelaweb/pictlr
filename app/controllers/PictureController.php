<?php

class PictureController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('picture.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//Create validation rules and object
		$rules = array(
			'picture'	=> 'required|image'
		);
		
		$validator = Validator::make(Input::all(), $rules);

		//If the form validates
		if(! $validator->fails())
		{
			//Instantiate a new picture object
			try
			{ 
				$picture = new Picture(Input::file('picture'));
				$picture->save();

				return Redirect::route('picture.show', $picture->id);
			}
			catch(Exception $e)
			{
				return Redirect::route('picture.create')->withMessage($e->getMessage());
			}
		}
		else
		{
			return Redirect::route('picture.create')->withErrors($validator);
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