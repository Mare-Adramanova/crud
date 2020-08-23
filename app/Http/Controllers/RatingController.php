<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Rating;

class RatingController extends Controller
{
    public function store() {
        
        $post = Post::findOrFail(request('post_id'));
        $post->ratings()->create(['rating'=>request('rating')]);
        $avg_ratings = $post->ratings()->avg('rating');
        $rating = number_format($avg_ratings);
        $post['rating'] = $rating;
        
     // dd($post->rating);
        return redirect()->route('posts.show', ['post'=>$post, 'rating'=>'true']); 
    }

    public function show(){
        $post = Post::findOrFail(request('post_id'));
        dd($post);
        dd($post->ratings()->avg('rating'));
        $ratings = Rating::findOrFail(request('post_id'))->all();
        dd($ratings);
       
            $avg = $post->ratings()->avg($ratings);
        dd($avg);
        $avg = $post->ratings()->avg('ratings');
        dd($avg);
        $rating = number_format($avg); 

    }
}
