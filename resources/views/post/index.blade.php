@extends('layouts.main')


@section('content')
<div class="card bg-dark text-white flex-row flex-wrap ">
    @foreach ($posts as $post)
        <div class="card-header border-0">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS1-F1lmZKKycR6UwuJ3qioTWJWjs3ZxPsrzw&usqp=CAU" alt="" class="img-roundet float-left" style="width: 200px">
        </div>
        <div class="card-body card-block px-2 flex-fill col-lg-9 mt-5">
             
            <h4 class="card-title col-md-7 "><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h4>
            
            
            
            <p class="card-text col-md-11">{{ $post->content }}</p>    
            <h6 class="card-text col-md-7"> last edited at: {{ $post->edited_at->y }} : year - {{ $post->edited_at->m }} : month - {{ $post->edited_at->d }} : days; </h6>
            @if (Route::currentRouteName() === 'posts.show')
               {{-- @if ($admin == 'true') --}}
               <div class="card-text ratings col-md-5 ">
                <form action="{{ route('ratings.store', ['post_id'=>$post->id]) }}" method="POST">
                    @csrf
                    <label for="radio1" >&#9733;</label>
                    <input id="radio1" type="radio" name="rating" value="1" class="star"/>

                    <label for="radio2">&#9733;</label>
                    <input id="radio2" type="radio" name="rating" value="2" class="star"/>

                    <label for="radio3">&#9733;</label>
                    <input id="radio3" type="radio" name="rating" value="3" class="star"/>

                    <label for="radio4">&#9733;</label>
                    <input id="radio4" type="radio" name="rating" value="4" class="star"/>

                    <label for="radio5">&#9733;</label>
                    <input id="radio5" type="radio" name="rating" value="5" class="star"/>
                
                    <input type="submit" value="Rate now" class="btn btn-warning">
                </form>    
                        

            </div>
               @auth
                   
                 
               
            <div class="card bg-dark flex-row flex-wrap" >   
                <a href="{{ route('comments.trash') }}" class="btn btn-primary mt-3 mb-3"> Recycle Bin</a>
                <div class="card-body card-block">
                    Category:
                    @foreach ($post->categories as $category)
                        <a href="{{ route('posts.index', ['category'=>$category->type]) }}" class="btn btn-primary">{{$category->type}}</a>
                        
                    @endforeach


                </div>
            </div>
                
                @if ($post->rating > 0 )
            <div class="post_rating">
                <span class="rating_icon">
                    
                    Rating :
                    @for($i = 0; $i < $post->rating; $i++)
                       <span class="fa fa-star light">&#9733;</span>
                    @endfor
                    @for($i = 0; $i < 5 - $post->rating; $i++)
                       <span class="fa fa-star ">&#9733;</span>
                    @endfor
                 </span>

            </div>
                
            @endif


                <ul class="list-group list-group-flush ">
                 @foreach ($post->comments as $comment)

                    
                   
                    @if ($comment->status != "" && $comment->status === 'open' && $comment->status !== 'approved')
                        
                    
                   
                    <li class="list-group-item bg-dark " style="color:{{ $comment->color }}">{!! htmlspecialchars_decode($comment->text) !!}
                        <form action="{{ route('comments.destroy',  ['comment'=>$comment->id, 'post_id'=>$post->id]) }}" method="POST" class="col-md-3">
                            @csrf
                            
                             @method('DELETE') 
                            <input type="hidden" name="id" value="{{ $comment->id }}">
                            <input type="submit" class="btn btn-primary float-right" value="delete">
                        </form>
                        
                            <form action="{{ route('comments.show', $comment->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="submit" value="Like">
                            </form>
                            
                    </li>
                    @endif    
                 @endforeach

            </ul> 
           
                
           
            
           
            <div class="card-text">
            <form class="form-group" action="{{ route('comments.store', ['post_id'=>$post->id]) }}" method="POST">
                    @csrf
                    <label> Comment</label>
                    <div class="row">

                        <textarea class="form-control col-md-7 mx-4" name="text" id="" ></textarea>
                    
                        <input type="submit" class="btn btn-primary col-md-2 ">
                        
                        <input type="color" name="color" id="color" class="col-md-1" value="#f0ad4e">

                    </div>
                    
                    
                </form>
            </div> 
           
            <div class="card-text"> 

                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="col-md-3">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-primary float-left" value="delete">
                </form>
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary float-left ml-5">Edit</a>
            </div>
           
                
            @else
                @if ($post->rating > 0 )
                 <div class="post_rating">
                    <span class="rating_icon">
                    
                    Rating :
                    @for($i = 0; $i < $post->rating; $i++)
                       <span class="fa fa-star light">&#9733;</span>
                    @endfor
                    @for($i = 0; $i < 5 - $post->rating; $i++)
                       <span class="fa fa-star ">&#9733;</span>
                    @endfor
                 </span>

            </div>
                
            @endif
                
            
            @foreach ($post->comments as $comment)
            
                @if ($comment->status == 'approved')
                    <div class="card-text">
                        <li class="list-group-item bg-dark " style="color:{{ $comment->color }}">{!! htmlspecialchars_decode($comment->text) !!}
                    </div>
                 @endif
             @endforeach
                
            
            <div class="card-text">
                <form class="form-group" action="{{ route('comments.store', ['post_id'=>$post->id]) }}" method="POST">
                        @csrf
                        <label> Comment</label>
                        <div class="row">
    
                            <textarea class="form-control col-md-7 mx-4" name="text" id="" ></textarea>
                        
                            <input type="submit" class="btn btn-primary col-md-2 ">
                            
                            <input type="color" name="color" id="color" class="col-md-1" value="#f0ad4e">
    
                        </div>
                        
                        
                    </form>
                </div> 
                
            
            @endauth  
            {{-- @endif --}}
            @endif
        </div>
        
                        
    @endforeach 
</div>    
@endsection
<style type="text/css">
.star {
    display: none;
}
.ratings label:hover {
    transform: scale(1.35, 1.35);
}
.ratings label {
    color: rgb(226, 218, 218);
    transition: transform .15s ease;
    font-size: 30px;
    cursor: pointer;
}
.ratings label:hover, label:hover ~ label{
    color: darkorange;
    
}
.star:checked ~ label{
    color: darkorange;
}
span .light{
    color: darkorange;
}

</style>

