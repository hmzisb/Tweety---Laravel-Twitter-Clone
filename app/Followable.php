<?php

namespace App;

trait Followable
{
	 //Save a new follow relation in db pivot table using existing relationship
    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    //Remove relation in pivot table using detach method.
    public function unFollow(User $user)
    {
    	return $this->follows()->detach($user);
    }

    //People followed by User - Defining relation of user with user - table follows, columns next 2
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    //Check if user is following the user given in argument. 
    //Using where clause.
    public function following(User $user)
    {
    	return $this->follows()
    			->where('following_user_id', $user->id)
    			->exists();
    }

 	//Toggle method to auto do follow/unfollow based on current status.
    public function toggleFollow(User $user)
    {
         //using lara toggle method t auto attach/deattach on reverse condition
        $this->follows()->toggle($user);
    }
}

?>