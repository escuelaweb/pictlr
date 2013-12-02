<?php

class Picture extends Eloquent
{
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
}