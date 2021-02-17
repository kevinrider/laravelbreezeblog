<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
//use App\Models\Post;
use App\Http\Controllers\PostController;

Route::group(['middleware' => 'auth'], function () {
    //Index
    Route::get('/dashboard/posts', [PostController::class, 'index'])->name('posts.index');
    
    //New Post
    Route::get('/dashboard/posts/create', [PostController::class, 'create'])->name('posts.create');
    
    //Validation and store new post
    Route::post('/dashboard/posts/store', [PostController::class, 'store'])->name('posts.store');
    
    //Populate posts table from RSS feed
    Route::get('/dashboard/posts/rss', [PostController::class, 'populate'])->name('posts.rss');
    
    //View an existing post
    Route::get('/dashboard/posts/{id}', [PostController::class, 'show'])->name('post');
    
    //Edit existing post
    Route::get('/dashboard/posts/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    
    //Validate an update to existing post
    Route::post('/dashboard/posts/{id}/update', [PostController::class, 'update'])->name('post.update');
    
    //Delete existing post
    Route::get('/dashboard/posts/{id}/delete', [PostController::class, 'destroy'])->name('post.delete');
    
});

/*
//Show all posts
Route::get('/dashboard/posts', function () {
    return view('posts')->with(['posts' => Post::all()]);
})->middleware(['auth'])->name('posts');

*/












