<?php

class Picture extends Eloquent
{
	const PICTURES_DIR = 'pictures';

	private $public_path;

	public function __construct($picture = null, $user_id = null)
	{
		//Setting the public_path attribute
		$this->public_path = public_path() . DIRECTORY_SEPARATOR;

		//If picture is an object of UploadedFile class
		if( $picture instanceof Symfony\Component\HttpFoundation\File\UploadedFile	)
		{
			//Move the picture to its final destination
			$file = $this->moveFileToDestination($picture);

			//If the file was correctly moved
			if($file !== null)
			{				
				//Set the picture attributes
				$this->setAttributes($file);
			}
			else
			{
				Throw new Exception('El archivo no subió correctamente');
			}
		}
	}

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function liked_by()
	{
		return $this->belongsToMany('User');
	}

	public function comments()
	{
		return $this->hasMany('Comment');
	}

	public function moveFileToDestination($file)
	{
		$basedir 		= $this->getDestinationPath();
		$filename		= Auth::user()->username . $file->getClientOriginalName();
		$filename		= md5($filename);
		$filename 	= $filename . '.' . $file->guessExtension();

		try
		{
			$file 					= $file->move($this->public_path . $basedir, $filename);
			$this->basedir	= $basedir;
			$this->filename	= $filename;
		}
		catch(Exception $e)
		{
			$file = null;
		}
		return $file;
	}

	public function getDestinationPath()
	{		
		$basedir	= self::PICTURES_DIR . DIRECTORY_SEPARATOR . date('Y') . DIRECTORY_SEPARATOR . date('m') . DIRECTORY_SEPARATOR . date('d') . DIRECTORY_SEPARATOR;

		//If the destination folder doesn't exist
		if(! is_dir($this->public_path . $basedir))
		{
			//Create the folder
			mkdir($this->public_path . $basedir, 0777, true);
		}

		//return the path
		return $basedir;
	}

	public function setAttributes($file, $user_id = null)
	{
		$dimensions 			= getimagesize($this->public_path . $this->basedir . $this->filename);
		$this->user_id 		= (isset($user_id) && ! empty($user_id)) ? $user_id : Auth::user()->id;		
		$this->mime_type	= $file->getMimeType();
		$this->size				= $file->getSize();		
		$this->width			= $dimensions[0];
		$this->height			= $dimensions[1];
		$this->basedir		= str_replace('\\', '/', $this->basedir);
	}

	public function deletePicture()
	{
		if( @unlink($this->public_path . $this->basedir . $this->filename) )
		{
			$this->delete();
		}
	}
}