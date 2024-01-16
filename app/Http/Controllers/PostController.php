<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware("auth")->except("index");
    }

    public function index()
    {   
        $posts=Post::latest()->get();
        return view("home",compact("posts"));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        // $this->authorize("create");
        $this->authorize('create', Post::class);
        return view("post.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields=$request->validate([
            'title' => 'required|max:150',
            'content' => 'required',
            'image'=>"image|mimes:jpeg,png,jpg,gif|max:2048"
        ]);
        if($request->hasFile("image")){
            $formFields["image"]=$request->file("image")->store("postsImages","public");
        }
        $formFields["profile_id"]=Auth::id();
        Post::create($formFields);
        return to_route("home")->with("success","Post created successfuly");
    }
    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {   
        // Gate::authorize("edit-post",$post);
        $this->authorize('edit', $post);
        return view("post.edit",compact("post"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Gate::authorize("edit-post",$post);
        $this->authorize('update', $post);

        $formFields=$request->validate([
            'title' => 'required|max:150',
            'content' => 'required',
            'image'=>"image|mimes:jpeg,png,jpg,gif|max:7048"
        ]);
        if($request->hasFile("image")){
            if($post->image){
                // dd($post->image);
                Storage::disk("public")->delete($post->image);
            }
            $formFields["image"]=$request->file("image")->store("postsImages","public");
        }
        $formFields["profile_id"]=Auth::id();
        $post->fill($formFields)->save();
        return to_route("home")->with("success",$formFields["title"]." updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route("home")->with("success","deleted successfully");

    }
}
