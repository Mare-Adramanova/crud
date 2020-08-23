<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{

    protected $fillable = ['rating'];

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
