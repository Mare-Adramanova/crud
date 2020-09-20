<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;


class Post extends Model
{
    protected $fillable = ['title','content','slug','description', 'type', 'image'];

    public function comments(){
       return $this->hasMany(Comment::class);
    }

    public function ratings(){
        return $this->hasMany(Rating::class);
    }

    public function categories(){
        return $this->belongsToMany('App\Category');
    }
}
