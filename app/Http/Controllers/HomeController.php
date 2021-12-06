<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Channel;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.home')->with('myposts', Post::myposts()->count())
            ->with('trash', Post::onlyTrashed()->count())
            ->with('tags', Tag::all()->count())
            ->with('categories', Category::all()->count())
            ->with('writer', User::where('role', 'writer')->count())
            ->with('admins', User::where('role', 'admin')->count());
    }

    public function blog()
    {
        return view('dashboard.blog.blog');
    }
    public function discussion()
    {
        return view('dashboard.discussion.discussion', [
            'channels' => Channel::all(),
        ]);
    }
}
