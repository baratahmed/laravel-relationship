<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Address;
use App\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TestController extends Controller
{
    public function createUsersAndAddresses(){


        ##### Way 01 && 02 && 03 #####
        // $user = factory(\App\User::class)->create();

        // \App\Address::create([
        //     'u_id' => $user->id,
        //     'country' => 'Thailand'
        // ]);

        // Or

        // $user->address()->create([
        //     'country' => 'Thailand'
        // ]);

        // Or

        // $user = factory(User::class)->create();
        // $address = new Address([
        //     'country' => 'Afganistan',
        // ]);
        // $address->user()->associate($user);
        // $address->save();

        ##### ;;;;; #####

        User::create([
            'name' => 'User One',
            'email' => 'user01@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'User Two',
            'email' => 'user02@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'User Three',
            'email' => 'user03@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'User Four',
            'email' => 'user04@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'User Five',
            'email' => 'user05@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'User Six',
            'email' => 'user06@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'User Seven',
            'email' => 'user07@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'User Eight',
            'email' => 'user08@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'User Nine',
            'email' => 'user09@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'User Ten',
            'email' => 'user10@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);



        Address::create([
            'u_id' => 1,
            'country' => 'Bangladesh',
        ]);
        Address::create([
            'u_id' => 2,
            'country' => 'USA',
        ]);
        Address::create([
            'u_id' => 3,
            'country' => 'Turkey',
        ]);
        Address::create([
            'u_id' => 4,
            'country' => 'Japan',
        ]);
        Address::create([
            'u_id' => 5,
            'country' => 'UK',
        ]);
        Address::create([
            'u_id' => 6,
            'country' => 'Portugal',
        ]);
        Address::create([
            'u_id' => 7,
            'country' => 'Pakistan',
        ]);
        Address::create([
            'u_id' => 8,
            'country' => 'India',
        ]);
        Address::create([
            'u_id' => 9,
            'country' => 'Srilanka',
        ]);
        Address::create([
            'u_id' => 10,
            'country' => 'Nepal',
        ]);

        return 'Users and Addresses have been created';
    }

}
