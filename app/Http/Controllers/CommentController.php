<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentController extends Controller
{

   public function destroy($comment){
      //dd(request()->all());
     
      $comment = Comment::findOrFail($comment);
      
      $post = Post::findOrFail(request('post_id'));
    
      $comment->delete();
      
      
      return redirect()->route('posts.show', ['post'=>$post]); 

   }

   public function trash(){

      $comments = Comment::onlyTrashed()->orderBy('deleted_at', 'asc')->get();
      
      return view('/comment.deleted', ['comments'=>$comments, 'trash'=>true]);
   }

   public function restore($comment){
     
      Comment::withTrashed()->where('id', $comment)->restore();
      return redirect()->route('comments.trash');
   }

   public function remove($comment){

      Comment::withTrashed()->where('id', $comment)->forceDelete();
      return redirect()->route('comments.trash');

   }

   public function store(){
      
      $post = Post::findOrFail(request('post_id')); 
      
      $post->comments()->create(['text'=>request('text'), 'color'=>request('color'), 'status'=>'open']);
      $post['status'] = 'approved';
      
      return redirect()->route('posts.show', ['post'=>$post]);   
   }

   public function show(Comment $comment){
     
      
      $post = Post::findOrFail($comment->post_id);
      
      
      $post->comments()->where('id', $comment->id)->update(['text'=>$comment->text, 'color'=>$comment->color, 'status'=>'approved']);
     
      return redirect()->route('posts.show', ['post'=>$post, 'comment'=>$comment]);

   }
}
