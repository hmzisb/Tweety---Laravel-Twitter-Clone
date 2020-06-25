<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    //
	protected $guarded = [];

	//Relationship: Tweet belongs to a user
    public function user(){
    	return $this->belongsTo(User::class);
    }

    //Defining relation instance between tweets and likes
    public function likes(){
    	return $this->hasMany(Like::class);
    }

    //Get Total Number of Likes
    public function CountLikes(){
    	return  $this->likes()->where('liked', true)->count();
    }

    //Get Total Number of DisLikes
    public function countDislikes(){
    	return  $this->likes()->where('liked', false)->count();
    }

    //Like any tweet
    public function like($user = null, $liked = true){
    	return $this->likes()->updateOrCreate(
    		['user_id' => $user ? $user->id : currentUser()->id] ,
    		['liked' => $liked ]
    	);
    }

    //Dislike any tweet
    public function dislike(User $user){
    	return $this->like($user, false);
    }

    //Check if tweet is liked by specific user so you can show different 
    //..styles at frontend.
    public function isLikedBy(User $user){
    	return (bool) $user
    					->likes
    					->where('tweet_id', $this->id)
    					->where('liked', true)
    					->count();
    }

    //Same above, inversed.
    public function isDisLikedBy(User $user){
    	return (bool) $user
    					->likes
    					->where('tweet_id', $this->id)
    					->where('liked', false)
    					->count();
    }


    public function removeLike(User $user)
    {
        return $this->likes()->where('user_id', $user->id)->delete();
    }




}
