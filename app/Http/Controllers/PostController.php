<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostCreate;
use App\Http\Requests\Post\PostUpdate;
use App\Models\Category;
use App\Models\Post;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        // dd(Post::Myposts()->withTrashed()->get());
        // dd(Post::Myposts()->onlyTrashed()->get());
        return view('dashboard.blog.index')->with('posts', Post::Myposts());
    }
    public function create()
    {
        return view('dashboard.blog.c&&e');
    }
    public function store(PostCreate $request)
    {
        $image = $request->post_image->store('post_image');
        $post = Auth()->user()->posts()->create([
            "title" => $request->title,
            "discription" => $request->discription,
            "content" => $request->content,
            "post_image" => $image,
            "category_id" => $request->category_id,
            "slug" => str_slug($request->title),
        ]);
        if ($request->tag_id) {
            $post->tags()->attach($request->tag_id);
        }

        session()->flash("success", 'Post Created');
        return redirect()->route('posts.index');
    }
    public function show(Post $post)
    {
        return view('dashboard.blog.show')->with('post', $post);
    }
    public function edit(Post $post)
    {
        return view('dashboard.blog.c&&e')->with('post', $post);
    }
    public function update(PostUpdate $request, Post $post)
    {
        // dd($request->all());
        if ($request->hasFile('post_image')) { // it checks if the file has been changed
            $image =  $request->post_image->store('post_image'); //
            $request->post_image = $image;
            Storage::delete($post->post_image);
        } else {
            $request->post_image = $post->post_image;
        }
        if ($request->tag_id) {
            $post->tags()->sync($request->tag_id);
        }
        $post->update([
            "title" => $request->title,
            "discription" => $request->discription,
            "content" => $request->content,
            "post_image" => $request->post_image,
            "category_id" => $request->category_id,
            "slug" => str_slug($request->title),
        ]);
        session()->flash("success", 'Post Update');
        return redirect()->route('posts.index');
    }
    public function destroy($id)
    {
        // dd(Post::findOrFail($id)->withTrashed()->get());
        $post = Post::withTrashed()->where('slug', $id)->firstOrFail();
        // dd($post->trashed());
        if ($post->trashed()) {
            Storage::delete($post->post_image);
            $post->forceDelete();
        } else {
            $post->delete();
        }
        session()->flash("success", 'Post Deleted');
        return redirect()->route('posts.index');
    }
    public function poststrashed()
    {
        return view('dashboard.blog.trashed')->with('posts', Post::onlyTrashed()->Myposts());
    }
    public function restore($id)
    {
        // dd($id);
        $post = Post::withTrashed()->where('slug', $id)->firstOrFail();
        $post->restore();
        session()->flash("success", 'Post Restored');
        return redirect()->route('posts.index');
    }
}
