<?php

class OperationsController extends BaseController
{
	public function like($picture, $user)
	{
		//Instantiating user and picture
		$user 		= User::find($user);
		$picture	= Picture::find($picture);	

		//If user and picture exist
		if($user !== null && $picture !== null)
		{			
			//If user doesn't likes pic (No corresponding record in picture_user pivot table)	
			$user_picture = $user->liked_pictures()->where('picture_id', '=', $picture->id)->get()->first();			

			if( $user_picture === null )
			{
				$user->liked_pictures()->attach($picture->id);
			}
		}
		return Redirect::route('picture.show', $picture->id);
	}

	public function unlike($picture, $user)
	{
		//Instantiating user and picture
		$user 		= User::find($user);
		$picture	= Picture::find($picture);

		//If user and picture exist
		if($user !== null && $picture !== null)
		{			
			//If user likes pic (Corresponding record in picture_user pivot table)	
			$user_picture = $user->liked_pictures()->where('picture_id', '=', $picture->id)->get()->first();			

			if( $user_picture !== null )
			{
				$user->liked_pictures()->detach($picture->id);
			}
		}
		return Redirect::route('picture.show', $picture->id);
	}

	public function follow_unfollow($follower, $user)
	{
		//Both follower and user exist
		$follower_user	= User::find($follower);
		$user 					= User::find($user);

		if($follower_user !== null && $user !== null)
		{
			//If user is followed by follower
			if( $user->followedBy($follower_user->id)  )
			{				
				try
				{ 
					//Locate and delete the follower record
					$user->followers()->where('follower_id', '=', $follower_user->id)->delete();
					//$follower->delete();
				}catch(Exception $e){}
			}
			else
			{
				//Instantiate follower object and assign follower_id property
				$follower 							= new Follower();
				$follower->follower_id	= $follower_user->id;

				//Save follower record
				try{ $user->followers()->save($follower);}catch(Exception $e){}				
			}
		}
		return Redirect::route('user.show', $user->id);
	}
}