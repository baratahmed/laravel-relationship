<?php

use App\Address;
use App\Post;
use App\User;

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

Route::get('/home', 'HomeController@index')->name('home');


//One to One
Route::get('/users', function(){

    // $users = User::with('address')->get();
    // return view('users.index',compact('users'));

    // $addresses = Address::with('user')->get();
    // // $addresses = Address::with('owner')->get();
    // return view('addresses.index',compact('addresses'));


    // $users = User::has('posts')->with('posts')->get();
    // $users = User::doesntHave('posts')->with('posts')->get();
    // $users = User::has('posts','>=',3)->with('posts')->get();
    $users = User::wherehas('posts',function($query){
        $query->where('title','like','%01%');
    })->with('posts')->get();

    return view('users.index',compact('users'));


});


//One to Many
Route::get('/posts', function(){

    $posts = Post::with('user')->get();
    return view('posts.index',compact('posts'));

});




Route::get('/generate-users-addresses', 'TestController@createUsersAndAddresses' );
Route::get('/generate-posts', 'TestController@createPosts' );



