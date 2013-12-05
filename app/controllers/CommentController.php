<?php

class CommentController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'picture_id'	=> 'required|exists:pictures,id',
			'text'				=> 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		if(! $validator->fails())
		{
			$comment 							= new Comment();
			$comment->user_id 		= Auth::user()->id;
			$comment->picture_id	= Input::get('picture_id');
			$comment->text				= Input::get('text');

			try
			{
				$comment->save();
				return Redirect::route('picture.show', Input::get('picture_id'));
			}
			catch(Exception $e)
			{
				return Redirect::route('picture.show', Input::get('picture_id'))->with('message', 'Se produjo un error');
			}
		}
		else
		{
			return Redirect::route('picture.show', Input::get('picture_id'))->with('message', 'Se produjo un error');
		}

	}

}