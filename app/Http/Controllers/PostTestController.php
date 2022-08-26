<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;

class PostTestController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return $posts;
    }
    public function show(Post $post)
    {
        return new PostResource($post);
    }
}
