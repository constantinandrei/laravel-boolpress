<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('tags', 'user')->get();

        return response()->json($posts);
    }
}
