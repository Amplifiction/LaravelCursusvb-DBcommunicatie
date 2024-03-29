@extends('layouts.default')

@section('title', 'Edit comment')

@section('content')
    <section>
        <h2>Edit comment</h2>

        <p>
            <a href="/posts/id">Back to post</a> {{--{{route('posts.show', [$post->id])}} ?--}}
        </p>

        <form action="{{route('comments.update', $comment)}}" method="post">
            @method('PUT')
            @include('comments.includes.form', ['buttonText' => "Update"])
        </form>
    </section>
@endsection
