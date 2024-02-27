@extends('layouts.default')

@section('title', 'Posts')
<p>ZIE CURSUS "DATABANK COMMUNICATIE, HOOFDSTUKKEN "CRUD" EN "CRUD: RELATIES".</p>
<p>Dit zijn de stappen die gevolgd werden voor het creeëren van dit Laravel-project. De overige hoofdstukken zijn theoretische uitleg.</p>
@section('content')
    <section>
        <h2>Posts</h2>
        <div class="posts-list">
            @forelse ($posts as $post)
                @include('posts.includes.post-small', ['post' => $post])
            @empty
                <p>No posts have been added yet.</p>
            @endforelse
        </div>
        <div class="pagination">
            Previous ... 1 2 3 ... Next
        </div>
    </section>
@endsection
