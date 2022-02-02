<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index()
    {

        //    DB::connection()->enableQueryLog();
        //    $posts=BlogPost::with('comments')->get();
        //    foreach($posts as $post){
        //         foreach($post->comments as $comment){
        //             echo $comment->content;
        //         }
        //    }
        //     dd(DB::getQueryLog());

        return view(
            'posts.index',
            ['posts' => BlogPost::withCount('comments')->get()]
        );
    }
    public function create()
    {
        return view('posts.create');
    }
    public function edit($id)
    {
        return view('posts.edit', ['post' => BlogPost::findorFail($id)]);
    }
    public function store(StorePost $request)
    {
        $validated = $request->validated();
        $post =  BlogPost::create($validated);
        $request->session()->flash('status', 'The Blog Post is Created');
        return redirect()->route('posts.show', ['post' => $post->id]);
    }
    public function update(StorePost $request, $id)
    {

        $post = BlogPost::findOrFail($id);
        $validated = $request->validated();
        $post->fill($validated);
        $post->save();
        $request->session()->flash('status', 'Blog Post is updated');

        return redirect()->route('posts.show', ['post' => $post->id]);
    }
    public function show($id)
    {
        return view('posts.show', ['post' => BlogPost::findOrFail($id)]);
    }
    public function destroy($id)
    {

        $post = BlogPost::findOrFail($id);
        $post->delete();

        // BlogPost::destroy($id);

        session()->flash('status', 'Blog post was deleted!');

        return redirect()->route('posts.index');
    }
}
