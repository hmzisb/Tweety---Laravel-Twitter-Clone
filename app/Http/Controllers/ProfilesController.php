<?php

namespace App\Http\Controllers;
use App\User;
use App\Tweet;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;


class ProfilesController extends Controller
{
    public function show(User $user)
    {
        // $tweets = Tweet::where('user_id', $user->id)->paginate(5);

        $tweets = $user->tweets()->paginate(5);
        
        return view('profiles.show', compact('user','tweets'));

    }

    public function store(User $user)
    {
    	
    	return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {

    	$attributes = request()->validate
    	([
    		'username' => [
    			'required', 
    			'string',
    			'max:255',
    			'alpha_dash',
    			Rule::unique('users')->ignore($user)
    		],


            'name' => [
            	'required',
            	 'string',
            	 'max:255'
            	],

            'email' => [
            	'required',
            	'string', 
            	'email',
            	'max:255',
            	Rule::unique('users')->ignore($user)
            	],

            'password' => [
            	'string',
            	'min:8', 
             	'confirmed',
             	'nullable'
             ],

             'avatar' => [
             	'file',
             	'nullable'
             ]
    	]);


    	//Password update check
    	if($attributes['password'] == '')
    	{
    		Arr::forget($attributes, 'password');

    	} else {
    		$attributes['password'] = Hash::make($attributes['password']);    
    	}

    	//Check if Avatar is uploaded
    	if(request('avatar') != '')
    	{
    		$attributes['avatar'] = request('avatar')->store('avatars');    
    	}


    	// dd($attributes);

    	$user->update($attributes);

    	return redirect($user->path());
    }
}
