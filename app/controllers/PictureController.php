<?php

class PictureController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth');
		//$this->beforeFilter('picture-belongs-to-user', array('only' => array('delete')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pictures = Picture::with('user')->orderBy('created_at', 'DESC')->get()->all();

		return View::make('picture.index')->with('pictures', $pictures);
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
				return Redirect::route('picture.create')->with('message', $e->getMessage());
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
		$picture = Picture::with('user', 'comments', 'comments.user')->find($id);

		if($picture !== null)
		{
			$view_data = array('picture' => $picture);
			return View::make('picture.show', $view_data);
		}
		else
		{
			App::abort(404);
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
		$picture = Picture::find($id);

		if($picture !== null)
		{
			$picture->deletePicture();
		}
		Redirect::to('/main');
	}

}