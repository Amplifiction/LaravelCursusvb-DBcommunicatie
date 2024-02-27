<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',[
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post(); // om te vermijden dat je de fout "Undefined variable $post" krijgt, die ifv edit (bij edit willen we de velden invullen met $post) werd toegevoegd aan formulier. Bij het maken van een nieuwe post wordt het form dus ook ingevuld met $post, alleen is die hier leeg.
        return view('posts.create', [
            'post' => $post
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'in:draft,final', //Moet zitten in de lijst "draft, final". Maw status moet draft of final zijn.
            'content' => 'required'
        ]);

        $post = new Post();
        $post->title = $request->title; //PHP101: $_POST['title']
        $post->subtitle = $request->subtitle;
        $post->url = Str::slug($post->title); //The Str::slug method generates a URL friendly "slug" from the given string. (oa?) vervangt spaties door koppeltekens.
        $post->published = $request->has('published'); //in php101 zou dit zijn: isset($_POST['published']). Maw is dit veld aangevinkt?
        $post->status = $request->status;
        $post->content = $request->content;
        $post->save();

        //return redirect('/posts/'.$post->url);
        return redirect()->route('posts.show', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //$post = Post::where('url', $url)->first(); //overbodig omdat de route obv {post:url} gebeurt ipv {url}.
        return view('posts.show', [
            'post' => $post
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //$post = Post::find($id); //overbodig omdat de route obv {post} gebeurt ipv {id}.
        return view('posts.edit',[
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([ //overlapping met create. Er is een systeem om dubbele code te vermijden, maar zien we later.
            'title' => 'required',
            'status' => 'in:draft,final',
            'content' => 'required',
            'url' => 'required|alpha_dash' //The field under validation must be entirely Unicode alpha-numeric characters contained in \p{L}, \p{M}, \p{N}, as well as ASCII dashes (-) and ASCII underscores (_).
        ]);

        //$post = Post::find($id); //overbodig omdat de route obv {post} gebeurt ipv {id}.
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->url = $request->url;
        $post->published = $request->has('published');
        $post->status = $request->status;
        $post->content = $request->content;
        $post->save();

        //return redirect('/posts/'.$post->url);
        return redirect()->route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        //return redirect('/posts');
        return redirect()->route('posts.index');
    }

    public function delete(Post $post) {

        //$post = Post::find($id); //overbodig omdat de route obv {post} gebeurt ipv {id}.
        return view('posts.delete', [
            'post' => $post
        ]);
    }
}
