<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage.news');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "News";
        $posts = Post::all();

        return view('admin.posts.index', compact('posts', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "News create";
        return view('admin.posts.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        if ($file = $request->file('post_image')) {
            $image = date('YmdHis') . "." . $file->extension();
            $file->move(public_path('img/posts/'), $image);
        } else {
            $image = "";
        }

        Post::create([

            'title' => $request->input('post_name'),
            'description' => $request->input('post_description'),
            'image' => $image,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "News edit";
        $post = Post::findOrfail($id);
        return view('admin.posts.edit', compact('post', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $image = $post->image;

        if ($request->hasFile('post_image')) {
            $file = $request->file('post_image');
            $image = date('YmdHis') . "." . $file->extension();
            $file->move(public_path('img/posts/'), $image);
        }


        $post->update([
            'title' => $request->input('post_name'),
            'image' => $image,
            'description' => $request->input('post_description'),
        ]);

        return redirect()->route('posts.index')->with('success', 'Post has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post has been deleted');
    }
}
