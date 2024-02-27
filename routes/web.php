<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/posts');


// Route::get('/posts', [PostsController::class, 'index']) ->name('posts.index');
// Route::post('/posts', [PostsController::class, 'store']) ->name('posts.store');
// Route::get('/posts/create', [PostsController::class, 'create']) ->name('posts.create');
// Route::get('/posts/{post:url}', [PostsController::class, 'show']) ->name('posts.show');
// Route::put('/posts/{post}', [PostsController::class, 'update']) ->name('posts.update');
// Route::get('/posts/{post}/edit', [PostsController::class, 'edit']) ->name('posts.edit');
// Route::delete('/posts/{post}', [PostsController::class, 'destroy']) ->name('posts.destroy'); //niet in gebruik. Vervangen door get, die confirmatiepagina geeft.
    // {post} was {id}, maar dit vereiste find queries in de controller, die nu automatisch gebeuren. ({post:url} was {url}.)
Route::resource('/posts', PostsController::class); //vervangt bovenstaande
Route::get('/posts/{post}/delete', [PostsController::class, 'delete']) ->name('posts.delete'); //Deze confirmatiepg zit niet in het standaardschema van crud en wordt (standaard) dus niet geregeld door resource ctrlr.

Route::resource('/comments', CommentsController::class)->except(['index', 'show']);
//Route::get('/comments/id/edit', [CommentsController::class, 'edit']) ->name('comments.edit');



