<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function pictures()
	{
		return $this->hasMany('Picture');
	}

	public function liked_pictures()
	{
		return $this->belongsToMany('Picture')->withPivot('created_at', 'updated_at');
	}

	public function comments()
	{
		return $this->hasMany('Comment');
	}

	public function followers()
	{
		return $this->hasMany('Follower');
	}

	public function following()
	{
		return $this->hasMany('Follower', 'follower_id');
	}

	public function getTimelinePictures()
	{
		$pictures 			= Picture::with('user')->where('user_id', '=', Auth::user()->id);		
		$following_ids	= $this->following()->select('user_id')->get()->all();

		if(! empty($following_ids))
		{
			foreach($following_ids as $key => &$val)
				$val = $val->user_id;

			$pictures	= $pictures->orWhereIn('user_id', $following_ids );
		}
		
		$pictures = $pictures->orderBy('created_at', 'DESC')->get()->all();

		return $pictures;
	}

	public function followedBy($follower_id)
	{		
		if( $this->followers()->where('follower_id', '=', $follower_id)->get()->first() === null )
			return false;
		else
			return true;
	}

	public function likesPicture($picture_id)
	{
		if( $this->liked_pictures()->where('picture_id', '=', $picture_id)->get()->first() === null )
			return true;
		else
			return false;
	}
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
		return 'remember_token';
	}
}