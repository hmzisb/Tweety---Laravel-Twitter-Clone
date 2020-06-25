<?php

// DB::listen(function($query){ var_dump($query->sql, $query->bindings); });

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function(){
	Route::get('/tweets', 'TweetController@index')->name('home');
	Route::post('/tweets', 'TweetController@store')->name('Post-Tweet');
	Route::post('/profiles/{user:username}/follow', 'FollowsController@store');
	Route::post('/profiles/{user:username}/unfollow', 'FollowsController@delete');
	Route::get('/profiles/{user:username}/edit', 'ProfilesController@store')->middleware('can:edit,user');
	Route::patch('/profiles/{user:username}/edit', 'ProfilesController@update')->middleware('can:edit,user');
	Route::get('explore', 'ExploreController')->name('explore');
	Route::post('/tweets/{tweet}/like', 'TweetController@like');
	Route::post('/tweets/{tweet}/dislike', 'TweetController@dislike');
	Route::get('/likes', 'TweetController@likesList')->name('likes');
	Route::get('/profiles/{user:username}', 'ProfilesController@show')->name('profile');

	

});


