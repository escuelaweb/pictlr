<?php

class Follower extends Eloquent
{
	public function follower_user()
	{
		return $this->belongsTo('User', 'follower_id');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}
}