@extends('layouts.default')

@section('title', $post->title)

@section('content')
    <section class="post-details">
        <header class="post-header">
            <h2 class="post-title">{{$post->title}}</h2>
            <p class="post-subtitle">{{$post->subtitle}}</p>
        </header>

        <div class="post-actions">
            <a href="{{route('posts.edit', $post)}}">Edit this post</a> or
            <a href="{{route('posts.delete', $post)}}">Delete this post</a>
            {{-- CRUDE METHOD. Delete zonder confirmatie en dat wil je niet.
                Bijhorende route = Route::delete('/posts/{id}', [PostsController::class, 'destroy']);

                <form action="/posts/{{$post->id}}" method="post">
                    @method('delete')
                    @csrf
                <input type="submit" value="Delete this post">
                </form>
            --}}
        </div>

        <div>
            {{$post->content}}
        </div>

        <aside class="comments">
            <h3>Comments</h3>
            <div class="comment-section">
                <div class="comment-form">
                    <form action="{{route('comments.store')}}" method="post">
                        <input type="hidden" name="post_id" value="{{$post->id}}"> <!-- Om het post id mee te sturen kunnen we een hidden input in het formulier gebruiken. -->
                        @include('comments.includes.form', ['buttonText' => "Add comment"])
                    </form>
                </div>
                <div class="comments-list">
                    @forelse ($post->comments as $comment)
                        @include('comments.includes.comment')
                    @empty
                        <p>No comments yet.</p>
                    @endforelse
                </div>
            </div>
        </aside>
    </section>
@endsection
