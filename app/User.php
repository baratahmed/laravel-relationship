<?php

namespace App;

use App\Events\UserCreated;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    // This is for Event Listener
    // protected $dispatchesEvents = [
    //     'created' => UserCreated::class,
    // ];

    protected $fillable = [
        'name', 'email', 'password',
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

    // public static function boot(){
    //     parent::boot();
    //     static::created(function($user){
    //         //dd('From Boot Method ', $user);
    //     });

    //     //For Updated
    //     // static::updated(function($user){
    //     //     //dd('From Boot Method ', $user);
    //     // });
    // }

    public function address(){
        // return $this->hasOne(Address::class,'user_id'); // select * from addresses where user_id = 1
        return $this->hasOne(Address::class,'u_id','id'); // if user_id is changed to u_id; and id is users id (primary key)
    }

    public function posts(){
        return $this->hasMany(Post::class,'u_id');
    }
}
