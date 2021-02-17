<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
//use App\Models\Post;

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

Route::get('/', function () {
    return view('home')->with(['posts' => DB::table('posts')->join('users', 'posts.uid', '=', 'users.id')->select('posts.*','users.id as uid','users.name')->inRandomOrder()->get()]);;
})->name('home');

Route::get('/posts/{id}', function (Request $request) {
    $post = DB::table('posts')->join('users', 'posts.uid', '=', 'users.id')->where('posts.id',$request->id)->select('posts.*','users.id as uid','users.name')->get();
//    var_dump($post);
//    exit;
    return view('postview')->with(['post'=>$post[0]]);
})->name('postview');

Route::get('/dashboard', function (Request $request) {
    $post_count = DB::table('posts')->select(DB::raw('count(*) as count'))->where('uid',$request->user()->id)->get();
//    print_r($post_count[0]->count);
//    exit;
    return view('dashboard')->with(['request'=>$request,'post_count'=>$post_count[0]->count]);;
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
require __DIR__.'/post.php';
