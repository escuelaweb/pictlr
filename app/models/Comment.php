<?php

class Comment extends Eloquent
{
	public function picture()
	{
		return $this->belongsTo('Picture');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}
}