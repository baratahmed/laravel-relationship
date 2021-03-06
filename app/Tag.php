<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function posts(){
        return $this->belongsToMany(Post::class, 'post_tag', 'tag_id','post_id');
    }

}
