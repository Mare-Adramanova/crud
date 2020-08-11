<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;


class Post extends Model
{
    protected $fillable = ['title','content','slug','description'];

   public function comments(){
       return $this->hasMany(Comment::class);
   }
}
