@extends('layouts.main')
@section('content')
    <form action={{ route("posts.index") }} method="POST" class="was-validated" enctype="multipart/form-data">
        @csrf
    
        <div class="form-group">
            <label for="">Title: </label>
        <input type="text" name="title" placeholder="title:" class="form-control" value="{{ old('title') }}">
        @error('title')
        <p class="alert alert-danger">{{ $message ?? ''}}</p> 
        @enderror
        </div> 
            

        <div class="form-group">
            <label for="">Content: </label>
            <input type="text" name="content" placeholder="content" class="form-control" value="{{ old('content') }}">
            @error('content')
                <p class="alert alert-danger">{{ $message ?? ''}}</p> 
            @enderror
        </div>
        
        <div class="form-group">
            <label for="">Slug: </label>
            <input type="text" name="slug" placeholder="slug" class="form-control" value="{{ old('slug') }}">
            @error('slug')
                <p class="alert alert-danger">{{ $message ?? ''}}</p> 
            @enderror
        </div>

        <div class="form-group">
            <label for="">Description: </label>
            <input type="text" name="description" placeholder="description" class="form-control" value="{{ old('description') }}">
            @error('description')
                <p class="alert alert-danger">{{ $message ?? ''}}</p> 
            @enderror
        </div>
        <ul>
        @foreach ($categories as $category)
        <div class="form-check">
            <li><input type="checkbox" name="type[]" class="form-check-input" id="check" value="{{$category->id}}" multiple>
            <label class="form-check-label" for="check">{{ $category->type }}</label></li>
        </div>
        @endforeach
        </ul>
        <div class="form-check">
        <input type="checkbox" name="other" class="form-check-input" id="check4" onclick="show()">
            <label class="form-check-label" for="check4">Other</label>
        </div>

        <div class="form-group" id="categories" style="display: none">
            <label for="">Categories: </label>
            <input type="text" name="othertype[]" placeholder="categories" class="form-control">
            
        </div>


        {{-- <div class="form-check"> 
            <input type="checkbox" name="type[]" class="form-check-input" id="check1" >
            <label class="form-check-label" for="check1">IT</label>
        </div>
        <div class="form-check">
            <input type="checkbox" name="type[]" class="form-check-input" id="check2" value="{{'IT'}}" onclick="hide()">
            <label class="form-check-label" for="check2">Financial</label>
        </div>
        <div class="form-check">
            <input type="checkbox" name="type[]" class="form-check-input" id="check3" onclick="hide()">
            <label class="form-check-label" for="check3">Economics</label>
        </div>
        <div class="form-check">
            <input type="checkbox" name="type[]" class="form-check-input" id="check4" onclick="show()">
            <label class="form-check-label" for="check4">Other</label>
        </div>

        <div class="form-group" id="categories" style="display: none">
            <label for="">Categories: </label>
            <input type="text" name="type[]" placeholder="categories" class="form-control">
            
        </div> --}}
        <div class="form-group">
            <label for="exampleFormControlFile1">Image :</label>
            <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>

    
        <input type="submit" class="btn btn-dark mb-5">

    </form>
    
@endsection

<script type="text/javascript">
    function show() { document.getElementById('categories').style.display = 'block'; }
    function hide() { document.getElementById('categories').style.display = 'none'; }
</script>

