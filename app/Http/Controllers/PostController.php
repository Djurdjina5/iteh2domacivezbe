<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        // return PostResource::collection($posts);
        return new PostCollection($posts);
    }
    public function show(Post $post)
    {
        return new PostResource($post);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:100',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => 'required'
        ]);
        if ($validator->fails())
            return response()->json($validator->errors());

        $post = Post::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'category_id' => Auth::user()->id
        ]);
        return response()->json('Post is created successfully.', new PostResource($post));
    }
    public function update(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $post = Post::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id,
        ]);



        $post->save();

        return response()->json('Post is updated successfully.', new PostResource($post));
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json('Post is deleted successfully');
    }
}
