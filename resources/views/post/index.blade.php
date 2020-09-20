@extends('layouts.main')


@section('content')
<div class="card bg-dark text-white flex-row flex-wrap ">
    @foreach ($posts as $post)
        <div class="card-header border-0">
           
            
            @if ("storage/{$post->image}" == 'storage/')
                <img src="data:image/jpeg;base64,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" alt="">
            
            @else
            <img src="{{ asset("storage/{$post->image}") }}" alt="" class="img-roundet float-left" style="width: 200px">
            @endif
                
           
        
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
             @else
             <h4>{{ 'You alredy voted' }}</h4>   
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

