@extends('layouts.main')

@section('content')
<form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Title: </label>
            <input type="text" name="title" placeholder="title:" class="form-control" value="{{ $post->title }}">
        </div> 
        <div class="form-group">
            <label for="">Content: </label>
            <input type="text" name="content" placeholder="title:" class="form-control" value="{{ $post->content }}">
        </div> 
        <div class="form-group">
            <label for="">Slug: </label>
            <input type="text" name="slug" placeholder="title:" class="form-control" value="{{ $post->slug }}">
        </div> 
        <div class="form-group">
            <label for="">Description: </label>
            <input type="text" name="description" placeholder="title:" class="form-control" value="{{ $post->description }}">
        </div> 

        <input type="submit" class="btn btn-dark form-control mb-5" value="Edit">


    </form>
    
@endsection
