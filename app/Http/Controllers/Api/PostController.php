<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function searchBySlug($slug){
        $post = Post::where('slug', $slug)->first();
        if (!$post){
            abort(404);
        }

        return $post;
    }

    public function index(){
        $posts = Post::with('tags', 'user')->get();

        return response()->json($posts);
    }

    public function show($slug)
    {
        $post = $this->searchBySlug($slug);
        $post->load("tags:slug", "user:id,name");
        return response()->json($post);
    }
}
