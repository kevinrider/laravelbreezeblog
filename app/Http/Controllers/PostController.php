<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\RegisteredUserController;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('posts.index', ['posts' => DB::table('posts')->where('uid', $request->user()->id)->orderByDesc('id')->paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        print $request->user('id');
//        exit;
//        echo $request->user()->id;
//        exit;
//        var_dump($request->user()->id);
//        exit;
        $validated = $request->validate([
        'title' => 'required|unique:posts|min:5',
        'comment' => 'required|min:20',
        ]);
        DB::table('posts')->insert(['title' => $request->title, 'body' => $request->comment, 'uid' => $request->user()->id]);
            
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
        //$id = "blah";
        $post = DB::table('posts')->where('uid', $request->user()->id)->find($request->id);
        return view('posts.show')->with(['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $post = DB::table('posts')->where('uid', $request->user()->id)->find($request->id);
        return view('posts.edit')->with(['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
     
        $validated = $request->validate([
        'title' => 'required|min:5',
        'comment' => 'required|min:20',
        ]);
        $updated = DB::table('posts')->where('id', $request->id)->where('uid', $request->user()->id)->update(['title' => $request->title, 'body' => $request->comment]);
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       DB::table('posts')->where('id', '=', $request->id)->where('uid', $request->user()->id)->delete();
       return redirect()->route('posts.index');
    }
    
    /**
     * Populate posts table with RSS data
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function populate(Request $request) 
    {
        $feed = \Feeds::make('https://news.google.com/news/rss', true); // if RSS Feed has invalid mime types, force to read
        
        foreach($feed->get_items() as $item)
        {
            DB::table('posts')->insert(['title' => $item->get_title(), 'body' => strip_tags($item->get_description()), 'uid' => $request->user()->id]);
        }
        
        return redirect()->route('posts.index');
    }
}
