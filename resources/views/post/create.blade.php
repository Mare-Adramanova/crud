@extends('layouts.main')
@section('content')
    <form action="/posts" method="POST" class="was-validated">
        @csrf
    
        <div class="form-group">
            <label for="">Title: </label>
        <input type="text" name="title" placeholder="title:" class="form-control" value="{{ old('title') }}">
        @error('title')
        <p class="alert alert-danger">{{ $mesage ?? ''}}</p> 
        @enderror
        </div> 
            

        <div class="form-group">
            <label for="">Content: </label>
            <input type="text" name="content" placeholder="content" class="form-control" value="{{ old('content') }}">
            @error('content')
                <p class="alert alert-danger">{{ $mesage ?? ''}}</p> 
            @enderror
        </div>
        
        <div class="form-group">
            <label for="">Slug: </label>
            <input type="text" name="slug" placeholder="slug" class="form-control" value="{{ old('slug') }}">
            @error('slug')
                <p class="alert alert-danger">{{ $mesage ?? ''}}</p> 
            @enderror
        </div>

        <div class="form-group">
            <label for="">Description: </label>
            <input type="text" name="description" placeholder="description" class="form-control" value="{{ old('description') }}">
            @error('description')
                <p class="alert alert-danger">{{ $mesage ?? ''}}</p> 
            @enderror
        </div>
    
        <input type="submit" class="btn btn-dark mb-5">

    </form>
    
@endsection

