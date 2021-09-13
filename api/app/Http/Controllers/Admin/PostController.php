<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\AdminPostEditResource;

class PostController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:sanctum');
    }

    public function __invoke()
    {
        return PostResource::collection(Post::latest()->get());
    }

    public function store()
    {
        $post = Post::create([
            'title' => 'Create New Post',
        ]);

        return new PostResource($post);
    }

    public function edit(Post $post)
    {
        return new AdminPostEditResource($post);
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'string|unique:posts,slug,' . $post->id,
            'body' => 'nullable',
            'excerpt' => 'nullable',
            'published' => 'boolean',
        ]);

        $post->update($request->only('title', 'body', 'excerpt', 'published'));
    }
}
