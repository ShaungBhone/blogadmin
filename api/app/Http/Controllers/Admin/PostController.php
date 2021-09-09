<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function __contruct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function __invoke()
    {
        return PostResource::collection(Post::latest()->get());
    }
}
