<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function __invoke(Post $post)
    {
        return PostResource::collection(
            Post::latest()
                ->wherePublished(true)
                ->get(),
        );
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }
}
