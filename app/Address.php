<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['u_id', 'country'];

    public function user(){
        return $this->belongsTo(User::class, 'u_id','id');
    }

    // public function owner(){
    //     return $this->belongsTo(User::class, 'u_id','id');
    // }

    
}
