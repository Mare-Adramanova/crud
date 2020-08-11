@extends('layouts.main')


@section('content')
<div class="card bg-dark text-white flex-row flex-wrap ">
    @foreach ($posts as $post)
        <div class="card-header border-0">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS1-F1lmZKKycR6UwuJ3qioTWJWjs3ZxPsrzw&usqp=CAU" alt="" class="img-roundet float-left" style="width: 200px">
        </div>
        <div class="card-body card-block px-2 flex-fill col-lg-9 mt-5">
        
        <a href="{{ route('posts.show', $post->id) }}"><h4 class="card-title col-md-7">{{ $post->title }}</h4></a>
            <p class="card-text col-md-11">{{ $post->content }}</p>    
            <h6 class="card-text col-md-7"> last edited at: {{ $post->edited_at->y }} : year - {{ $post->edited_at->m }} : month - {{ $post->edited_at->d }} : days; </h6>
            <div class="card-text"> 
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="col-md-3">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-primary float-left" value="delete">
            </form>
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary float-left ml-5">Edit</a>
            </div>
        </div>
        
    @endforeach 
</div>    
@endsection

