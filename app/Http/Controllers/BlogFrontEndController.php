<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogFrontEndController extends Controller
{
    public function index()
    {
        $search = request()->query('search');
        if ($search) {
            // dd($search);
            $first_post = Post::where('title', 'like', "%{$search}%")->get();
        } else {
            $first_post =  Post::orderBy('created_at', 'desc')->take(1)->get();
        }
        $posts = Post::simplePaginate(6);
        return view('frontend.blog.welcome', [
            'first_post' => $first_post,
            'posts' => $posts,
        ]);
    }
    public function show(Post $post)
    {
        // dd($post);
        return view('frontend.blog.show')->with('post', $post);
    }
    public function tag(Tag $tag)
    {
        return view('frontend.blog.tag', [
            'tag' => $tag,
        ]);
    }
    public function category(Category $category)
    {
        // $category = Category::simplePaginate(1)->where('slug', $id)->get();
        // dd($category);
        return view('frontend.blog.category', [
            'category' => $category,
        ]);
    }
}
