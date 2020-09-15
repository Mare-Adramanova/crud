@extends('layouts.main')
@section('content')
    <form action="/emailsubmit" method="POST" class="was-validated">
        @csrf
    
        <div class="form-group">
            <label for="">Email: </label>
        <input type="email" name="email" placeholder="email:" class="form-control" value="{{ old('email') }}">
        
        @error('email')
        <p class="alert alert-danger">{{ $message ?? ''}}</p> 
        @enderror

        <input type="text" name="message" placeholder="message" class="form-control" value="{{ old('message') }}">
        @error('message')
        <p class="alert alert-danger">{{ $message ?? ''}}</p> 
        @enderror
        </div> 
            

        
        <input type="submit" class="btn btn-dark mb-5">

    </form>
    
@endsection



