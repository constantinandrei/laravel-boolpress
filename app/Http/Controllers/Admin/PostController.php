<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Admin\Post;
use App\Admin\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function slugGenerator($text, $id){
        return Str::slug($text) . '-' . $id;
    }

    public function searchBySlug($slug){
        $post = Post::where('slug', $slug)->first();
        if (!$post){
            abort(404);
        }

        return $post;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy("created_at", "desc")->get();
        
        return view("admin.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('admin.posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
                'title' => 'required|min:10',
                'content' => 'required|min:30',
                'tags' => 'nullable|exists:tags,id',
                'fileImg' => 'required|image'
            ]);
        $file = Storage::put('/posts', $validateData['fileImg']);
        $post = new Post();
        $post->user_id = Auth::id();
        $post->fill($validateData);
        $post->slug = Str::slug($post->title);
        $post->imgUrl = $file;
        $post->save();
        $post->slug = $this->slugGenerator($post->title, $post->id);
        $post->update();

        if (key_exists("tags", $validateData)) {
            $post->tags()->attach($validateData["tags"]);
        }


        return redirect(route('admin.posts.show', $post->slug));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = $this->searchBySlug($slug);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = $this->searchBySlug($slug);
        $tags = Tag::all();



        return view('admin.posts.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {   
        $post = $this->searchBySlug($slug);
        $validateData = $request->validate([
            'title' => 'required|min:10',
            'content' => 'required|min:30',
            'fileImg' => 'nullable|image',
            'tags' => 'nullable|exists:tags,id'
        ]);
        $post->user_id = Auth::id();
        $post->slug = $this->slugGenerator($validateData['title'], $post->id);
        if (key_exists("tags", $validateData)) {
            $post->tags()->sync($validateData["tags"]);
        } else {
            $post->tags()->sync([]);
        }
        if ($validateData['fileImg']){
            if($post->imgUrl){
                Storage::delete($post->imgUrl);
            }

            $filePath = Storage::put('/posts', $validateData['fileImg']);

            $post->imgUrl = $filePath;
        }

        $post->update($validateData);

    return redirect(route('admin.posts.show', $post->slug));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {  
        
        
        $post = $this->searchBySlug($slug);
        if($post->imgUrl){
            Storage::delete($post->imgUrl);
        }
        $post->tags()->detach();
        $post->delete();

        return redirect(route('admin.posts.index'));
    }
}
