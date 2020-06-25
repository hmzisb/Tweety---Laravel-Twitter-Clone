<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Timeline of user.
    //Get id of people whom user follows + self.
    //We use follow function to return relation instead of db data 
    //-- and give pluck to get data from db using info from 'follow'.
    //Get data from db and return it.
    public function timeline()
    {
        $following = $this->follows()->pluck('id');
    
        return Tweet::whereIn('user_id', $following)
            ->orWhere('user_id', $this->id)
            ->latest()->paginate(10);
    }

    //return user own teets.
    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // We use mutators and just ask for avatar to get this value.
    public function avatarLink()
    {
        if ($this->avatar != '') {

            return asset($this->avatar);
            
        } else {
            return "https://avatars.dicebear.com/api/male/" . $this->email . ".svg";
        }  
    }

    public function path($append = '')
    {
        $path = route('profile', $this->username);

        return $append ? "{$path}/{$append}" : $path; 
    }
   

    // //Override route model binding column
    // public function getRouteKeyName(){
    //     return 'name';
    // }

    public function likedTweets()
    {
        return $this->hasManyThrough('App\Like', 'App\Tweet');
    }


}
