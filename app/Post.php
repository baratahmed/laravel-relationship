<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['u_id','title'];

    public function user(){
        return $this->belongsTo(User::class,'u_id')->withDefault([
            'name' => 'Guest User',
        ]);
    }

    public function tags(){

        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id','tag_id')
                ->using(PostTag::class)
                ->withTimestamps()  // Creating Timestamp For pivot table
                ->withPivot('status');  // To get the relationship for attribute 'status' from pivot table
    }
}
