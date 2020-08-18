<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Post;
use Illuminate\Http\Request;
use SebastianBergmann\Diff\Diff;

class PostController extends Controller
{
    function index() {
        $posts = Post::all();
        $collected_posts = collect($posts);
        $maped_posts = $collected_posts->map(function($element){
           // $now = now(); 
           $element['edited_at'] = date_diff($now=now(), $element['updated_at']);
           return $element;
        });
        
        return view('post/index', ['posts' => $maped_posts]);
    }

    function create(){
        return view('post.create');
    }

    function store( PostFormRequest $request){
     
         Post::create($request->all());
         return redirect()->route('posts.index');
    }

    function show(Post $post){
      
        $post['edited_at'] = date_diff($now=now(), $post['updated_at']);
        $admin = true;
        return view('/post/index', ['posts'=>[$post], 'admin'=>$admin]);
    }

    function destroy(Post $post){
        $post->delete();
        return redirect()->route('posts.index');
    }

    function edit(Post $post){
        return view('post.edit', compact('post'));
    }
    
    function update(Post $post, PostFormRequest $request){
        
       
            $post->update($request->all());
            return redirect()->route('posts.index');
    }

}
