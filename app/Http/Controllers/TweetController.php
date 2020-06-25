<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use App\User;

class TweetController extends Controller
{

	// public function __construct()
 //    {
 //        $this->middleware('auth');
 //    }

  
    public function index()
    { 
    	return view('tweets.index', [
            'tweets' => auth()->user()->timeline()
        ]);
    }

    public function store()
    {
    	$attribues = request()->validate(
            ['body' => 'required|min:5|max:255']
        );

    	Tweet::create([
    		'user_id' => auth()->id(),
    		'body' => $attribues['body']
    	]);

    	return redirect()->route('home');
    }

    public function like(Tweet $tweet)
    {
        $user = currentUser();
        $check = $tweet->isLikedBy($user);

        if($check)
        {
            $tweet->removeLike($user);
        } else {
             $tweet->like($user);
        }

        return back();
    }

    public function dislike(Tweet $tweet)
    {
        $user = currentUser();
        // $tweet->disLike($user);

        $check = $tweet->isDisLikedBy($user);

        if($check)
        {
            $tweet->removeLike($user);
        } else {
             $tweet->disLike($user);
        }

        return back();
    }

    //List of tweets user liked
    public function likesList()
    {
        $tweet_ids = currentUser()->likes()->where('liked', true)->latest()->pluck('tweet_id');
        $tweets = Tweet::whereIn('id', $tweet_ids)->paginate(20);

        return view('tweets.my', [
            'tweets' => $tweets
        ]);
    }
    
}
