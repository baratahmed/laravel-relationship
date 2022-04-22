<?php

use App\Address;
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

Route::get('/users', function(){


    $users = User::with('address')->get();
    return view('users.index',compact('users'));

    // $addresses = Address::with('user')->get();
    // // $addresses = Address::with('owner')->get();
    // return view('addresses.index',compact('addresses'));

});



Route::get('/generate-users-addresses', 'TestController@createUsersAndAddresses' );



