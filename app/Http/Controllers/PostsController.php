<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditPostRequest;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::all();

        return view('posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'file' => 'required'
        ]);
        $path = $request->file('file')->storePublicly('files');
        $user = User::find(1);
        $post = new Post();
        $post->user_id = $user->id;
        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();

        $image = new Image();
        $image->url = $path;
        $image->imageable_id = $post->id;
        $image->imageable_type = 'App\Models\Post';
        $image->save();

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post  = Post::find($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditPostRequest $request, string $id)
    {

        $post = Post::find($id);

        $post->title = $request->title;
        $post->body = $request->body;
        $post->update();

        return view('posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post = Post::findOrFail($id);

        $post->delete();
        return redirect('/posts');
    }
}
