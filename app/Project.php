<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    // public function users(){
    //     return $this->hasMany(User::class);
    // }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function tasks(){

        return $this->hasManyThrough(
            Task::class,
            Team::class,
            'project_id', // Foreign key in users table
            'user_id',    // Foreign key in tasks table
            'id',         // Local key in projects table
            'user_id'
        );

        // return $this->hasManyThrough(
        //     Task::class,
        //     User::class,
        //     'project_id', // Foreign key in users table
        //     'user_id',  // Foreign key in tasks table
        //     'id'  // Local key in projects table
        // );

    }

    public function task(){

        return $this->hasManyThrough(
            Task::class,
            Team::class,
            'project_id', // Foreign key in users table
            'user_id',    // Foreign key in tasks table
            'id',         // Local key in projects table
            'user_id'
        );


        // return $this->hasOneThrough(
        //     Task::class,
        //     User::class,
        //     'project_id', // Foreign key in users table
        //     'user_id',    // Foreign key in tasks table
        //     'id',         // Local key in projects table
        // );
    }
}
