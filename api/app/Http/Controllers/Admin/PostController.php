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
            'title' => 'test post',
        ]);

        return new PostResource($post);
    }

    public function edit(Post $post)
    {
        return new AdminPostEditResource($post);
    }
}
