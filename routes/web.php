<?php

use App\Address;
use App\Post;
use App\Project;
use App\Tag;
use App\Task;
use App\User;
use Illuminate\Support\Facades\Hash;

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

// There are 11 events in Model Lifecycle
// (retrieved, creating, created, updating, updated, saving, saved, deleting, deleted, restoring, restored)
// Laravel provides 3 ways to use these events
// (1. Event Listeners, 2. boot(), 3. Observer)

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/category/{category}', 'CategoryController@show')->name('category.show');


// Has Many Through

// Projects
//     id
// Users
//     id
//     project_id
// Tasks
//     id
//     user_id

##############

// Has Many Through Relation using Pivot Model
// Projects
//     id
// Users
//     id
// project_user
//      project_id, user_id


Route::get('/projects', function(){

    ### Has Many Through Pivot
    // $project1 = Project::create([
    //     'title' => 'Project A'
    // ]);
    // $project2 = Project::create([
    //     'title' => 'Project B'
    // ]);

    // $user01 = User::create([
    //     'name' => 'User One',
    //     'email' => 'user01@gmail.com',
    //     'password' => Hash::make('password'),
    // ]);

    // $user02 = User::create([
    //     'name' => 'User Two',
    //     'email' => 'user02@gmail.com',
    //     'password' => Hash::make('password'),
    // ]);
    // $user03 = User::create([
    //     'name' => 'User Three',
    //     'email' => 'user03@gmail.com',
    //     'password' => Hash::make('password'),
    // ]);

    // $project1->users()->attach($user01);
    // $project1->users()->attach($user02);
    // $project1->users()->attach($user03);

    // $project2->users()->attach($user01);
    // $project2->users()->attach($user03);

    #########################################

    // $project = Project::create([
    //     'title' => 'Project A'
    // ]);

    // $user01 = User::create([
    //     'name' => 'User One',
    //     'email' => 'user01@gmail.com',
    //     'password' => Hash::make('password'),
    //     'project_id' => $project->id
    // ]);

    // $user02 = User::create([
    //     'name' => 'User Two',
    //     'email' => 'user02@gmail.com',
    //     'password' => Hash::make('password'),
    //     'project_id' => $project->id
    // ]);

    // $task01 = Task::create([
    //     'title' => 'Task 01',
    //     'user_id' => 1
    // ]);
    // $task02 = Task::create([
    //     'title' => 'Task 02',
    //     'user_id' => 1
    // ]);
    // $task03 = Task::create([
    //     'title' => 'Task 03',
    //     'user_id' => 2
    // ]);
    // $task03 = Task::create([
    //     'title' => 'Task 04',
    //     'user_id' => 3
    // ]);

    $project = Project::find(2);
    return $project->tasks;
    // return $project->task;
    // return $project->tasks;
    return view('projects.index');

});


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


//One to Many  + Many to Many
Route::get('/posts', function(){

    // if pivot table has status column or attribute
    // $post = Post::first();
    // $post->tags()->attach([
    //     1 => [     // 1 is tag id
    //         'status' => 'approved'
    //     ]
    // ]);

    // $post = Post::first();
    // $post->tags()->detach([1]); // To delete from post_tag table

    // $post = Post::first();
    // $post->tags()->sync([
    //     2 => [     // first delete then add
    //         'status' => 'rejected'
    //     ]
    // ]);



    // $post = Post::first();
    // dd($post->tags->first()->pivot->created_at);
    // $post->tags()->attach(1);

    $posts = Post::with('user','tags')->get();
    return view('posts.index',compact('posts'));

    // $tag = Tag::first();
    // $post = Post::with('tags')->first();
    // $post->tags()->attach($tag);
    // $post->tags()->attach([2,3,4]);
    // $post->tags()->detach([2]);


    // $post = Post::with('tags')->first();
    // $post->tags()->detach();
    // $post->tags()->attach([1,4]);
    // Add detach + attach together Or ugit se sync
    // $post->tags()->sync([1,4]);
    // dd($post);

});



Route::get('/tags', function(){

    $tags = Tag::with('posts')->get();
    return view('tags.index',compact('tags'));

});



Route::get('/generate-users-addresses', 'TestController@createUsersAndAddresses' );
Route::get('/generate-posts', 'TestController@createPosts' );
Route::get('/generate-tags', 'TestController@createTags' );



