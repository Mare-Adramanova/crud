<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Rating;
//use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Cookie;


class RatingController extends Controller
{
    public function store() {
      
        $post = Post::findOrFail(request('post_id'));
        $post->ratings()->create(['rating'=>request('rating')]);
       
      
        return redirect()->route('posts.show', ['post'=>$post, 'rating'=>'true']); 
    }

   
}
