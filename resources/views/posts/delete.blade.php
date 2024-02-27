@extends('layouts.default')

@section('title', 'Delete post')

@section('content')
    <section>
        <h2>Delete Post</h2>
        <p>Are you sure?</p>
        <form action="/posts/{{$post->id}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Yes, delete">
            <a href="/posts/{{$post->id}}">No, cancel</a>
        </form>
    </section>
@endsection
