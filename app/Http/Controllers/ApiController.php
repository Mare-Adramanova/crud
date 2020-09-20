<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Post;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    function getAllPosts(){

        return Post::all();

    }

    function getPost(Post $post){
         
        return $post;
    }

    public function createPost(Request $request){
        $image = $request->file('image');
        $filename = now()->timestamp .$image->getClientOriginalName();
        $image->storeAs('public', $filename);

         request()->validate([

            'title' => ['required', 'min:5', 'max:10'],
            'content' => 'required',
            'slug' => 'required',
            'description' => ['required', 'email:rfc'],
            'image'=>'required'

        ]);
        
        
        Post::create([
            'title' => request('title'),
            'content' => request('content'),
            'slug'=> request('slug'),
            'description' =>request('description'),
            'image'=>$filename

        ]);
        
        return response()->json([
            "message" => "post record created"
        ], 201);

        

    }

    public function deletePost(Post $post){

       if($post->exists()){
        $post->delete();
        return response()->json([
            "message" => "records deleted"
          ], 202);
       }else{
        return response()->json([
            "message" => "records not found"
          ], 404);

       }
       

    }

    public function updatePost(Post $post, Request $request){

        $post->title = is_null($request->title) ? $post->title : $request->title;
        $post->content = is_null($request->content) ? $post->content : $request->content;
        $post->slug = is_null($request->slug) ? $post->slug : $request->slug;
        $post->description = is_null($request->description) ? $post->description : $request->description;
        $post->image = is_null($request->image) ? $post->image : $request->image;

        $post->save();

        return response()->json([
            "message" => "records updated successfully"
        ], 200);


    }

    protected function validatePosts()
    {
        return request()->validate([
            'title' => ['required', 'min:5', 'max:10'],
            'content' => 'required',
            'slug' => 'required',
            'description' => ['required', 'email:rfc'],
            'image'=>'required'
        ]);
    }

}
