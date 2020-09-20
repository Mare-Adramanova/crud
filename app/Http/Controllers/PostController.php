<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostFormRequest;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use SebastianBergmann\Diff\Diff;
use Symfony\Component\HttpFoundation\Cookie;




class PostController extends Controller
{
    function __construct()
    {
       // $this->middleware('auth');
    }

    function index() {
        
        if(request('category')){
            $posts = Category::where('type', request('category'))->firstOrFail()->posts;
       
        //$posts = Post::all();
        $collected_posts = collect($posts);
        $maped_posts = $collected_posts->map(function($element){
           // $now = now(); 
           $element['edited_at'] = date_diff($now=now(), $element['updated_at']);
           return $element;
        }); }
        else{
            $posts = Post::all();
        $collected_posts = collect($posts);
        $maped_posts = $collected_posts->map(function($element){
           // $now = now(); 
           $element['edited_at'] = date_diff($now=now(), $element['updated_at']);
           return $element;
        });

        }
        return view('post/index', ['posts' => $maped_posts]);
    }

    function create(){
        
        $categories = Category::all();
        return view('post.create', ['categories' => $categories]);
    }

    function store( PostFormRequest $request){
     //dd($request->all());
      //Post::create($request->all());
      $image = $request->file('image');
      $filename = now()->timestamp .$image->getClientOriginalName();
      //dd($image);
      $image->storeAs('public', $filename);
      
      $post = new Post;
      $post->title = $request->title;
      $post->content = $request->content;
      $post->slug = $request->slug;
      $post->description = $request->description;
      $post->image = $filename; 
      $post->save();
        
      
          foreach($request->othertype as $type){
              if($type != null){
                  $explodet_type  = explode(',', $type);
                  
            $category = new Category;
           foreach($explodet_type as $explode){
               
               $category = new Category;
               $category->type = $explode;
               $category->save();
               $post->categories()->attach($category);
           }

           
           
            
            
        }else{
            $category = Category::find($request['type']);
            // dd($request['type']);
             $post->categories()->attach($category);
       
        }
          }
          
          
      
      
       

         return redirect()->route('posts.index');
    }

    function show(Post $post, Request $request){
        
        $post['edited_at'] = date_diff($now=now(), $post['updated_at']);
       
        $avg_ratings = $post->ratings()->avg('rating');
        $rating = number_format($avg_ratings);
        $post['rating'] = $rating;

       
      
       
        return view('/post/index', ['posts'=>[$post]]);
    }
    function get_cookies(){
        
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
