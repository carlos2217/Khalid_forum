<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class BlogController extends Controller
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
        return view('blog.welcome', [
            'first_post' => $first_post,
            'posts' => $posts,
        ]);
    }
    public function show(Post $post)
    {
        // dd($post);
        return view('blog.show')->with('post', $post);
    }
    public function tag(Tag $tag)
    {
        return view('blog.tag', [
            'tag' => $tag,
        ]);
    }
    public function category(Category $category)
    {
        // $category = Category::simplePaginate(1)->where('slug', $id)->get();
        // dd($category);
        return view('blog.category', [
            'category' => $category,
        ]);
    }
}
