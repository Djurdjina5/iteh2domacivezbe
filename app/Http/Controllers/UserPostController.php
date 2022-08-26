<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;
use App\Models\Post;

class UserPostController extends Controller
{
    public function index($user_id)
    {
        $posts = Post::get()->where('user_id', $user_id);
        if (is_null($posts)) {
            return response()->json('Data not found', 404);
        }
        return response()->json($posts);
    }
}
