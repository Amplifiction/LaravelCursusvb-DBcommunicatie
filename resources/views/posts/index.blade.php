@extends('layouts.default')

@section('title', 'Posts')

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
            {{-- Previous ... 1 2 3 ... Next --}}
            {{$posts->links()}}
        </div>
    </section>
    <section>
        <hr>
        <h3>Zie cursus "Databank communicatie", hoofdstukken "CRUD" en "CRUD: relaties".</h3>
        <p>Hierin staan zijn de stappen die gevolgd werden voor het creeëren van dit Laravel-project. De overige hoofdstukken zijn theoretische uitleg.</p>
        <p>Ook alle extra secties toegepast = CRUD > extra , alle vanaf "mutators, accessors, casts".</p>
        <hr>
        <h3>Test password hash mutator (zie user model)</h3>
        <p>
            <?php
                $user = new App\Models\User;
                $user->password = "test";
                echo $user->password;
            ?>
        </p>
        <hr>
        <h3>Test fullName accessor (zie user model)</h3>
        <p>(even met name en email omdat usertabel geen voor- en achternaam voorziet.)
        <p>
            <?php
                $user->name = 'John';
                $user->email = 'john@test.be';
                echo $user->fullName;
            ?>
        </p>
        <hr>
        <h3>Test query scope (zie Post model)</h3>
        <p>
            <?php $posts = App\Models\Post::published()->get();?>
            <pre><?=var_dump($posts);?></pre>
        </p>
    </section>
@endsection

