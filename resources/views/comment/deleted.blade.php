@extends('layouts.main')
@section('content')

<table class="table table-dark">
    <thead>
        <tr>
            <td>Post name</td>
            <td>Comment</td>
            <td></td>
            <td></td>

        </tr>

    </thead>
    <tbody>
    @foreach ($comments as $comment)
    
        <tr style="color:{{ $comment->color }}">
            <td>{{ $comment->post_id }}</td>
            <td>{!! htmlspecialchars_decode($comment->text) !!}</td>
            <td>
                <form action="{{ route('comments.restore', $comment->id) }}" method="GET">  
                        @csrf   
                    <input type="hidden" name="id" value="{{$comment->id }}">
                    <input type="submit" value="Restore" class="btn btn-success">      

                </form>
            </td>
            <td>
                <form action="{{ route('comments.remove', $comment->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            </td>
        </tr>
        
    @endforeach
    </tbody>
</table>
    
@endsection
